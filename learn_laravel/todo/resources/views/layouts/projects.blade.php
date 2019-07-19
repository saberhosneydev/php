<!DOCTYPE html>
<html>
<head>
  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet" href="{{ asset('/css/bulma.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/bulma-extensions.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
  <script src="{{asset('/js/jquery.js')}}"></script>
  <script defer src="{{asset('/js/fontawesome.js')}}"></script>
  @yield('customHeader')
</head>
<body>
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="/">
        <img src="{{asset('/imgs/auntlulu.svg')}}" alt="Bulma: Free, open source, & modern CSS framework based on Flexbox" width="32" height="32"><span class="has-text-weight-bold">{{config('app.name')}}</span>
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          {{Auth::user()->name}}
        </a>

        <div class="navbar-dropdown">
          <a  href="/home/projects" class="navbar-item">
           Dashboard
         </a>
         <hr class="navbar-divider">
         <a class="navbar-item" href="{{ route('logout') }}"
         onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
         {{ __('Logout') }}
       </a>

       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
  </div>
</div>
</nav>

@yield('content')
@yield('customFooter')
</body>
</html>