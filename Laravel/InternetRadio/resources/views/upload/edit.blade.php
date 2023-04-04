@extends('Layout.app')

@section('content')

<article>
    <section>
        <h1>Update Radio!</h1>

    </section>

    <section>
        <form action="/upload" method="POST">
            @csrf
            <input type="text" name="radio_name" placeholder="radio naam">
            <input type="text" name="radio_url" placeholder="radio url">
            
            <button type="submit">submit</button>
        </form>
    </section>
</article>

@endsection