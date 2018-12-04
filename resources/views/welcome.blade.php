<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript">
        window.Laravel = { csrf_token: `{{ csrf_token() }}`}
        </script>

        <title>Ultimate Blog Warrior</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
    </head>
    <body>
        <div id="app">
          <vue-app></vue-app>
        </div>
        <script src="{{ asset('js/app.js')}}" charset="utf-8"></script>
    </body>
</html>
