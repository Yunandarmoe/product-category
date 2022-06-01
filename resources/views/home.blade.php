@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="col-4">
        <div class="flex justify-center">
            <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm">Products Create</a>
            <a href="{{ route('category.index') }}" class="btn btn-primary btn-sm">Category Create</a>
        </div>
    </div>
</div>

@endsection