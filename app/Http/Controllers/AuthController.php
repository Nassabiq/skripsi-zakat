<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function register_view()
    {
        return view('auth/register');
    }

    public function register(Request $request)
    {
        $this->validate(request(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'same:password|required|min:8'
        ]);

        $user = User::create(
            [
                'name' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]
        );
        $user->assignRole("Muzakki");

        auth()->login($user);

        return redirect()->to('admin/gallery')->with('success', 'You account have been registered!');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            if (Auth::user()->hasRole('muzakki')) {
                return redirect()->intended('/')->with('success', 'You have logged in!');
            }
            return redirect()->intended(route('dashboard'))->with('success', 'You have logged in!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have logged out!');
    }

    public function kelolaUsers()
    {
        $data = User::with('roles')->get();
        $roles = Role::get();
        return view('admin.users', [
            'data' => $data,
            'roles' => $roles
        ]);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_user' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        if ($validator->fails()) return back()->withErrors($validator)->with('error', "Oops!! Something Went Wrong")->withInput($request->all());

        $user = User::create([
            'name' => $request->nama_user,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->assignRole($request->role);

        return redirect()->back()->with('success', 'User Berhasil Ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        if ($validator->fails()) return back()->withErrors($validator)->with('error', "Oops!! Something Went Wrong")->withInput($request->all());

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->syncRoles($request->role);

        $user->save();

        return redirect()->back()->with('success', 'User Berhasil Diupdate!');
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User Berhasil Dihapus!');
    }
}
