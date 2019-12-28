@extends("layouts.default")
@section("title", "Sign up")
@section("content")
  <div class="col-md-8 offset-2">
    <div class="card">
      <div class="card-header">
        <h5>Sign up</h5>
      </div>

      <div class="card-body">
        @include("shared._error")
        <form method="post" action="{{ route("users.store") }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" value="{{ old('username') }}">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" value="{{ old('password') }}">
          </div>

          <div class="form-group">
            <label for="password_confirmation">Password confirmation</label>
            <input class="form-control" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
          </div>

          <button type="submit" class="btn btn-primary">Sign up</button>
        </form>
      </div>
    </div>
  </div>
@stop
