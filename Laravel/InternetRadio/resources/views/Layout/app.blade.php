<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <title>De PaddenstoelRadio</title>
</head>
<body>
    <header>
        <h1>De PaddenstoelRadio</h1>
        <img class="logo" src="{{asset('Images/paddenstoel.png')}}">
    </header>

    <main>
    @yield('content')
    </main>
    
    <footer>
        <p>De PaddenstoelRadio is een project van Floribanaan/Oriantar.</p>

    </footer>
</body>
</html>