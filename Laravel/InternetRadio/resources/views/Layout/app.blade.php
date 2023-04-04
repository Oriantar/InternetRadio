<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <title>hallo schatjes</title>
</head>
<body>
    <header>
        {{-- <p>actieve radio: {{$activeRadio->radio_name}}</p> --}}
    </header>
    
    @yield('content')
    
    <footer>

    </footer>
</body>
</html>