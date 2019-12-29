@extends("layouts.default")
@section("title", "Users List")
@section("content")
  <div class="list-group list-group-flush">
    @foreach($users as $user)
      <div class="list-group-item">
        <img class="mr-2" src="{{ $user->gravatar('70') }}" alt="">
        <a href="{{route("users.show", $user->id)}}">{{ $user->name }}</a>
      </div>
    @endforeach
  </div>
  <hr>
  {!! $users->render() !!}
@stop
