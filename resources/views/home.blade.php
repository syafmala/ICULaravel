@extends('layouts.main')

@section('title', 'Home')

@section('content')
    @php($_name = $name ?? "team")
    
    @if ($_name == "diba")
        <p>You are banned</p>
    @else
        <h1> Hello, {{ $_name }}</h1>
     @endif

     <button type="button" class="btn btn-dark">Click Me</button>
@endsection


