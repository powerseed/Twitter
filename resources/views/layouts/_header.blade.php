<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ route("home") }}">Twitter</a>
    <ul class="navbar-nav justify-content-end">
      @if(Auth::check())
        <li class="nav-item">
          <a class="nav-link" href="#">Users List</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route("users.show", Auth::user())}}">User center</a>
            <a class="dropdown-item" href="{{route("users.edit", Auth::user()->id)}}">Edit</a>
            <div class="dropdown-divider"></div>
            <a class="nav-link" href="">
              <form method="post" action="{{route("logout")}}">
                {{ csrf_field() }}
                {{ method_field("DELETE") }}
                <button class="btn btn-danger btn-block">Log out</button>
              </form>
            </a>
          </div>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{route("help")}}">Help</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route("login")}}">Login</a>
        </li>
      @endif
    </ul>
  </div>
</nav>
