@extends('layouts.main')

@section('title', 'My Feeds')

@section('content')
    {{-- {{ dd($feeds) }} --}}
    {{-- <ul>
        @foreach ($feeds as $feed )
        <li>
            <a href="{{ route('feed.show', ['feed'=> $feed->id])  }}">
                {{ $feed->title }}
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
        <h1>Feed Listing</h1>

        <a type="button" class="btn btn-primary mb-3" href="{{ route('feed.create') }}">New Feed</a>
        
        @foreach ($feeds as $feed )
        <div class="card mb-3" style="width: 50%;">
            <div class="card-body">
            <h5 class="card-title">{{ $feed->title }}</h5>
            <p class="card-text">{{ $feed->description }}</p>
            </div>
        </div>
        @endforeach    

        <div class="d-flex justify-content-start">
            {{ $feeds->links() }}
        </div>
        
    </div>
    
@endsection