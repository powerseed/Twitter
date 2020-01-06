@extends("layouts.default")
@section("title", $title)
@section("content")
  <div class="col-md-8 offset-2">
    <h3 class="mb-4 text-center">{{ $title }}</h3>
    <ul class="list-unstyled border-left-0">
      @foreach($users as $user)
        <div class="list-group list-group-flush gravatar">
          <li class="list-group-item">
            <img class="mr-2" src="{{ $user->gravatar(70) }}" alt="">
            <a href="{{ route("users.show", $user) }}">{{ $user->name }}</a>
          </li>
        </div>
      @endforeach
    </ul>
    {!! $users->render() !!}
  </div>
@stop
