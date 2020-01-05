@extends("layouts.default")
@section("title", "Home")
@section("content")
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

    @if($feed_items->count() > 0)
      <div class="col-md-8">
        <h3>Tweets list</h3>
        <hr>
        <ul class="list-unstyled">
          @foreach($feed_items as $status)
            @include("statuses._status", ["user"=>Auth::user(), "status"=>$status])
          @endforeach
        </ul>
      </div>
    @endif
  @else
    <div class="jumbotron">
      <h1>Hello Laravel</h1>
      <p class="lead">This is Laravel tutorial</p>
      <a class="btn btn-lg btn-success" href="{{ route("signup") }}">Sign up</a>
    </div>
  @endif
@stop
