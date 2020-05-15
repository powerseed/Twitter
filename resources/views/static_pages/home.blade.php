@extends("layouts.default")
@section("title", "Home")
@section("content")

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @include("shared._messages")
  @if(Auth::check())
    <div class="row">
      <div class="col-md-8">
        @include("statuses._status_form")
      </div>
      <aside class="col-md-4">
        <section class="user_info">
          @include("shared._user_info", ['user' => Auth::user()])
        </section>
        <section class="stats">
          @include("shared._stat", ['user' => Auth::user()])
        </section>
      </aside>
    </div>

      <div class="card col-md-8" style="padding: 0px">
        <div class="card-header">
          <h5>Followings' Tweets</h5>
        </div>
        <div class="card-body" style="padding: 0px">
          @if($feed_items->count() > 0)
            <ul class="list-group list-group-flush">
              @foreach($feed_items as $status)
                @include("statuses._status", ["user"=>$status->user, "status"=>$status])
              @endforeach
            </ul>
          @else
            <div class="my-3 text-center">
              <p>You haven't followed anyone.</p>
            </div>
          @endif
        </div>
      </div>
  @else
    <div class="jumbotron">
      <h1>Hello! </h1>
      <p class="lead">Welcome to Meow!</p>
      <a class="btn btn-lg btn-success" href="{{ route("signup") }}">Sign up</a>
    </div>
  @endif
@stop
