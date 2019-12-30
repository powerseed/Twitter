<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Email confirmation</title>
</head>
<body>
  <h1>Thank you for signing up at Twitter</h1>
  <p>
    Please click the link below to complete the signing up.
    <a href="{{ route("confirm_email", $user->activation_token) }}">
      {{ route("confirm_email", $user->activation_token) }}
    </a>
  </p>

  <p>
    If you didn't sign up at Twitter, please ignore this email.
  </p>
</body>
</html>
