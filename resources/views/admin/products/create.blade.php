@extends('admin.layouts.app')

@section('title', 'Add Product')

@section('content')
<form method="POST"
      action="{{ route('admin.products.store') }}"
      enctype="multipart/form-data">

    @csrf

    @include('admin.products.form')

    <button class="btn-primary mt-6">
        Save Product
    </button>
</form>
@endsection
