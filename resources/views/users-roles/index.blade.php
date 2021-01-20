<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" xmlns="http://www.w3.org/1999/html">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <div class="container">
        <h1 class="display-4">Users List</h1>

        @forelse ($users as $user)
            <ul class="list-group">
                <li class="list-group-item">
                    Id: {{ $user->id }}
                    Name: {{ $user->name }} |
                    Email : {{ $user->email }} |
                    Role: {{ $user->role->name }}


                    <div
                        class="dropdown"
                    >
                        <a class="btn btn-secondary dropdown-toggle"
                           role="button" id="dropdownMenuLink"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false"
                        >
                            Change Role
                        </a>


                            <div
                                class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                            >
                                @foreach ($roles as $role)
                                    @if ($role->name == $user->role->name)
                                        @continue
                                    @endif
                                        <form id="submit-form-{{ $user->id  }}-{{ $role->id }}"
                                              action="{{ route('users-roles.update', $user->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="role_id" value="{{ $role->id }}">

                                            <a class="dropdown-item"
                                               href="#"
                                               onclick="event.preventDefault(); document.getElementById
                                               ('submit-form-{{ $user->id  }}-{{ $role->id }}').submit();"
                                            >
                                        {{$role->name}} + {{ $role->id }}
                                    </a>
                                    </form>
                                @endforeach

{{--                    <div class="form-group">--}}
{{--                                <form id="submit-form2"--}}
{{--                                       action="{{ route('users-roles.update', $user->id) }}"--}}
{{--                                       method="POST">--}}
{{--                                    @csrf--}}
{{--                                    @method('PUT')--}}

{{--                                    <select class="dropdown dropdown-menu btn btn-secondary dropdown-toggle" name="role_id">--}}
{{--                                        @foreach ($roles as $role)--}}
{{--                                            @if ($role->name == $user->role->name)--}}
{{--                                                @continue--}}
{{--                                            @endif--}}
{{--                                        <option class="dropdown-item"--}}
{{--                                                value="{{ $role->id }}"--}}
{{--                                                onclick="event.preventDefault(); document.getElementById--}}
{{--                                                ('submit-form1').submit();">--}}
{{--                                            {{ $role->name }}--}}
{{--                                        </option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}

{{--                                </form>--}}
{{--                    </div>--}}












                            </div>
                    </div>
                </li>
            </ul>

        @empty
            Registered users not found.
        @endforelse
    </div>

