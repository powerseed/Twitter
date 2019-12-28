<a href="{{ route("users.show", $user->id) }}">
  <img src="{{ $user->gravatar('140') }}" alt="{{ $user->name }}" class="gravatar">
</a>
<h2>{{ $user->name }}</h2>
