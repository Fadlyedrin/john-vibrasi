@extends('frontend.layouts.app')

@section('title', 'About Us - ' . ($settings->company_name ?? 'Company'))

@section('content')

<!-- PAGE HEADER -->
<section class="py-24 relative overflow-hidden bg-white">
    <div class="absolute inset-0">
        <div class="absolute top-1/4 -left-20 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">
                About Us
            </h1>
            <p class="text-slate-600 max-w-2xl mx-auto">
                Learn more about our story & mission
            </p>
        </div>
    </div>
</section>

<!-- ABOUT CONTENT -->
@if($about)
<section class="pb-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- INTRO -->
        <div class="grid lg:grid-cols-2 gap-16 items-center mb-24">
            <div data-aos="fade-right">
                @if($about->image_url)
                    <img src="{{ $about->image_url }}"
                         alt="About"
                         class="rounded-3xl shadow-xl">
                @else
                    <div class="glass-light rounded-3xl aspect-video flex items-center justify-center">
                        <div class="w-24 h-24 rounded-full gradient-primary flex items-center justify-center">
                            <svg class="w-12 h-12 text-white"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                    </div>
                @endif
            </div>

            <div data-aos="fade-left">
                <h2 class="text-3xl font-bold text-slate-900 mb-6">
                    {{ $about->title }}
                </h2>
                <p class="text-slate-600 leading-relaxed whitespace-pre-line">
                    {{ $about->content }}
                </p>
            </div>
        </div>

        <!-- MISSION & VISION -->
        @if($about->mission_title || $about->vision_title)
        <div class="grid md:grid-cols-2 gap-8 mb-24">

            @if($about->mission_title)
            <div class="glass-light rounded-2xl p-8" data-aos="fade-up">
                <div class="w-14 h-14 rounded-xl gradient-primary flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-4">
                    {{ $about->mission_title }}
                </h3>
                <p class="text-slate-600 leading-relaxed">
                    {{ $about->mission_content }}
                </p>
            </div>
            @endif

            @if($about->vision_title)
            <div class="glass-light rounded-2xl p-8" data-aos="fade-up" data-aos-delay="100">
                <div class="w-14 h-14 rounded-xl gradient-primary flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-4">
                    {{ $about->vision_title }}
                </h3>
                <p class="text-slate-600 leading-relaxed">
                    {{ $about->vision_content }}
                </p>
            </div>
            @endif

        </div>
        @endif

        <!-- STATS -->
        @if($about->years_experience || $about->projects_completed || $about->happy_clients)
        <div class="glass-light rounded-3xl p-8 md:p-12" data-aos="fade-up">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">

                @if($about->years_experience)
                <div>
                    <p class="text-4xl md:text-5xl font-bold gradient-text mb-2">
                        {{ $about->years_experience }}+
                    </p>
                    <p class="text-slate-600">
                        Years Experience
                    </p>
                </div>
                @endif

                @if($about->projects_completed)
                <div>
                    <p class="text-4xl md:text-5xl font-bold gradient-text mb-2">
                        {{ $about->projects_completed }}+
                    </p>
                    <p class="text-slate-600">
                        Projects Completed
                    </p>
                </div>
                @endif

                @if($about->happy_clients)
                <div>
                    <p class="text-4xl md:text-5xl font-bold gradient-text mb-2">
                        {{ $about->happy_clients }}+
                    </p>
                    <p class="text-slate-600">
                        Happy Clients
                    </p>
                </div>
                @endif

            </div>
        </div>
        @endif

    </div>
</section>
@endif

@endsection
