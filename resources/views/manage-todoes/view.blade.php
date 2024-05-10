@extends('layouts.app')
@section('content')
    <div class="container mt-5 position-relative z-index-1 rounded-3 p-5 bg-light">
        <div class="d-flex align-items-center">
            <h2 class="d-inline">Todos List</h2>
            <a class="btn btn-primary ms-auto" href="{{ route('EditTodo') }}">Add Todo</a>
        </div>
        <div class="bg-white rounded-3 p-3">
            @if (session('status'))
                <div class="alert alert-success text-white" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (count($todos))
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($todos as $index => $todo)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $todo->title }}</td>
                                <td>{{ Str::limit($todo->content, 50) }}</td>
                                <td>
                                    <form method="POST" action="{{ route('deleteTodo', $todo) }}">
                                        @csrf
                                        <a href="{{ route('EditTodo', $todo->id) }}" class="btn btn-primary">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info text-white" role="alert">
                    No todos available.
                </div>
            @endif
        </div>
    </div>
@endsection
