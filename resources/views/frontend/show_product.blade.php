@extends('frontend.layouts.app')

@section('title', $product->name)

@section('content')
@php
    $images = $product->images_url->count()
        ? $product->images_url
        : collect([$product->image_url]);
@endphp

<section class="pt-24 pb-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">

        {{-- ================= IMAGE SLIDER (LOGIC TETAP) ================= --}}
        <div
            x-data="{
                images: {{ $images->values()->toJson() }},
                index: 0,
                showLightbox: false,
                timer: null,

                start() {
                    if (this.images.length <= 1) return
                    this.timer = setInterval(() => {
                        this.index = (this.index + 1) % this.images.length
                    }, 5000)
                },

                stop() {
                    clearInterval(this.timer)
                }
            }"
            x-init="start()"
            @mouseenter="stop()"
            @mouseleave="start()"
            class="mb-20"
        >

            <!-- MAIN IMAGE -->
            <div
                class="relative overflow-hidden rounded-3xl bg-black
                       shadow-2xl transition-transform duration-500
                       hover:scale-[1.01]"
            >
                <div
                    class="flex w-full transition-transform duration-700 ease-in-out"
                    :style="`transform: translateX(-${index * 100}%)`"
                >
                    <template x-for="(img, i) in images" :key="i">
                        <div class="w-full flex-shrink-0">
                            <img
                                :src="img"
                                @click="showLightbox = true"
                                class="w-full h-[420px] sm:h-[520px] lg:h-[680px]
                                       object-cover cursor-zoom-in select-none"
                                alt="{{ $product->name }}"
                            >
                        </div>
                    </template>
                </div>
            </div>

            <!-- THUMBNAILS -->
            <div
                class="flex justify-center gap-4 mt-8 overflow-x-auto"
                x-show="images.length > 1"
            >
                <template x-for="(img, i) in images" :key="i">
                    <button
                        @click="index = i"
                        class="flex-shrink-0 rounded-xl overflow-hidden
                               transition-all duration-300 ring-offset-2
                               hover:-translate-y-1 hover:shadow-xl"
                        :class="index === i
                            ? 'ring-2 ring-primary-400'
                            : 'opacity-60 hover:opacity-100'"
                    >
                        <img
                            :src="img"
                            class="w-24 h-24 object-cover select-none"
                            alt=""
                        >
                    </button>
                </template>
            </div>

            <!-- LIGHTBOX -->
            <div
                x-show="showLightbox"
                x-transition.opacity
                x-cloak
                @keydown.escape.window="showLightbox = false"
                class="fixed inset-0 z-[999] bg-black/90 flex items-center justify-center"
            >
                <!-- CLOSE -->
                <button
                    @click="showLightbox = false"
                    class="absolute top-6 right-6 text-white text-3xl font-bold
                           hover:scale-110 transition"
                >
                    ✕
                </button>

                <!-- PREV -->
                <button
                    @click="index = (index - 1 + images.length) % images.length"
                    x-show="images.length > 1"
                    class="absolute left-6 text-white text-5xl select-none
                           hover:scale-110 transition"
                >
                    ‹
                </button>

                <!-- IMAGE -->
                <img
                    :src="images[index]"
                    class="max-w-[92vw] max-h-[92vh]
                           object-contain rounded-2xl shadow-2xl"
                    alt=""
                >

                <!-- NEXT -->
                <button
                    @click="index = (index + 1) % images.length"
                    x-show="images.length > 1"
                    class="absolute right-6 text-white text-5xl select-none
                           hover:scale-110 transition"
                >
                    ›
                </button>
            </div>

        </div>

        {{-- ================= PRODUCT INFO ================= --}}
        <div class="max-w-3xl mx-auto text-center">

            <h1
                class="text-4xl md:text-5xl font-extrabold text-black mb-6
                       transition-transform duration-500 hover:scale-[1.02]"
            >
                {{ $product->name }}
            </h1>

            <div class="flex justify-center mb-8">
                <span class="h-1 w-24 rounded-full gradient-primary"></span>
            </div>

            <p class="text-black/70 text-lg leading-relaxed mb-12">
                {{ $product->description }}
            </p>

            {{-- ================= ACTION BUTTONS ================= --}}
            <div class="flex justify-center gap-5 flex-wrap">

                <a
                    href="{{ route('contact') }}?product={{ $product->name }}"
                    class="inline-flex items-center justify-center
                           gradient-primary px-10 py-4 rounded-2xl
                           text-black font-semibold
                           transition-all duration-300
                           hover:-translate-y-1 hover:shadow-xl
                           hover:shadow-primary-500/30
                           active:scale-95"
                >
                    Request This Product
                </a>

                @if ($product->drive_link)
                <a
                    href="{{ $product->drive_link }}"
                    target="_blank"
                    rel="noopener"
                    class="inline-flex items-center gap-3
                           px-9 py-4 rounded-2xl
                           bg-black/10 backdrop-blur
                           text-black font-semibold
                           transition-all duration-300
                           hover:bg-black/20
                           hover:-translate-y-1
                           hover:shadow-xl
                           active:scale-95"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M12 5v14m7-7H5" />
                    </svg>
                    BROSUR & TDS
                </a>
                @endif

            </div>

        </div>

    </div>
</section>
@endsection
