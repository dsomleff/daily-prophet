@extends('layouts.app')
@section('title', 'Daily Prophet | Login ')

@section('content')
    <div class="container d-flex justify-content-center ">

    <!-- Login form -->
        <div class="jumbotron w-50 mt-4 bg-white">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        class="form-control form-control-lg @error('email') border border-danger @enderror"
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                    >

                    @error('email')
                        <div class="text-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        class="form-control form-control-lg @error('password') border border-danger @enderror"
                        id="password"
                        type="password"
                        name="password"
                        value="{{ old('password') }}"
                        required
                    >

                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Your password must be 8-20 characters long.
                    </small>

                    @error('password')
                        <div class="text-danger">
                            {{ $errors->first('password') }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <a href="{{ route('register') }}">
                    <button type="button" class="btn btn-outline-primary mt-2 mb-2">
                        Registration
                    </button>
                </a>
                    <button type="submit" class="btn btn-primary mt-2 mb-2">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
