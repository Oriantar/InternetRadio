@extends('Layout.app')

@section('content')

<article>
    <a href="upload/create" class="middel"> Voeg een radio toe! </a>

    <section class="middel">
        <h1>Radio's</h1>
    </section>
    @foreach ($uploads as $upload)
    <section>
        
        <h2 class="middel">Radio naam: {{$upload->radio_name}}</h2>

        <p class="middel">Radio url: {{$upload->radio_url}}</p>
        <a href="upload/{{$upload->id}}/edit" class="middel">
            Edit radio;
        </a>
        <a href="play/{}"> Speel Radio:</a> 
        <hr>
    </section>
    @endforeach
</article>

@endsection