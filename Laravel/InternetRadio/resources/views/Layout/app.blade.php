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
        <?php
            $index = 1;
        ?>
        @foreach($uploads as $upload)

            @if ( $index == $actief->actief)
                <section>
                    <h1>Radio naam: {{$upload->radio_name}}</h1>
                    <p>Radio url: {{$upload->radio_url}}</p>
                </section>

            
            @endif
            <?php
                $index = $index + 1;
            ?>
        @endforeach
    </header>
    
    @yield('content')
    
    <footer>

    </footer>
</body>
</html>