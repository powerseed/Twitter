<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <script src="https://kit.fontawesome.com/28f6bc4f7a.js" crossorigin="anonymous"></script>
  <title>@yield("title", "Meow")</title>
</head>
<body>
  <div style="min-height: calc(100vh - 75px);margin-bottom: 0px; padding-bottom: 0px">
    @include("layouts._header")
    <div class="container">
      @yield("content")
    </div>
  </div>
  @include("layouts._footer")
  <script src="{{ mix("js/app.js") }}"></script>
</body>
</html>
