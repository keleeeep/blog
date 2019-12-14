<nav class="navbar navbar-expand-lg navbar-blue bg-blue mb-3">
  <a class="navbar-brand" href="/">HIMTI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item {{Request::is('blog') ? "active" : ""}} ">
            <a class="nav-link" href="/blog">Artikel</a>
        </li>
        <li class="nav-item {{Request::is('about') ? "active" : ""}} ">
            <a class="nav-link" href="/about">Profil</a>
        </li>
        <li class="nav-item {{Request::is('contact') ? "active" : ""}}">
            <a class="nav-link" href="/contact">Kontak</a>
        </li>
        @if(Auth::guard('admin')->check())
            <li class="nav-item {{Request::is('posts') ? "active" : ""}}">
                <a class="nav-link" href="{{ route('posts.index') }}">Admin</a>
            </li>
        @endif
    </ul>
      <ul class="navbar-nav ml-auto">
          @if (Auth::check())
              <li class="nav-item dropdown float-right">
                  <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0px">
                      Hello {{Auth::user()->name}}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      @if(Auth::guard('admin')->check())
                          <a class="dropdown-item" href="{{ route('posts.index') }}">Artikel</a>
                          <a class="dropdown-item" href="{{ route('categories.index') }}">Kategori</a>
                          <a class="dropdown-item" href="{{ route('tags.index') }}">Label</a>
                          <a class="dropdown-item" href="{{ route('students.index') }}">Mahasiswa</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout Sebagai Admin</a>
                      @endif
                      @if(Auth::guard('web')->check())
                          <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
                      @endif
                  </div>
              </li>
          @else
              <li>
                  <a href="{{ route('login') }}" class="btn btn-light btn-sm">Login</a>
                  <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-sm text-white ml-3" style="border: 0px">Register</a>
              </li>
          @endif
      </ul>
  </div>
</nav>
