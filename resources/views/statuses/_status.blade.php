<li class="media">
  <a href="{{ route("users.show", $user->id) }}">
    <img src="{{ $user->gravatar(70) }}" alt="User gravatar">
  </a>

  <div class="media-body">
    <h5>{{ $user->name }}/{{ $status->created_at()->diffForHumans() }}</h5>
    <p>{{ $status->content }}</p>
  </div>
</li>
