<li class="media mb-4">
  <a href="{{ route("users.show", $user->id) }}">
    <div class="gravatar">
      <img class="mr-4" src="{{ $user->gravatar(70) }}" alt="User gravatar">
    </div>
  </a>

  <div class="media-body">
    <h5>{{ $user->name }}/<small>{{ $status->created_at->diffForHumans() }}</small></h5>
    {{ $status->content }}
  </div>

  @can("destroy", $status)
    <form method="post" action="{{route("statuses.destroy", $status->id)}}">
      {{csrf_field()}}
      {{method_field("DELETE")}}
      <button class="btn btn-danger mt-3 ml-3" type="submit">Delete</button>
    </form>
  @endcan
</li>
