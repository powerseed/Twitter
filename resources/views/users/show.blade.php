@extends("layouts.default")
@section("title", $user->name)
@section("content")
  @include("shared._messages")
  <div class="gravatar">
    @include("shared._user_info", ["user" => $user])
  </div>
  @if($statuses->count() > 0)
    <ul class="list-unstyled">
      @foreach($statuses as $status)
        @include("statuses._status", $status)
      @endforeach
      {!! $statuses->render() !!}
    </ul>
  @else
    <p>No data.</p>
  @endif
@stop
