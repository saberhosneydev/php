<nav class="navbar navbar-expand-lg navbar-light bg-light">


  <div class="col">
    <a class="navbar-brand" href="/">
      <img src="/imgs/laravel.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      Laravel
    </a>
  </div>
  
  <div class="col">
    <form class="form-inline my-2 my-lg-0" method="POST" action="/search/{{ request('search') }}">
      {{csrf_field()}}
      <input  style="width: 250px;" class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>

  <div class="col">
    <ul class="navbar-nav">

      @if (Auth::check())
      <li class="nav-item">
        <a class="nav-link" href="/user/create">Create</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout">Logout</a>
      </li>
      <li class="nav-item">
          {{Auth()->id()}}
          {{Auth()->user()->name}}
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link" href="/register">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>
      </li>
      @endif
    </ul>
  </div>


</nav>