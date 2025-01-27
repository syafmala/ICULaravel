@extends('layouts.main')

@section('title', 'Create Feed')

@section('content')

<h1>Create Feed</h1>
<div class="container">

    {{-- @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li> ({ $error })</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('feed.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            {{-- <input type="text" class="form-control" id="title" name="title" required minlength="3" maxlength="100"> --}}
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" column="30" rows="10"></textarea>
        </div>

        @forelse ($tags as $tag)
        <div class="form-check">
            <input
                class="form-check-input"
                type="checkbox"
                value="{{ $tag->id }}"
                name="tags[]"
                id="tag-{{ $tag->id }}">
            <label
                class="form-check-label"
                for="tag-{{ $tag->id }}">
                {{ $tag->name }}
            </label>
        </div>
        @empty
        <p>No tags available.</p>
        @endforelse

        <button type="submit" class="btn btn-primary">Save Feed</button>
    </form>
</div>

@endsection