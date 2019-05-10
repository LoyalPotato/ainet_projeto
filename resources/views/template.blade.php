<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{ $pagetitle }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <script src="//code.jquery.com/jquery.js"></script>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1>{{$pagetitle}}</h1>
        </div>
        <hr>
        <p>
            @yield('content')
        </p>
    </div>
</body>

</html>