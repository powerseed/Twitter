@extends("layouts.default")
@section("title", "Users List")
@section("content")
  <div class="card">
    <div class="card-header">
      <h5>Users List</h5>
    </div>

    <div class="card-body" style="padding: 0px">
      <ul class="list-group list-group-flush">
        @foreach($users as $user)
          <li class="list-group-item">
            <img class="mr-2" src="{{ $user->gravatar('70') }}" style="border-radius: 50%">
            <a href="{{route("users.show", $user->id)}}">{{ $user->name }}</a>
            @can('destroy', $user)
              <form class="float-right mt-3" method="post" action="{{route("users.destroy", $user->id)}}">
                {{csrf_field()}}
                {{method_field("DELETE")}}
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
            @endcan
          </li>
        @endforeach
      </ul>

      <div class="mt-2">
        {!! $users->render() !!}
      </div>
    </div>
  </div>
@stop
