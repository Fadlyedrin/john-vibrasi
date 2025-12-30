@extends('frontend.layouts.app')

@section('title', $portfolio->title . ' - ' . ($settings->company_name ?? 'Company'))

@section('content')

<!-- PORTFOLIO DETAIL -->
<section class="py-24 relative overflow-hidden">

    <!-- Background Blur -->
    <div class="absolute inset-0">
        <div class="absolute top-1/3 -right-24 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 -left-24 w-96 h-96 bg-accent-500/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative">

        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-primary-400 font-medium uppercase tracking-wide">
                {{ $portfolio->category }}
            </span>

            <h1 class="text-3xl md:text-4xl font-bold text-white mt-3 mb-4">
                {{ $portfolio->title }}
            </h1>

            @if($portfolio->client_name)
                <p class="text-white/60">
                    Client: {{ $portfolio->client_name }}
                </p>
            @endif
        </div>

        <!-- Content Card -->
        <div class="relative w-full overflow-hidden rounded-3xl
                        bg-gradient-to-br from-black/40 to-black/20">

            <!-- Image -->
           <div class="flex items-center justify-center w-full h-[70vh] max-h-[520px]">
                @if($portfolio->image_url)
                <img
                    src="{{ $portfolio->image_url }}"
                    alt="{{ $portfolio->title }}"
                    class="max-w-full max-h-full object-contain
                        transition-transform duration-500 hover:scale-105"
                />
                @else
                    <div class="w-full h-full bg-gradient-to-br from-primary-500/30 to-accent-500/30 flex items-center justify-center">
                        <span class="text-white/50 text-sm">
                            No Image Available
                        </span>
                    </div>
                @endif

                <!-- Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-dark-900/90 via-dark-900/40 to-transparent"></div>
            </div>

            <!-- Text Content -->
            <div class="p-8 md:p-12">

                @if($portfolio->description)
                    <p class="text-white/70 text-lg leading-relaxed mb-10">
                        {{ $portfolio->description }}
                    </p>
                @endif

                <!-- Action -->
                @if($portfolio->project_url)
                    <a href="{{ $portfolio->project_url }}"
                       target="_blank"
                       class="inline-flex items-center gap-3 px-8 py-4 rounded-xl gradient-primary text-white font-semibold hover:opacity-90 transition">
                        Visit Project

                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                @endif

            </div>
        </div>

    </div>
</section>

@endsection
