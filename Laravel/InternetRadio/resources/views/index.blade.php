@extends('Layout.app')


@section('content')
<a href="/upload">Radio's</a>

<a href="/volgende">Volgende Radio</a>
<a href="/vorige">Vorige Radio</a>

<?php
$index = 1;
?>
<section class="middendeel">
    <section class="welkom">
        <h2>Welkom luisteraar!</h2>
        <p>Dit is het dashboard van de PaddenstoelRadio.</p>
        <hr>
    </section>
<section class="huidig">
@foreach($uploads as $upload)

@if ( $index == $actief->actief)
    <p>Je luistert nu naar</p>
    <p class="huidigbalkje">{{$upload->radio_name}}</p>
    <a href="/upload" class="radiolijst">
        <img src="{{asset('Images/lijst.webp')}}">
    </a>
    <a href="/upload/create" class="toevoegen">
            <img src="{{asset('Images/plus.webp')}}">
    </a>
    <hr>



@endif
<?php
    $index = $index + 1;
?>
@endforeach
</section>

<section class="volume">
    <img src="{{asset('Images/speaker_luid.webp')}}">
    <button class="volumeknop" id="volume1"></button>
    <button class="volumeknop" id="volume2"></button>
    <button class="volumeknop" id="volume3"></button>
    <button class="volumeknop" id="volume4"></button>
    <button class="volumeknop" id="volume5"></button>
    <img src="{{asset('Images/speaker_luid.webp')}}">
    <div class="verticale_lijn"></div>
</section>

<section class="stop">
    <button class="stopknop">STOP</button>
    <p>Druk op deze knop om de radio te blokkeren. Kan alleen hier weer teruggedraaid worden.</p>
</section>
</section>
@endsection


