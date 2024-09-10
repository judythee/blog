
{{-- default bootstrap navbar --}}
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
      <a class="navbar-brand" href="#">Laravel Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('blog') }}">Blog</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('about') }}">About</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ url('contact') }}">Contact</a>
              </li>
          </ul>

          @if (Auth::check())
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a></li>
                <li><a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a></li>
                <li><a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>
            </ul>
        </li>
    </ul>
@else
    <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
@endif
      </div>
  </div>
</nav>


{{-- end of navbar --}}


