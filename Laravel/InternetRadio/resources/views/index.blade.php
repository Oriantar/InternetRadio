@extends('Layout.app')


@section('content')
<a href="/upload">Radio's</a>

<a href="/volgende">Volgende Radio</a>
<a href="/vorige">Vorige Radio</a>

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
@endsection