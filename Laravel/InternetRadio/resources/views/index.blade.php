@extends('Layout.app')

@section('content')
<article class="flex justify-center">
    <form action="/nieuweRadio" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="block">
            <input type="file" 
            class="block shadow-5l mb-10 p-2 w-80 italic" 
            name="image" 
            id="naam">
            <input type="text" 
            class="block shadow-5l mb-10 p-2 w-80 italic" 
            name="hoi" 
            id="naam">
            
        </section>
@endsection