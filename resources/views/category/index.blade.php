@extends('layouts.app')

@section('content')
<div class="container flex justify-center mt-3">
    <div>
        <h3>Category List</h3>
        <a class="btn btn-success btn-sm" href="{{ route('category.create') }}">Create New</a>
        <a class="btn btn-success btn-sm" href="{{ route('home') }}">Home Page</a>
    </div>
    <form action="{{ route('category.index') }}" method="GET" class="my-3">
        <input type="search" name="query" placeholder="Free Search"/>
        <button type="submit">Search</button>
    </form>
    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at->format('m/d/Y') }}</td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success btn-sm">Edit</a>
                    <form action="{{ route('category.delete', $category->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm delete-confirm">Delete</button>
                    </form>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between">
        {{ $categories->links() }}
    </div>
</div>
@endsection