@extends('layouts.app')
@section('title', 'Daily Prophet | Join Us ')

@section('content')
    <div class="container d-flex justify-content-center ">

    <!-- Login form -->
        <div class="jumbotron w-50 mt-4 bg-white">

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input
                        class="form-control form-control-lg @error('name') border border-danger @enderror"
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                    >

                    @error('name')
                        <div class="text-danger">
                            {{ $errors->first('name') }}
                        </div>
                    @enderror
                </div>

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
                    <label for="password_confirmation">Confirm password</label>
                    <input
                        class="form-control form-control-lg @error('password_confirmation') border border-danger @enderror"
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                    >

                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Your password must be 8-20 characters long.
                        </small>

                    @error('password_confirmation')
                        <div class="text-danger">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <a href="{{ route('login') }}">
                    <button type="button" class="btn btn-outline-info mt-2 mb-2">
                        Already registered?
                    </button>
                </a>
                    <button type="submit" class="btn btn-info mt-2 mb-2">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

