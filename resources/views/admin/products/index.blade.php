@extends('admin.layouts.app')

@section('title', 'Products')
@section('subtitle', 'Manage your products')

@section('content')
<div class="flex justify-end mb-6">
    <a href="{{ route('admin.products.create') }}"
       class="btn-primary flex items-center gap-2">
        + Add Product
    </a>
</div>

<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
@forelse($products as $product)
    <div class="admin-card overflow-hidden">
        <img src="{{ $product->image_url }}" class="h-44 w-full object-cover">

        <div class="p-5 space-y-3">
            <h3 class="font-semibold text-white">{{ $product->name }}</h3>
            <p class="text-white/50 text-sm line-clamp-2">{{ $product->description }}</p>

            <div class="flex justify-between items-center pt-3">
                <span class="{{ $product->is_active ? 'badge-success' : 'badge-muted' }}">
                    {{ $product->is_active ? 'Active' : 'Inactive' }}
                </span>

                <div class="flex gap-2">
                    <a href="{{ route('admin.products.edit', $product) }}"
                       class="text-white/70 hover:text-white">Edit</a>

                    <form method="POST"
                          action="{{ route('admin.products.destroy', $product) }}"
                          onsubmit="return confirm('Delete product?')">
                        @csrf @method('DELETE')
                        <button class="text-red-400 hover:text-red-500">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@empty
    <p class="text-white/50">No products found.</p>
@endforelse
</div>

<div class="mt-8">{{ $products->links() }}</div>
@endsection
