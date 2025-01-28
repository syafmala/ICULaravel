@extends('layouts.main')

@section('title', 'Feed List')

@section('content')

    {{-- {{ dd($feed) }} --}}
    <h1>Edit Feed</h1>
    
    <div class="container">
        <form action="{{ route('feed.update', ['feed' => $feed->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $feed->title) }}" required minlength="3" maxlength="100">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" column="30" rows="10">{{ old('description', $feed->description) }}</textarea>
            </div>

            {{-- update tag and select preselected tags as a checkbox--}}
            <div class="mb-3">
                <label for="tags">Tags</label>
                <div class="form-check">
                @foreach ($tags as $tag)
                    <input 
                    class="form-check-input" 
                    type="checkbox" 
                    name="tags[]" 
                    value="{{ $tag->id }}"
                    @if (in_array($tag->id, old('tags', $feed->tags->pluck('id')->toArray())))
                        checked
                    @endif
                    >
                    <label class="form-check
                    -label" for="tags">{{ $tag->name }}</label>
                @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Feed</button>
        </form>
    </div>
    
@endsection