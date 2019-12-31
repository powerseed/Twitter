<form method="post" action="{{ route("statuses.store") }}">
  {{csrf_field()}}
  <textarea class="form-control" placeholder="What is new?" name="content" id="content" cols="30" rows="3">{{ old('content') }}</textarea>
  <div class="text-right">
    <button type="submit" class="btn btn-primary mb-3 mt-3">Submit</button>
  </div>
</form>
