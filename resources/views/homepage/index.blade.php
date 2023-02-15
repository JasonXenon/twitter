<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>

    <h1 class="text-center">Liste des tweets</h1>
    <ul>
    @foreach($tweets as $tweet)
    <li>{{ $tweet->text }}</li>
    @endforeach
    </ul>
</body>
</html>


