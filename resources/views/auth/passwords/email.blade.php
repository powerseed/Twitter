@extends("layouts.default")
@section("title", "Password reset")
@section("content")
  <div class="col-md-8 offset-2">
    <div class="card">
      <div class="card-header">
        <h5>Password reset</h5>
      </div>
      <div class="card-body">
        @if(session("status"))
          <div class="alert alert-success">
            {{ session("status") }}
          </div>
        @endif

        @if($errors->has('email'))
          <div class="alert alert-danger">
            {{ $errors->first('email') }}
          </div>
        @endif

        <form method="post" action="{{route("password.email")}}">
          {{csrf_field()}}
          <div class="form-group">
              <label class="form-control-label" for="email">Email</label>
              <input class="form-control" type="email" name="email" id="email" value="{{ old("email") }}">
          </div>
          <div class="form-group">
            <button class="btn btn-primary" type="submit">Send reset email</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@stop
