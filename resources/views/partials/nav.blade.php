<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{ route('posts.index') }}">Daily Prophet</a>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/about">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contacts">Contacts</a>
          </li>

@if (Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.posts') }}">Personal area</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
          </li>
@else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
@endif
        </ul>
      </div>
    </div>
  </nav>