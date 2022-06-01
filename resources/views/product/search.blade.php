@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h3>Product Lists</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Product Name</th>
                <th scope="col">Category Name</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>   
            <tr>
                @foreach($products as $product)      
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>
                    @foreach($product->categories as $category)  
                    <span>{{ $category->name . ',' }}</span>
                    @endforeach
                </td>
                <td>{{ $product->created_at->format('m/d/Y') }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endsection