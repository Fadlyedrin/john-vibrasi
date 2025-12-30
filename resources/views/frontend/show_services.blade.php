@extends('frontend.layouts.app')

@section('title', $service->title)

@section('content')
@php
    $images = collect([]);

    if (!empty($service->images)) {
        $images = collect($service->images)->map(fn($img) => asset('storage/' . $img));
    } elseif ($service->image) {
        $images = collect([$service->image_url]);
    }
@endphp

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">

        {{-- TITLE --}}
        <h1
            class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-6 text-center
                   transition-all duration-700 ease-out hover:scale-[1.02]"
            data-aos="fade-up"
        >
            {{ $service->title }}
        </h1>

        <div class="flex justify-center mb-12">
            <span class="h-1 w-24 rounded-full gradient-primary"></span>
        </div>

        {{-- IMAGE SLIDER (TIDAK DIUBAH) --}}
        @if ($images->count())
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
                    }, 50000)
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
            <div class="relative overflow-hidden rounded-3xl bg-black">
                <div class="flex w-full transition-transform duration-700 ease-in-out"
                    :style="`transform: translateX(-${index * 100}%)`">
                    <template x-for="(img, i) in images" :key="i">
                        <div class="w-full flex-shrink-0">
                            <img
                                :src="img"
                                @click="showLightbox = true"
                                class="w-full h-[420px] sm:h-[520px] lg:h-[680px]
                                       object-cover cursor-zoom-in select-none"
                                alt="{{ $service->title }}"
                            >
                        </div>
                    </template>
                </div>
            </div>

            <!-- THUMBNAILS -->
            <div class="flex justify-center gap-4 mt-6 overflow-x-auto" x-show="images.length > 1">
                <template x-for="(img, i) in images" :key="i">
                    <button
                        @click="index = i"
                        class="flex-shrink-0 rounded-xl overflow-hidden transition ring-offset-2
                               hover:-translate-y-1 hover:shadow-lg"
                        :class="index === i
                            ? 'ring-2 ring-primary-400'
                            : 'opacity-60 hover:opacity-100'"
                    >
                        <img :src="img" class="w-24 h-24 object-cover select-none">
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
                <button @click="showLightbox = false"
                    class="absolute top-6 right-6 text-white text-3xl font-bold">
                    ✕
                </button>

                <button
                    @click="index = (index - 1 + images.length) % images.length"
                    x-show="images.length > 1"
                    class="absolute left-6 text-white text-5xl select-none">
                    ‹
                </button>

                <img
                    :src="images[index]"
                    class="max-w-[92vw] max-h-[92vh] object-contain rounded-2xl shadow-2xl"
                >

                <button
                    @click="index = (index + 1) % images.length"
                    x-show="images.length > 1"
                    class="absolute right-6 text-white text-5xl select-none">
                    ›
                </button>
            </div>

        </div>
        @endif

        {{-- DESCRIPTION --}}
        <div class="max-w-7xl mx-auto mb-20" data-aos="fade-up">
            <h1 class="text-3xl font-bold text-slate-900 mb-4">
                Apa itu {{ $service->title }}?
            </h1>

            <p class="text-slate-600 text-lg leading-relaxed">
                {{ $service->description }}
            </p>
        </div>

        {{-- FEATURES --}}
        @if ($service->features)
        <div
            class="glass-light rounded-3xl p-10 mb-20
                   transition-all duration-500
                   hover:-translate-y-1 hover:shadow-xl"
            data-aos="fade-up"
        >
            <h3 class="text-2xl font-semibold text-slate-900 mb-8">
                Equipment yang dapat kami kerjakan
            </h3>

            <ul class="grid sm:grid-cols-2 gap-6">
                @foreach ($service->features as $feature)
                <li
                    class="flex items-start gap-4 text-slate-700
                           transition duration-300 hover:translate-x-1"
                >
                    <span
                        class="flex items-center justify-center w-7 h-7
                               rounded-full bg-primary-100 text-primary-600 font-bold">
                        ✓
                    </span>
                    <span class="leading-relaxed">{{ $feature }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- YOUTUBE --}}
        @if ($service->youtube_url)
            @php
                preg_match(
                    '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                    $service->youtube_url,
                    $match
                );
                $youtubeId = $match[1] ?? null;
            @endphp

            @if ($youtubeId)
            <div class="mb-24" data-aos="zoom-in">
                <h2 class="text-3xl font-bold text-slate-900 mb-6 text-center">
                    Proses {{ $service->title }}
                </h2>

                <div
                    class="relative w-full overflow-hidden rounded-3xl shadow-2xl
                           transition-transform duration-500 hover:scale-[1.01]"
                    style="padding-top:56.25%"
                >
                    <iframe
                        src="https://www.youtube.com/embed/{{ $youtubeId }}"
                        class="absolute inset-0 w-full h-full"
                        frameborder="0"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
            @endif
        @endif

    </div>
</section>

{{-- CTA --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div
            class="relative rounded-3xl p-14 md:p-20 text-center overflow-hidden
                   transition-all duration-500 hover:scale-[1.01]"
            data-aos="fade-up"
        >
            <div class="absolute inset-0 gradient-primary opacity-10"></div>

            <div class="relative">
                <h2 class="text-3xl md:text-4xl font-bold text-black mb-4">
                    Looking for a {{ $service->title }}?
                </h2>

                <p class="text-black/70 max-w-2xl mx-auto mb-10">
                    Contact us today to learn more about our {{ $service->title }} and get the best solution for your needs.
                </p>

                <a
                    href="https://wa.me/6281234567890"
                    class="inline-flex items-center gap-3 px-10 py-5 rounded-2xl
                           gradient-primary text-black font-semibold
                           transition-all duration-300
                           hover:-translate-y-1 hover:shadow-xl hover:shadow-primary-500/30"
                >
                    CONTACT US
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
