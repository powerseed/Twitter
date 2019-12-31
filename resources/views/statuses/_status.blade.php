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
</li>
