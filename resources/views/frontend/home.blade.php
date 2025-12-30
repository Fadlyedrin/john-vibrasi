@extends('frontend.layouts.app')

@section('title', $settings->company_name ?? 'Home')

@section('content')
<section
    class="relative min-h-screen bg-center bg-cover pt-20"
    style="
        background-image:
        linear-gradient(rgba(15,23,42,0.75), rgba(15,23,42,0.75)),
        url('{{ $hero->foreground_image_url ?? asset('images/hero-default.jpg') }}');
    "
>
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- 🔥 LOGO PARTNER (POSISI PERSIS AREA YANG DILINGKARI) -->
    <div class="absolute top-3 left-40 inset-x-0 z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <img
                src="https://kompaspedia.kompas.id/wp-content/uploads/2022/06/Logo-Pertamina-resize-2-1.png"
                alt="Partner Logo"
                class="h-8 sm:h-10 object-contain opacity-90"
            >
        </div>
    </div>

    <!-- HERO CONTENT -->
    <div class="relative z-10 flex items-center min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 text-center">

            @if($hero->subtitle ?? false)
                <p class="text-primary-400 font-semibold tracking-widest mb-4 uppercase">
                    {{ $hero->subtitle }}
                </p>
            @endif

            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white leading-tight mb-8">
                {{ $hero->title ?? 'We Build Digital Experiences That Matter' }} <br>
                <span class="text-primary-400">
                    {{ $hero->title_highlight ?? 'PROFESSIONAL & TRUSTED' }}
                </span>
            </h1>

            @if($hero->description ?? false)
                <p class="text-lg md:text-xl text-white/80 max-w-3xl mx-auto mb-12">
                    {{ $hero->description }}
                </p>
            @endif

            <div class="flex flex-wrap justify-center gap-6">
                <a href="{{ $hero->button_link ?? '#' }}"
                   class="px-10 py-4 rounded-md bg-primary-500 hover:bg-primary-600
                          text-white font-bold transition">
                    {{ $hero->button_text ?? 'Start Your Project' }}
                </a>

                <a href="{{ $hero->button_link_secondary ?? '#' }}"
                   class="px-10 py-4 rounded-md border-2 border-white/70
                          text-white font-bold hover:bg-white hover:text-black transition">
                    {{ $hero->button_text_secondary ?? 'View Our Work' }}
                </a>
            </div>

        </div>
    </div>
</section>

<!-- About Preview -->
    @if ($about)
        <section class="py-24 relative glass-light">
            <div class="absolute inset-0">
                <div class="absolute top-1/2 left-1/4 w-64 h-64 bg-primary-500/10 rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div data-aos="fade-right">
                        @if ($about->image_url)
                            <img src="{{ $about->image_url }}" alt="About" class="rounded-3xl shadow-2xl">
                        @else
                            <div class="glass rounded-3xl aspect-square flex items-center justify-center">
                                <div class="text-center">
                                    <div
                                        class="w-24 h-24 mx-auto rounded-full gradient-primary flex items-center justify-center mb-4">
                                        <svg class="w-12 h-12 text-black" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <p class="text-black/60">About Us Image</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div data-aos="fade-left">
                        <h2 class="text-3xl md:text-4xl font-bold text-black mb-6">{{ $about->title }}</h2>
                        <p class="text-black/70 mb-8 leading-relaxed">{{ Str::limit($about->content, 300) }}</p>

                        @if ($about->years_experience || $about->projects_completed || $about->happy_clients)
                            <div class="grid grid-cols-3 gap-6 mb-8">
                                @if ($about->years_experience)
                                    <div>
                                        <p class="text-3xl font-bold gradient-text">{{ $about->years_experience }}+</p>
                                        <p class="text-black/60 text-sm">Years Experience</p>
                                    </div>
                                @endif
                                @if ($about->projects_completed)
                                    <div>
                                        <p class="text-3xl font-bold gradient-text">{{ $about->projects_completed }}+</p>
                                        <p class="text-black/60 text-sm">Projects Done</p>
                                    </div>
                                @endif
                                @if ($about->happy_clients)
                                    <div>
                                        <p class="text-3xl font-bold gradient-text">{{ $about->happy_clients }}+</p>
                                        <p class="text-black/60 text-sm">Happy Clients</p>
                                    </div>
                                @endif
                            </div>
                        @endif

                        <a href="{{ route('about') }}"
                            class="inline-flex items-center px-6 py-3 rounded-xl gradient-primary text-black font-semibold hover:shadow-lg hover:shadow-primary-500/30 transition-all">
                            Learn More About Us
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif



    <!-- Services Preview -->
    @if ($services->count() > 0)
        <section class="py-24 relative glass-light">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-black mb-4">Our Services</h2>
                    <p class="text-black/60 max-w-2xl mx-auto">Comprehensive solutions tailored to transform your digital
                        presence and drive business growth.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($services as $index => $service)
                        <div class="glass rounded-2xl p-8 hover-lift" data-aos="fade-up"
                            data-aos-delay="{{ $index * 100 }}">
                            @if ($service->image)
                                <div class="w-full h-48 mb-6 overflow-hidden rounded-2xl">
                                    <img src="{{ $service->image_url }}" alt="{{ $service->title }}"
                                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                </div>
                            @else
                                <div class="w-16 h-16 rounded-2xl gradient-primary flex items-center justify-center mb-6">
                                    @include('frontend.partials.icon', [
                                        'icon' => $service->icon ?? 'code',
                                    ])
                                </div>
                            @endif
                            <h3 class="text-xl font-semibold text-black mb-3">{{ $service->title }}</h3>
                            <p class="text-black/60 mb-4">{{ Str::limit($service->description, 120) }}</p>
                            <a href="{{ route('services') }}"
                                class="inline-flex items-center text-primary-400 hover:text-primary-300 font-medium">
                                Learn More
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($products->count() > 0)
        <section class="py-24 relative glass-light">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-black mb-4">
                        Our Products
                    </h2>
                    <p class="text-black/60 max-w-2xl mx-auto">
                        Explore our main products tailored to your business needs.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($products as $index => $product)
                        <a href="{{ route('products.show', $product) }}"
                            class="block glass rounded-2xl p-8 hover-lift transition" data-aos="fade-up"
                            data-aos-delay="{{ $index * 100 }}">

                            <h3 class="text-xl font-semibold text-black mb-3">
                                {{ $product->name }}
                            </h3>

                            @if ($product->description)
                                <p class="text-black/60 text-sm mb-6 line-clamp-3">
                                    {{ $product->description }}
                                </p>
                            @endif

                            <div class="flex items-center justify-between mt-auto">
                                <span class="text-primary-400 font-semibold">
                                    {{ $product->price ? 'Rp ' . number_format($product->price) : 'Request Price' }}
                                </span>

                                <span class="text-sm text-black/40">
                                    View →
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>

                {{-- Button ke halaman product --}}
                <div class="text-center mt-12">
                    <a href="{{ route('products') }}"
                        class="inline-flex items-center px-8 py-4 rounded-xl glass
                      text-black font-semibold hover:bg-black/20 transition-all">
                        View All Products
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    @endif



    <!-- Portfolio Preview -->
    {{-- @if ($portfolios->count() > 0)
        <section class="py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Featured Work</h2>
                    <p class="text-white/60 max-w-2xl mx-auto">Explore some of our recent projects and see how we help
                        businesses succeed.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($portfolios as $index => $portfolio)
                        <div class="group relative overflow-hidden rounded-2xl" data-aos="fade-up"
                            data-aos-delay="{{ $index * 100 }}">
                            @if ($portfolio->image_url)
                                <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}"
                                    class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-110">
                            @else
                                <div class="w-full h-72 bg-gradient-to-br from-primary-500/30 to-accent-500/30"></div>
                            @endif
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-dark-900 via-dark-900/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <div>
                                    @if ($portfolio->category)
                                        <span
                                            class="text-primary-400 text-sm font-medium">{{ $portfolio->category }}</span>
                                    @endif
                                    <h3 class="text-xl font-semibold text-white">{{ $portfolio->title }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-12">
                    <a href="{{ route('portfolio') }}"
                        class="inline-flex items-center px-8 py-4 rounded-xl glass text-white font-semibold hover:bg-white/20 transition-all">
                        View All Projects
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    @endif --}}

    <!-- Testimonials Preview -->
    @if ($testimonials->count() > 0)
        <section class="py-24 relative">
            <div class="absolute inset-0">
                <div class="absolute bottom-0 right-1/4 w-64 h-64 bg-accent-500/10 rounded-full blur-3xl"></div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">What Our Clients Say</h2>
                    <p class="text-white/60 max-w-2xl mx-auto">Don't just take our word for it — hear from some of our
                        satisfied clients.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($testimonials as $index => $testimonial)
                        <div class="glass rounded-2xl p-8" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="flex items-center gap-1 mb-4">
                                @for ($i = 0; $i < $testimonial->rating; $i++)
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <p class="text-white/80 mb-6 leading-relaxed">"{{ $testimonial->content }}"</p>
                            <div class="flex items-center gap-4">
                                @if ($testimonial->client_photo_url)
                                    <img src="{{ $testimonial->client_photo_url }}"
                                        alt="{{ $testimonial->client_name }}"
                                        class="w-12 h-12 rounded-full object-cover">
                                @else
                                    <div class="w-12 h-12 rounded-full gradient-primary flex items-center justify-center">
                                        <span
                                            class="text-white font-semibold">{{ substr($testimonial->client_name, 0, 1) }}</span>
                                    </div>
                                @endif
                                <div>
                                    <p class="text-white font-semibold">{{ $testimonial->client_name }}</p>
                                    <p class="text-white/50 text-sm">
                                        {{ $testimonial->client_position }}{{ $testimonial->client_company ? ', ' . $testimonial->client_company : '' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-4">

            <!-- Title -->
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-15 text-center">
                Our Clients
            </h2>

            <!-- Slider -->
            <div x-data="{
                active: 0,
                total: 3,
                next() {
                    this.active = (this.active + 1) % this.total
                },
                prev() {
                    this.active = (this.active - 1 + this.total) % this.total
                }
            }" class="relative overflow-hidden">

                <!-- Slides -->
                <div class="flex transition-transform duration-500 ease-in-out"
                    :style="`transform: translateX(-${active * 100}%)`">
                    <!-- Slide 1 -->
                    <div class="w-full flex-shrink-0 flex justify-center">
                        <img src="https://img.lazcdn.com/g/p/a1eeec26b4ee0b9ce69dfe7a57dc3e93.jpg_720x720q80.jpg"
                            alt="Astra" class="h-20 object-contain">
                    </div>

                    <!-- Slide 2 -->
                    <div class="w-full flex-shrink-0 flex justify-center">
                        <img src="https://img.lazcdn.com/g/p/a1eeec26b4ee0b9ce69dfe7a57dc3e93.jpg_720x720q80.jpg"
                            alt="Asahimas" class="h-20 object-contain">
                    </div>

                    <!-- Slide 3 -->
                    <div class="w-full flex-shrink-0 flex justify-center">
                        <img src="https://img.lazcdn.com/g/p/a1eeec26b4ee0b9ce69dfe7a57dc3e93.jpg_720x720q80.jpg"
                            alt="Indonesia Power" class="h-20 object-contain">
                    </div>
                </div>

                <!-- Navigation -->
                <button @click="prev"
                    class="absolute left-0 top-1/2 -translate-y-1/2 text-gray-300 hover:text-gray-900 text-4xl px-2">
                    ‹
                </button>

                <button @click="next"
                    class="absolute right-0 top-1/2 -translate-y-1/2 text-gray-300 hover:text-gray-900 text-4xl px-2">
                    ›
                </button>

                <!-- Dots -->
                <div class="flex justify-center gap-2 mt-8">
                    <template x-for="i in total" :key="i">
                        <button @click="active = i - 1" class="w-2 h-2 rounded-full"
                            :class="active === i - 1 ? 'bg-gray-900' : 'bg-gray-300'"></button>
                    </template>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass rounded-3xl p-12 md:p-16 text-center relative overflow-hidden" data-aos="fade-up">
                <div class="absolute inset-0 gradient-primary opacity-10"></div>
                <div class="relative">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Start Your Project?</h2>
                    <p class="text-white/70 max-w-2xl mx-auto mb-8">Let's work together to bring your vision to life. Get
                        in touch with us today.</p>
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center px-8 py-4 rounded-xl gradient-primary text-white font-semibold hover:shadow-lg hover:shadow-primary-500/30 transform hover:-translate-y-1 transition-all duration-300">
                        Get In Touch
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
