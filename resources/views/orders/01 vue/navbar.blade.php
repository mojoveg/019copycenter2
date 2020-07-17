<nav class="navbar navbar-expand-md navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('orders.index') }}">Orders</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
    </ul>
    @if (Route::has('login'))
    <ul class="navbar-nav">
      @auth
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/home') }}">Home</a>
      </li>
      @else

      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
      </li>
      @if (Route::has('register'))
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">Register</a>
      </li>
      @endif
      @endauth
    </ul>
    @endif
  </div>
</nav>


