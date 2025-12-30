@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('content')
<form method="POST"
      action="{{ route('admin.products.update', $product) }}"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    @include('admin.products.form', ['product' => $product])

    <button class="btn-primary mt-6">
        Update Product
    </button>
</form>
@endsection
