@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h3>Category Lists</h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Category Name</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at->format('m/d/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection