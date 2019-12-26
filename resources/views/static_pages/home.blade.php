@extends("layouts.default")
@section("title", "Home")
@section("content")
  <div class="jumbotron">
    <h1>Hello Laravel</h1>
    <p class="lead">This is Laravel tutorial</p>
    <a class="btn btn-lg btn-success" href="{{ route("signup") }}">Sign up</a>
  </div>
@stop
