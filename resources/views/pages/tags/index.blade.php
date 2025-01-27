@extends('layouts.main')

@section('title', 'Tags')

@section('content')
    {{-- {{ dd($feeds) }} --}}
    {{-- <ul>
        @foreach ($tags as $tag )
        <li>
            <a href="{{ route('tag.show', ['tag'=> $tag->id])  }}">
                {{ $tag->name }}
            </a>
        </li>
        @endforeach
    </ul> --}}
    <div class="container">

        @if (session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            
        @endif
        <h1>Tag Listing</h1>

        <a type="button" class="btn btn-primary mb-3" href="{{ route('tag.create') }}">New Tag</a>
        
        @foreach ($tags as $tag )
        <div class="card mb-3" style="width: 50%;">
            <div class="card-body">
            <h5 class="card-title">{{ $tag->name }}</h5>
            </div>
        </div>
        @endforeach    

        <div class="d-flex justify-content-start">
            {{ $tags->links() }}
        </div>
        
    </div>
    
@endsection