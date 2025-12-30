@extends('frontend.layouts.app')

@section('title', 'Products')

@section('content')
<section class="py-24">
<div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 lg:grid-cols-3 gap-10">

@foreach($products as $product)
<a href="{{ route('products.show', $product) }}"
   class="glass rounded-3xl overflow-hidden group hover-lift">

    <img src="{{ $product->image_url }}"
         class="h-64 w-full object-cover group-hover:scale-110 transition">

    <div class="p-6">
        <h3 class="text-white text-xl font-semibold mb-2">
            {{ $product->name }}
        </h3>
        <p class="text-white/60 text-sm line-clamp-3">
            {{ $product->description }}
        </p>
    </div>
</a>
@endforeach


</div>
</section>
@endsection
