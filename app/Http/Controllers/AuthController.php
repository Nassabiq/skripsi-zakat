<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            if (Auth::user()->role('Muzakki')) {
                return redirect()->intended('/')->with('success', 'You have logged in!');
            }
            return redirect()->intended('admin/gallery')->with('success', 'You have logged in!');
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
}
