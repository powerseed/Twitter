@extends("layouts.default")
@section("title", "Users List")
@section("content")
  <div class="list-group list-group-flush">
    @foreach($users as $user)
      <div class="list-group-item">
        <img class="mr-2" src="{{ $user->gravatar('70') }}" alt="">
        <a href="{{route("users.show", $user->id)}}">{{ $user->name }}</a>
        @can('destroy', $user)
          <form class="float-right mt-3" method="post" action="{{route("users.destroy", $user->id)}}">
            {{csrf_field()}}
            {{method_field("DELETE")}}
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        @endcan
      </div>
    @endforeach
  </div>
  <hr>
  {!! $users->render() !!}
@stop
