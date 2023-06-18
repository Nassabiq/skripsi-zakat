@extends('layouts.auth')
@section('title', 'Register')

@section('content')
    <div class="row d-flex min-vh-100 m-0 p-0" id="login-regis">
        <div class="col-6"></div>
        <div class="col-6">
            <div class="card-wrapper">
                <div class="card mx-2 my-4">
                    <h2 class="text-center mt-4">Register</h2>
                    <div class="card-body ">
                        <form action="register" method="post">
                            @csrf
                            <div class="form-group mt-2">
                                <label for="nama">Full Name:</label>
                                <input type="text" class="form-control" name="username" id="nama"
                                    placeholder="Enter full name" />
                                @error('username')
                                    <div class="text-danger error-messages">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="email"> Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Example: jhonandrea@gmail.com" />
                                @error('email')
                                    <div class="text-danger error-messages">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter the password" />
                                @error('password')
                                    <div class="text-danger error-messages">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="confirm-password">Confirm Password:</label>
                                <input type="password" class="form-control" id="confirm-password" name="confirm_password"
                                    placeholder="Re-enter the password" />
                                @error('confirm_password')
                                    <div class="text-danger error-messages">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row d-flex mt-5 justify-content-center">
                                <button type="submit" class="btn btn-secondary btn-daftar">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="register-text">
                    Already have an account? <a href="login">Sign in</a>
                </p>
            </div>
        </div>
        </body>
    @endsection
