@extends('layouts.app')
@section('content')

    <div class="container mt-5 position-relative z-index-1 rounded-3 p-5 bg-light">
        <h2>{{ $todo ? 'Edit Todo' : 'Add Todo' }}</h2>
        @if (session('status'))
            <div class="alert alert-success text-white" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{-- Displaying errors --}}
        @if ($errors->any())
            <div class="alert alert-danger text-white" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ $todo ? route('createOrUpdateTodo', $todo->id) : route('createOrUpdateTodo') }}">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" value="{{ $todo ? $todo->title : old('title') }}"
                    class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="5"
                    placeholder="Enter content">{{ $todo ? $todo->content : old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">{{ $todo ? 'Update' : 'Submit' }}</button>
        </form>
    </div>
@endsection
