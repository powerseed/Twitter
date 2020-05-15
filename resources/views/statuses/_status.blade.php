<li class="list-group-item">
  <div class="row">
    <div class="gravatar col-lg-2 d-flex align-items-center">
      <img class="mr-4" src="{{ $user->gravatar(70) }}" alt="User gravatar">
    </div>

    <div class="col-lg-8 d-flex align-items-center">
      <div>
        <a href="{{ route("users.show", $user->id) }}">
          <h5 style="display: inline-block">{{ $user->name }}</h5>
        </a> · <span>{{ $status->created_at->diffForHumans() }}</span>

        <p>
          {{ $status->content }}
        </p>
      </div>
    </div>

    <div class="col-lg-2 d-flex align-items-center">
      @can("destroy", $status)
        <form class="float-right" method="post" action="{{route("statuses.destroy", $status->id)}}">
          {{csrf_field()}}
          {{method_field("DELETE")}}
          <button class="btn btn-danger mt-3 ml-3" type="submit">Delete</button>
        </form>
      @endcan
    </div>
  </div>
</li>
