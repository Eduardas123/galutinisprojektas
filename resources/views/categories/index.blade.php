@extends('categories.layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Category List</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
</div>
<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add Category</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                        @csrf 
                        @method('DELETE')                          
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $categories->links() }}
</div>
@endsection