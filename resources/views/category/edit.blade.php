@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="col-4 m-auto">
        <div class="d-flex justify-content-between mb-4">
            <h3>Edit category</h3>
            <a class="btn btn-success" href="{{ route('category.index') }}">List Products</a>
        </div>
        
        @if(session()->has('success'))
            <label class="alert alert-success w-100">{{session('success')}}</label>
        @elseif(session()->has('error'))
            <label class="alert alert-danger w-100">{{session('error')}}</label>
        @endif
        
        <form action="{{ route('category.update', $category->id) }}" method="POST">       
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control @error('name') border-danger @enderror" placeholder="category name" value="{{ $category->name }}">
                @error('name')
                <div class="text-danger">
                {{ ($message) }}
                <div>
                @enderror
            </div>
            <button type="submit" class="mt-3 btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection