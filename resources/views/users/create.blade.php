@extends("layouts.default")
@section("title", "Sign up")
@section("content")
  <div class="card">
    <div class="card-header">
      <h5>Sign up</h5>
    </div>
    <div class="card-body">
      <form method="post" action="{{ route("users.store") }}">
        <div class="form-group">
          <label for="username">Username</label>
          <input class="form-control" name="username" type="text" value="{{ old("Username") }}">
        </div>

        <div class="form-group">
          <label for="Email">Email</label>
          <input class="form-control" name="Email" type="email" value="{{ old("Email") }}">
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input class="form-control" name="password" type="password" value="{{ old("password") }}">
        </div>

        <div class="form-group">
          <label for="password_confirmation">Password confirmation</label>
          <input class="form-control" name="password_confirmation" type="password" value="{{ old("password_confirmation") }}">
        </div>

        <button type="submit" class="btn btn-primary">Sign up</button>
      </form>
    </div>
  </div>
@stop
