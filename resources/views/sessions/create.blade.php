@extends("layouts.default")
@section("title", "Sign up")
@section("content")
  <div class="col-md-8 offset-2">
    <div class="card">
      <div class="card-header">
        <h5>Login</h5>
      </div>
      <div class="card-body">
        @include("shared._messages")
        @include("shared._error")
        <form method="post" action="{{ route("login") }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="email">Email</label>
            <input name="email" type="email" class="form-control" value="{{ old("email") }}">

            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" value="{{ old("password") }}">
            <a href="{{route("password.request")}}">Forgot password?</a>
            <p></p>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember">
              <label class="form-check-label" for="remember">Remember me</label>
            </div>
          </div>

          <button class="btn btn-primary">Login</button>
        </form>

        <hr>

        <p>
          Don't have an account?
          <a href="{{ route("signup") }}">Sign up now!</a>
        </p>
      </div>
    </div>
  </div>
@stop
