<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    


    <script src="/js/jquery.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.js"></script>
</body>
</html>
