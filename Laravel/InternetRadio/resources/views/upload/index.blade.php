@extends('Layout.app')

@section('content')

<article>
    <a href="create"> Voeg een radio toe! </a>

    <section>
        <h1>Uploads</h1>
    </section>
    @foreach ($uploads as $upload)
    <section>
        <span>
            
        </span>

        <h2>Radio naam: {{$upload->radio_name}}</h2>

        <p>Radio url: {{$upload->radio_url}}</p>
        <a href="upload/{{$upload->id}}/edit">
            Edit radio;
        </a>
        <hr>
    </section>
    @endforeach
</article>

@endsection