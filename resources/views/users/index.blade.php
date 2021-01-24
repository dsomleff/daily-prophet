@extends('layouts.app')
@section('title', 'Users')

@section('content')
<div class="container mt-2">
    <!-- Users roles configuration -->
    <h1 class="display-4 mb-4 text-center text-info">Users configuration</h1>

    <table class="table table-borderless table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Joined</th>
                <th scope="col">Role</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            @forelse ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ $user->created_at->diffForHumans() }}
                        @if ($user->created_at != $user->updated_at)
                            (updated {{ $user->updated_at->diffForHumans() }})
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-info dropdown-toggle w-75"
                                role="button" id="dropdownMenuLink"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                {{ $user->role->name }}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach ($roles as $role)
                                    @if ($role->name == $user->role->name)
                                        @continue
                                    @endif
                                    <form id="submit-form-{{ $user->id  }}-{{ $role->id }}"
                                        action="{{ route('users.update', $user->id) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="role_id" value="{{ $role->id }}">

                                        <a class="dropdown-item"
                                            href="#"
                                            onclick="event.preventDefault(); document.getElementById
                                            ('submit-form-{{ $user->id  }}-{{ $role->id }}').submit();"
                                        >
                                            {{$role->name}}
                                        </a>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('users.destroy', $user->id ) }}">
                            @csrf
                            @method('DELETE')
                            <div class="form-group form-check">
                                <button
                                    type="submit"
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure?');"
                                >Delete account</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <th scope="row">#</th>
                    <td>Registered users not found.</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
