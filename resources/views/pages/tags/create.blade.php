@extends('layouts.main')

@section('title', 'Create Tags')

@section('content')

    <h1>Create Tag</h1>
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

        <form action="{{ route('tag.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Tag Name</label>
                {{-- <input type="text" class="form-control" id="name" name="title" required minlength="3" maxlength="100"> --}}
                <input type="text" class="form-control" id="name" name="name" >
            </div>

            <!-- <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" column="30" rows="10"></textarea>
            </div> -->

            <button type="submit" class="btn btn-primary">Save Tag</button>
        </form>
    </div>

@endsection