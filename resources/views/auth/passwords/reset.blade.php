@extends("layouts.default")
@section("title", "Password reset")
@section("content")
  <div class="card">
    <div class="card-header">
      <h5>Passwrod reset</h5>
    </div>
    <div class="card-body">
      <form method="post" action="{{route("passwords.update")}}">
        {{csrf_field()}}
        <input type="hidden" name="token" value="{{$token}}">

        <div class="form-group">
          <label for="email">Email</label>
          <input class="form-control" type="email" name="email" id="email">
          @if($errors->has("email"))
            <div class="alert alert-danger">
              {{ $errors->first("email") }}
            </div>
          @endif
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input class="form-control" type="password" name="password" id="password">
          @if($errors->has("password"))
            <div class="alert alert-danger">
              {{ $errors->first("password") }}
            </div>
          @endif
        </div>

        <div class="form-group">
          <label for="password-confirm">Password confirmation</label>
          <input class="form-control" type="password" name="password-confirm" id="password-confirm">
        </div>

        <button class="btn btn-primary" type="submit">Submit</button>
      </form>
    </div>
  </div>
@stop
