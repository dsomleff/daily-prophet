@extends('layouts.app')
@section('title', Auth::user()->name . ' | Manage Account')

@section('content')
    <div class="container">
        <!-- User information -->
        <h1 class="h1 text-center text-primary">
            Update profile information
        </h1>

        <form method="POST" action="{{ route('user-profile-information.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input
                class="form-control form-control-lg @error('name') border border-danger @enderror"
                type="text"
                name="name"
                value="{{ Auth::user()->name }}"
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
                type="email"
                name="email"
                value="{{ Auth::user()->email }}"
                >

                @error('email')
                    <div class="text-danger">
                        {{ $errors->first('email') }}
                    </div>
                @enderror
            </div>

            <div class="form-group form-check">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?');">Submit</button>
            </div>
        </form>

        <!-- Password -->
        <h1 class="h1 text-center text-primary">
            Update password
        </h1>

        <form method="POST" action="{{ route('user-password.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="email">Current password</label>
                <input
                class="form-control form-control-lg @error('current_password') border border-danger @enderror"
                type="password"
                name="current_password"
                autocomplete="current-password"
                >
                @error('current_password')
                    <div class="text-danger">
                        {{ $errors->first('current_password') }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">New password</label>
                <input
                class="form-control form-control-lg @error('password') border border-danger @enderror"
                type="password"
                name="password"
                >
                @error('password')
                    <div class="text-danger">
                        {{ $errors->first('password') }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm new password</label>
                <input
                class="form-control form-control-lg @error('password_confirmation') border border-danger @enderror"
                type="password"
                name="password_confirmation"
                >
                @error('password_confirmation')
                    <div class="text-danger">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                @enderror
            </div>

            <div class="form-group form-check">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?');">Submit</button>
            </div>
        </form>

        <!-- Delet account -->
        <h1 class="h1 text-center text-primary">
            Delete account
        </h1>

        <form method="POST" action="{{ route('users.destroy', auth()->id()) }}">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <label for="email">Current password</label>
                <input
                class="form-control form-control-lg @error('current_password') border border-danger @enderror"
                type="password"
                name="current_password"
                autocomplete="current-password"
                >
                @error('current_password')
                    <div class="text-danger">
                        {{ $errors->first('current_password') }}
                    </div>
                @enderror
            </div>

            <div class="form-group form-check">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete account</button>
            </div>
        </form>
    </div>
@endsection
