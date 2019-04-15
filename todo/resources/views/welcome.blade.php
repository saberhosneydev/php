<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel</title>
  <link rel="stylesheet" href="{{ asset('/css/bulma.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/bulma-extensions.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  <script defer src="{{asset('/js/fontawesome.js')}}"></script>

</head>
<body>
  <section class="has-height-100">
    <div class="container is-transparent">
     <nav class="navbar" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
          <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: Free, open source, & modern CSS framework based on Flexbox" width="112" height="28">
        </a>
      </div>


      @auth

      <div class="navbar-end">
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            {{$user->name}}
          </a>

          <div class="navbar-dropdown">
            <a  href="/home" class="navbar-item">
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

  @endauth
  @guest
  <div class="navbar-end">
    <div class="buttons">
      <a href="/register" class="navbar-item button  is-primary is-rounded is-outlined">
        <strong>Singup</strong>
      </a>
      <a href="/login" class="navbar-item button  is-info is-rounded is-outlined">Login</a>
    </div>
  </div>

  @endguest


</nav>
</div>

<section class="hero is-transparent has-text-centered">
  <div class="hero-body">
    <div class="container has-margin-top-30">
      <h1 class="title is-size-1 is-unselectable">
        Easy Do
      </h1>
      <h2 class="subtitle is-unselectable">
        Beauty made for those who appreciate.
      </h2>
    </div>
    <div class="is-pulled-down">
      <img src="{{ asset('imgs/scrolldown.svg') }}" height="64" width="64" alt="">
    </div>
  </div>
</section>
</section>

<footer class="footer">
  <div class="content has-text-centered">
    <p>
      <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
      <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
      is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
    </p>
    <img src="{{ asset('/imgs/auntlulu.svg') }}" height="64" width="64" alt="">
  </div>
</footer>
<div class="pageloader"><span class="title">Page is now loading</span></div>
<script src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('.pageloader').addClass('is-active');
    setTimeout(function(){
      $('.pageloader').removeClass('is-active');
      window.scrollTo(0,0);
    },500);
  });
</script>
</body>
</html>
