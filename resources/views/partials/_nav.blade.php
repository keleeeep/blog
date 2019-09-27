{{-- <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Laravel</a>
      </div>
  
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="/">Home <span class="sr-only">(current)</span></a></li>
          <li><a href="about">About</a></li>
          <li><a href="contact">Contact</a></li>
        </ul>
          <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
</nav> --}}

<nav class="navbar navbar-expand-lg navbar-blue bg-blue mb-3">
  <a class="navbar-brand" href="/">HIMTI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        {{--<li class="nav-item {{Request::is('/') ? "active" : ""}} ">--}}
            {{--<a class="nav-link" href="/">Home</a>--}}
        {{--</li>--}}
        <li class="nav-item {{Request::is('blog') ? "active" : ""}} ">
            <a class="nav-link" href="/blog">Artikel</a>
        </li>
        <li class="nav-item {{Request::is('about') ? "active" : ""}} ">
            <a class="nav-link" href="/about">Profil</a>
        </li>
        <li class="nav-item {{Request::is('contact') ? "active" : ""}}">
            <a class="nav-link" href="/contact">Kontak</a>
        </li>
        {{--<li class="nav-item dropdown">--}}
            {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--Categories--}}
            {{--</a>--}}
            {{--<div class="dropdown-menu p-0 m-0" aria-labelledby="navbarDropdown">--}}
                {{--@foreach($categories as $category)--}}
                    {{--<a style="width: 280px !important;" href="{{route('categories.show',$category->id)}}" class="background background-anchor list-group-item list-group-item-action">{{$category->name}}</a>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</li>--}}
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
                      <img src="/logo/logohimti.jpg" style="height: 40px; padding: 0;" class="mr-3">
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
      {{--<ul class="navbar-nav ml-auto">--}}
      {{--@if (Auth::guard('admin')->check())--}}
              {{--<li class="nav-item dropdown float-right">--}}
              {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
              {{--Hello {{Auth::user([])->name}}--}}
              {{--</a>--}}
                  {{--<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
                      {{--<a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>--}}
                      {{--<a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>--}}
                      {{--<a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>--}}
                      {{--<div class="dropdown-divider"></div>--}}
                      {{--<a class="dropdown-item" href="{{ route('admin.logout') }}">Logout as Admin</a>--}}
                  {{--</div>--}}
              {{--</li>--}}
          {{--@elseif (Auth::guard('web')->check())--}}
              {{--<li class="nav-item dropdown float-right">--}}
                  {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                      {{--Hello {{Auth::user()->name}}--}}
                  {{--</a>--}}
                  {{--<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
                      {{--<a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>--}}
                  {{--</div>--}}
              {{--</li>--}}
          {{--@else--}}
              {{--<li class="nav-item dropdown float-right">--}}
                  {{--<a href="{{ route('login') }}" class="btn btn-light btn-sm">Login</a>--}}
                  {{--<a href="{{ route('register') }}" class="btn btn-outline-secondary btn-sm text-white ml-3" style="border: 0px">Register</a>--}}
              {{--</li>--}}
          {{--@endif--}}

      {{--</ul>--}}
  </div>
</nav>
