<!doctype html>
<html>
<head>
    <title>@yield('page_title'){{ config('app.name', 'Postkiki') }}</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 

    <link rel="stylesheet" href="{{ config('app.url').'/postkiki/public/css/bootstrap.min.css' }}" />
    <link rel="stylesheet" href="{{ config('app.url').'/postkiki/public/css/custom.css' }}" />
</head>

<body>
    @include('inc.navbar')

    <div class="container">
        @yield('content')
    </div>
</body>
</html>

