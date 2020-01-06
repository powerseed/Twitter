@extends("layouts.default")
@section("title", $user->name)
@section("content")
  @include("shared._messages")
    <div class="gravatar col-md-8 offset-2">
      <div class="text-center">
        @include("shared._user_info", ["user" => $user])
      </div>

      @if(Auth::check())
        @include("users._follow_form")
      @endif

      <div class="stats">
        @include("shared._stat", ["user" => $user])
      </div>

      <hr>

      <div class="fuck">
        @if($statuses->count() > 0)
          <ul class="list-unstyled text-left">
            @foreach($statuses as $status)
              @include("statuses._status", $status)
            @endforeach
            {!! $statuses->render() !!}
          </ul>
        @else
          <p>No tweet. </p>
        @endif
      </div>
    </div>
@stop
