<div class="mt-1">
  <a href="{{ route("users.followings", $user->id) }}">
    <strong id="followings" class="stat">
      {{count($user->followings)}}
    </strong>
    Followings
  </a>

  <a href="{{ route("users.followers", $user->id) }}">
    <strong id="followers" class="stat">
      {{count($user->followers)}}
    </strong>
    Followers
  </a>

  <a href="{{ route('users.show', $user) }}">
    <strong id="statuses" class="stat">
      {{count($user->statuses)}}
    </strong>
    Tweets
  </a>
</div>
