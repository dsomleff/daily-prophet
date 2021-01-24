<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light border-bottom border-info" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('posts.index') }}">Daily Prophet</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('about')) ? 'active' : '' }}" href="/about">About us</a>
                </li>
                <li class="nav-item {{ (request()->is('contacts')) ? 'active' : '' }}">
                    <a class="nav-link" href="/contacts">Contacts</a>
                </li>

                @can('view', auth()->user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                    </li>
                @endcan

                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle font-weight-bold text-info"
                           href="#" id="navbarDropdown"
                           role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false"
                        >{{ Auth::user()->name }}</a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('users.posts', Auth::user()) }}">
                                Personal area
                            </a>

                            @can('viewAny', \App\Models\Post::class)
                                <a class="dropdown-item" href="{{ route('posts.create') }}">
                                    Create new post
                                </a>
                            @endcan

                            <a class="dropdown-item" href="/user/profile">Manage account</a>

                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item"
                                   href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                          this.closest('form').submit();"
                                >Logout</a>
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}"
                           href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('register')) ? 'active' : '' }}"
                           href="{{ route('register') }}">
                            Join community
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
