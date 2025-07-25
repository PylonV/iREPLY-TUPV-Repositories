@extends('layout.base')

@section('content')
    <div class="flex h-full">
        <div class="banner w-1/2 bg-blue-800"></div>
        <div class="login-container flex align-center w-1/2">
            <div class="flex w-md p-8 items-center">
                <div class="wrapper w-full">
                    <div class="intro text-center mb-4">
                        <h5 class="text-xl">Login to your account</h5>
                        <p>Please enter your email and password to login.</p>
                    </div>
                    <form method="POST" action="{{ route('authenticate') }}" class="flex flex-col gap-2 w-full">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password">
                        </div>
                        <button type="submit" class="btn-default mt-4 bg-blue-500 text-white border-black">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
