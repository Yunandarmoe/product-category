@extends('layouts.app')

@section('content')
<div class="container flex justify-center mt-3">
    <div>
        <h3>Products List</h3>
        <a class="btn btn-success btn-sm" href="{{ route('product.create') }}">Product Create New</a>
        <a class="btn btn-success btn-sm" href="{{ route('home') }}">Home Page</a>
    </div>
    <form action="{{ route('product.index') }}" method="GET" class="my-3">
        <input type="search" name="query" placeholder="Free Search"/>
        <button type="submit">Search</button>
    </form>
    <table class="table">
      <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    @foreach($product->categories as $category)
                    {{ $category->name . ',' }}
                    @endforeach
                </td>
                <td>{{ $product->created_at->format('m/d/Y') }}</td>
                <td>
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success btn-sm">Edit</a>
                    <form action="{{ route('product.delete', $product->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm delete-confirm">Delete</button>
                    </form>
                </td>               
            </tr>
        @endforeach
      </tbody>
    </table>

    <div class="d-flex justify-content-between">
        {{ $products->links() }}
    </div>
  </div>
@endsection