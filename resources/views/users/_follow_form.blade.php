@can("follow", $user)
  <div class="mt-4 mb-4 text-center">
    @if(Auth::user()->isFollowing($user))
      <form method="post" action="{{route("followers.destroy", $user)}}">
        {{csrf_field()}}
        {{method_field("delete")}}
        <button type="submit" class="btn btn-primary">Unfollow</button>
      </form>
    @else
      <form method="post" action="{{route("followers.store", $user)}}">
        {{csrf_field()}}
        <button type="submit" class="btn btn-primary">follow</button>
      </form>
    @endif
  </div>
@endcan
