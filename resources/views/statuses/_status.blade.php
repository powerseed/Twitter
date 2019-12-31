<li class="media mb-2">
  <a href="{{ route("users.show", $user->id) }}">
    <img class="mr-2" src="{{ $user->gravatar(70) }}" alt="User gravatar">
  </a>

  <div class="media-body">
    <h5>{{ $user->name }}/<small>{{ $status->created_at->diffForHumans() }}</small></h5>
    {{ $status->content }}
  </div>
</li>
