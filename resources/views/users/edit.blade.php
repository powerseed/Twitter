@extends("layouts.default")
@section("title", "Edit")
@section("content")
  <div class="col-md-8 offset-2">
    <div class="card">
      <div class="card-header">
        <h5>Update your profile</h5>
      </div>
      <div class="card-body">
        @include("shared._messages")
        @include("shared._error")
        <form method="post" action="{{ route("users.update", $user->id) }}">
          {{ csrf_field() }}
          {{ method_field("PATCH") }}
          <div class="form-group">
            <label for="username">Username</label>
            <input name="username" id="username" class="form-control" type="text" value="{{ $user->name }}">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input name="email" id="email" class="form-control" type="email" value="{{ $user->email }}" disabled>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input name="password" id="password" class="form-control" type="password" value="{{ old("password") }}">
          </div>
          <div class="form-group">
            <label for="password_confirmation">Password confirmation</label>
            <input name="password_confirmation" id="password_confirmation" class="form-control" type="password" value="{{ old("password_confirmation") }}">
          </div>
          <button class="btn btn-primary" type="submit">Update</button>
        </form>
      </div>
    </div>
  </div>
@stop
