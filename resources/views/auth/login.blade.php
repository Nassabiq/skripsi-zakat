@extends('layouts.auth')
@section('title', 'Login')

@section('content')
    <div class="row d-flex justify-content-center text-center min-vh-100 m-0 p-0" id="login-regis">
        <div class="card m-auto p-5" style="width: 30rem;">
            <div class="text-center">
                <a href="/">
                    <img src="img/Logo MMJ.png" alt="" style="width: 30%;" />
                </a>
            </div>
            <form class="pb-3" action="authenticate" method="POST">
                @csrf
                <div class="form-group mb-3 text-start mt-4">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Email"
                        aria-describedby="emailHelp" />
                    <div id="emailHelp" class="form-text"></div>
                    @error('email')
                        <div class="text-danger error-messages">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3 text-start">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                    @error('password')
                        <div class="text-danger error-messages">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-secondary btn-signin col-6 mt-3">
                    Sign In
                </button>
            </form>
            <p class="login-text mt-3">
                Don't have an account? <a href="register">Sign up</a>
            </p>
        </div>
    </div>
@endsection
