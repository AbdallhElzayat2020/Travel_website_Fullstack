@extends('frontend.layouts.master')
@php
    $homePage = \App\Models\Page::getBySlug('home');
    $metaTitle = $homePage && $homePage->meta_title ? $homePage->meta_title : 'Home Page';
@endphp
@section('meta_title', $metaTitle)
@if ($homePage && $homePage->meta_description)
    @section('meta_description', $homePage->meta_description)
@endif
@if ($homePage && $homePage->meta_author)
    @section('meta_author', $homePage->meta_author)
@endif
@if ($homePage && $homePage->meta_keywords)
    @section('meta_keywords', $homePage->meta_keywords)
@endif

@section('content')
    {{-- sliders --}}
    <section class="mx-4 md:mx-6 mb-[60px] md:mb-24">
        <div class="swiper hero-swiper rounded-[32px] overflow-hidden">
            <div class="swiper-wrapper">
                @forelse($sliders as $slider)
                    <div class="swiper-slide bg-cover bg-center bg-no-repeat py-20 md:py-[130px] flex flex-col items-center w-full justify-center relative bg-with-overlay overlay-medium"
                        style="background-image: url('{{ asset('uploads/sliders/' . $slider->image) }}')">
                        <!-- Background image with overlay layer applied via CSS -->

                        <!-- Text content on top of overlay -->
                        <div class="px-4 md:px-0 max-w-4xl mx-auto text-center">
                            <h1 style="color: #fff !important;"
                                class="text-[35px] sm:text-[45px] md:text-[56px] font-bold leading-[1.3em] mb-4 text-center text-[#ffffff] ">
                                {!! nl2br(e($slider->title)) !!}
                            </h1>
                            @if ($slider->description)
                                <p style="color: #fff !important;"
                                    class="mb-4 md:mb-10 text-lg font-semibold text-center text-[#ffffff] ">
                                    {{ $slider->description }}
                                </p>
                            @endif
                            @if ($slider->link && $slider->button_text)
                                <a href="{{ $slider->link }}" style="color: #fff !important;"
                                    class="inline-block hero_button bg-green-zomp  font-semibold py-3 px-8 rounded-[200px] text-[#ffffff] transition duration-200">
                                    {{ $slider->button_text }}
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <!-- Default Slide if no sliders -->
                    <div class="swiper-slide bg-cover bg-center bg-no-repeat py-20 md:py-[130px] flex flex-col items-center w-full justify-center relative bg-with-overlay overlay-medium"
                        style="background-image: url('{{ asset('assets/frontend/assets/images/hero-banner.png') }}')">
                        <!-- Background image with overlay layer applied via CSS -->

                        <!-- Text content on top of overlay -->
                        <div class="px-4 md:px-0 max-w-4xl mx-auto text-center">
                            <h1
                                class="text-[35px] sm:text-[45px] md:text-[56px] font-bold leading-[1.3em] mb-4 text-center text-white">
                                Discover amazing destinations. <br />
                                Create unforgettable memories.
                            </h1>
                            <p class="mb-4 md:mb-10 text-lg font-semibold text-center text-white">
                                Your next adventure is just one click
                                away</p>
                        </div>
                    </div>
                @endforelse
            </div>
            <!-- Navigation buttons -->
            <div class="swiper-button-next hero-swiper-next !text-white !w-12 !h-12 !mt-0 rounded-full p-2 bg-[#8B6F47] transition duration-200 hover:!bg-[#7a6230]"
                style="--swiper-navigation-size: 20px"></div>
            <div class="swiper-button-prev hero-swiper-prev !text-white !w-12 !h-12 !mt-0 rounded-full p-2 bg-[#8B6F47] transition duration-200 hover:!bg-[#7a6230]"
                style="--swiper-navigation-size: 20px"></div>
            <!-- Pagination -->
            <div class="swiper-pagination hero-swiper-pagination !bottom-6"></div>
        </div>
    </section>
    {{-- sliders --}}

    {{-- icons section --}}
    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 lg:gap-6">
                <div class="text-center items">
                    <img src="{{ asset('assets/frontend/assets/images/features-01.webp') }}" alt=""
                        class="w-[72px] h-auto mx-auto mb-6">
                    <h4 class="mb-2 text-xl font-semibold text-black">Discover the possibilities</h4>
                    <p class="text-dark-grey">With nearly half a million attractions, <br /> hotels & more, you're sure
                        to find joy.</p>
                </div>
                <div class="text-center items">
                    <img src="{{ asset('assets/frontend/assets/images/features-02.webp') }}" alt=""
                        class="w-[72px] h-auto mx-auto mb-6">
                    <h4 class="mb-2 text-xl font-semibold text-black">Enjoy deals & delights</h4>
                    <p class="text-dark-grey">Quality activities. Great prices. Plus, <br /> earn credits to save more.
                    </p>
                </div>
                <div class="text-center items">
                    <img src="{{ asset('assets/frontend/assets/images/features-03.webp') }}" alt=""
                        class="w-[72px] h-auto mx-auto mb-6">
                    <h4 class="mb-2 text-xl font-semibold text-black">Exploring made easy</h4>
                    <p class="text-dark-grey">Book last minute, skip lines & get free <br /> cancellation for easier
                        exploring.</p>
                </div>
                <div class="text-center items">
                    <img src="{{ asset('assets/frontend/assets/images/features-04.webp') }}" alt=""
                        class="w-[72px] h-auto mx-auto mb-6">
                    <h4 class="mb-2 text-xl font-semibold text-black">Travel you can trust</h4>
                    <p class="text-dark-grey">Read reviews & get reliable customer <br /> support. We're with you at
                        every step.</p>
                </div>
            </div>
        </div>
    </section>
    {{-- icons section --}}

    {{-- Offers section --}}
    @if (isset($cruiseExperiences) && $cruiseExperiences->count())
        <section class="mb-[60px] md:mb-24">
            <div class="container">
                <h2 class="text-black font-bold text-[32px] leading-[1.1em] capitalize mb-10">
                    Ultra Deluxe Dahabiya
                </h2>
                <div class="grid md:grid-cols-2 gap-4 md:gap-6">
                    @foreach ($cruiseExperiences->take(2) as $cruise)
                        @php
                            $firstImage = $cruise->images->first();
                            $offerCover = $firstImage
                                ? asset('uploads/cruise-experiences/' . $firstImage->image)
                                : asset('assets/frontend/assets/images/inspire-01.png');

                            // Determine URL based on cruiseGroup relationship
                            $cruiseGroupSlug = $cruise->cruiseGroup
                                ? $cruise->cruiseGroup->slug
                                : $cruise->group_key ?? 'dahabiya-cruises';
                            $cruiseUrl = '/' . $cruiseGroupSlug . '/' . $cruise->slug;
                        @endphp
                        <div class="rounded-2xl md:rounded-3xl bg-cover bg-center bg-no-repeat relative overflow-hidden"
                            style="background-image: url('{{ $offerCover }}');">
                            <div class="absolute inset-0 rounded-2xl md:rounded-3xl"
                                style="background: linear-gradient(134deg, #8b7138 18%, rgba(139, 113, 56, 0) 100%);"></div>
                            <div class="relative p-[34px] lg:pr-[157px] h-full flex flex-col justify-between">
                                <div>
                                    @if ($cruise->cruiseGroup)
                                        <p class="text-white text-xs md:text-sm opacity-80 mb-1">
                                            {{ $cruise->cruiseGroup->name }}
                                        </p>
                                    @endif
                                    <h2 class="text-white font-bold text-[28px] md:text-[32px] leading-[1.3] mb-4">
                                        <a href="{{ $cruiseUrl }}" class="hover:text-[#f9e600] transition duration-200">
                                            {!! $cruise->title !!}
                                        </a>
                                    </h2>
                                    @if ($cruise->short_description)
                                        <p class="text-white text-base mb-[40px] line-clamp-3">
                                            {!! \Illuminate\Support\Str::limit(strip_tags($cruise->short_description), 150) !!}
                                        </p>
                                    @endif
                                </div>
                                <div class="flex flex-wrap items-center gap-3">
                                    <a href="{{ $cruiseUrl }}"
                                        class="ml-auto border border-white text-sm text-white font-semibold py-2 px-4 rounded-[200px] transition duration-200 hover:bg-[#8b7138] hover:border-[#8b7138]">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    {{-- Offers section --}}


    {{-- Top destination section --}}
    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <div class="flex items-center justify-between mb-10">
                <h2 class="text-black font-bold text-[32px] leading-[1.1em]">
                    The Luxury Nile Cruises & Egypt Tours
                </h2>
                <div class="hidden sm:flex items-center gap-4">
                    <div class="swiper-button-prev top-destination-prev !relative !w-12 !h-12 !text-dark-grey !mt-0 !left-0 !right-0 rounded-full p-2 bg-white-grey transition duration-200 hover:!text-white hover:bg-green-zomp"
                        style="--swiper-navigation-size: 20px"></div>
                    <div class="swiper-button-next top-destination-next !relative !w-12 !h-12 !text-dark-grey !mt-0 !left-0 !right-0 rounded-full p-2 bg-white-grey transition duration-200 hover:!text-white hover:bg-green-zomp"
                        style="--swiper-navigation-size: 20px"></div>
                </div>
            </div>
            <div class="relative">
                <div class="swiper top-destination-swipper">
                    <div class="swiper-wrapper">
                        {{-- Cruise Groups (Dynamic) --}}
                        @if (isset($sharedCruiseGroupsWithExperiences) && count($sharedCruiseGroupsWithExperiences) > 0)
                            @foreach ($sharedCruiseGroupsWithExperiences as $groupData)
                                @php
                                    $group = $groupData['group'];
                                    $experiences = $groupData['experiences'];
                                @endphp
                                @if ($experiences->count() > 0)
                                    @php
                                        $firstImage = $experiences->first()->images->first();
                                        $groupCover = $firstImage
                                            ? asset('uploads/cruise-experiences/' . $firstImage->image)
                                            : asset('assets/frontend/assets/images/destination-01.png');
                                    @endphp
                                    <div class="swiper-slide relative min-h-[400px] rounded-2xl overflow-hidden">
                                        <img src="{{ $groupCover }}" alt="{{ $group->name }}"
                                            class="absolute inset-0 z-0 object-cover w-full h-full" />
                                        <div
                                            class="absolute inset-0 before:content-[''] before:absolute before:inset-0 before:bg-gradient-to-b before:from-[#00000008] before:to-[#000] before:z-[1] opacity-60">
                                        </div>
                                        <a href="/{{ $group->slug }}" class="absolute inset-0 z-10">
                                            <h2 class="text-white font-bold text-[32px] absolute bottom-6 left-6">
                                                {{ $group->name }}
                                            </h2>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        @endif

                        {{-- Tour Egypt Packages Category --}}
                        @php
                            $tourEgyptCategory = $sharedCategories->firstWhere('slug', 'tour-egypt-packages');
                        @endphp
                        @if ($tourEgyptCategory)
                            <div class="swiper-slide relative min-h-[400px] rounded-2xl overflow-hidden">
                                @if ($tourEgyptCategory->image)
                                    <img src="{{ asset('uploads/categories/' . $tourEgyptCategory->image) }}"
                                        alt="{{ $tourEgyptCategory->image_alt ?? $tourEgyptCategory->name }}"
                                        class="absolute inset-0 z-0 object-cover w-full h-full" />
                                @else
                                    <img src="{{ asset('assets/frontend/assets/images/destination-01.png') }}"
                                        alt="{{ $tourEgyptCategory->name }}"
                                        class="absolute inset-0 z-0 object-cover w-full h-full" />
                                @endif
                                <div
                                    class="absolute inset-0 before:content-[''] before:absolute before:inset-0 before:bg-gradient-to-b before:from-[#00000008] before:to-[#000] before:z-[1] opacity-60">
                                </div>
                                <a href="{{ route('tours.category', $tourEgyptCategory->slug) }}"
                                    class="absolute inset-0 z-10">
                                    <h2 class="text-white font-bold text-[32px] absolute bottom-6 left-6">
                                        {{ $tourEgyptCategory->name }}
                                    </h2>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="swiper-pagination top-destination-pagination !-bottom-11 sm:hidden"></div>
            </div>
            {{-- <div class="flex justify-center mt-14 sm:mt-10">
                <a href="destinations.html"
                    class="text-green-zomp py-4 px-6 rounded-[200px] border border-green-zomp font-semibold transition duration-200 hover:text-white hover:bg-green-zomp capitalize">See
                    All Destination
                </a>
            </div> --}}
        </div>
    </section>
    {{-- Top destination section --}}






    {{-- Popular activities Section --}}
    @if (isset($activeTours) && $activeTours->count() > 0)
        <section class="mb-[60px] md:mb-24">
            <div class="container">
                <h2 class="text-black font-bold text-[32px] leading-[1.1em] capitalize mb-10">
                    Tour Egypt Packages
                </h2>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @forelse($activeTours as $tour)
                        @php
                            $coverImage = $tour->cover_image
                                ? asset('uploads/tours/' . $tour->cover_image)
                                : asset('assets/frontend/assets/images/blogs/01.png');

                            $isOnSale = $tour->has_offer && $tour->isOfferActive();
                            $currentPrice =
                                $isOnSale && $tour->price_after_discount ? $tour->price_after_discount : $tour->price;
                            $oldPrice = $isOnSale && $tour->price_before_discount ? $tour->price_before_discount : null;

                            // Location
                            $locationParts = [];
                            if ($tour->category) {
                                $locationParts[] = $tour->category->name;
                            }
                            if ($tour->country) {
                                $locationParts[] = $tour->country->name;
                            }
                            $location = implode(', ', $locationParts);

                            // Duration - Always display as days, use DB value only
                            $durationValue = (int) ($tour->duration ?? 0);
                            $durationText = $durationValue . ' ' . ($durationValue == 1 ? 'day' : 'days');
                        @endphp
                        <article class="relative overflow-hidden transition duration-200">
                            <div class="bg-white border rounded-2xl border-light-grey">
                                <div class="relative overflow-hidden rounded-t-2xl">
                                    <a href="{{ route('tours.show', $tour->slug) }}">
                                        <img src="{{ $coverImage }}" alt="{{ $tour->title }}"
                                            class="object-cover w-full h-auto transition duration-300 hover:scale-105">
                                        @if ($isOnSale)
                                            <span
                                                class="absolute top-4 right-4 bg-[#F51D35] rounded py-1 px-2 text-white text-sm font-semibold">On
                                                Sale</span>
                                        @endif
                                    </a>
                                </div>
                                <div class="p-4">
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="iconify" data-icon="ep:location" data-width="14"
                                            data-height="14"></span>
                                        <span class="text-sm text-dark-grey">{{ $location ?: 'Location' }}</span>
                                    </div>

                                    <h4
                                        class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                                        <a href="{{ route('tours.show', $tour->slug) }}">{{ $tour->title }}</a>
                                    </h4>

                                    <div class="flex items-center mb-2 text-orange-yellow">
                                        <span class="iconify" data-icon="mdi:star"></span>
                                        <span class="iconify" data-icon="mdi:star">
                                        </span>
                                        <span class="iconify" data-icon="mdi:star"></span>
                                        <span class="iconify" data-icon="mdi:star"></span>
                                        <span class="iconify" data-icon="mdi:star"></span>
                                    </div>

                                    @if ($tour->category)
                                        <div class="flex flex-wrap items-center gap-2">
                                            <a href="javascript:void(0)"
                                                class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag transition hover:bg-green-zomp hover:text-white">
                                                {{ $tour->category->name }}
                                            </a>
                                            @if ($tour->show_on_homepage)
                                                <a href="javascript:void(0)"
                                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-featured transition hover:bg-green-zomp hover:text-white">
                                                    Featured
                                                </a>
                                            @endif
                                        </div>
                                    @endif

                                    <div class="h-px my-4 border-t border-light-grey"></div>

                                    @if ($oldPrice)
                                        <div class="mb-1 text-sm font-bold line-through text-grey">
                                            ${{ number_format($oldPrice, 0) }}</div>
                                    @endif

                                    <div class="flex items-center justify-between gap-2">
                                        <span class="flex items-center gap-1">
                                            <span>From</span>
                                            <span
                                                class="text-base font-bold text-green-zomp">${{ number_format($currentPrice, 0) }}</span>
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular"
                                                data-width="15" data-height="15"></span>
                                            <div class="text-sm text-dark-grey">{{ $durationText }}</div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="col-span-full text-center py-10">
                            <p class="text-dark-grey">No tours available at the moment.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    @endif

    {{-- Popular activities Section --}}

    {{-- Subscribe Section --}}
    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <div class="bg-cover bg-center rounded-2xl px-6 py-12 lg:pl-[108px] lg:pr-10 lg:pt-[120px] lg:pb-[90px] text-white"
                style="background-image: url('{{ asset('assets/frontend/assets/images/subscribe-bg.png') }}')">
                <div class="p-6 md:p-10 bg-darker-grey bg-opacity-90 rounded-2xl w-full lg:w-fit">
                    <h2 class="text-2xl md:text-[40px] font-bold mb-4">Subscribe & Get 20% off</h2>
                    <p class="text-white-grey mb-8 max-w-full md:max-w-[540px] text-sm md:text-base">
                        Join our newsletter and discover new destinations to inspire the traveler within. Plus, get 20%
                        off at our
                        online shop. Every week you’ll receive expert advice, tips, exclusive offers, and much more.
                    </p>
                    <form class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4"
                        action="{{ route('subscribe') }}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Your email address" required
                            class="flex-1 text-dark-grey font-normal py-3 px-6 rounded-full focus:outline-none" />
                        <button type="submit"
                            class="bg-green-zomp py-3 px-6 text-white font-semibold rounded-full whitespace-nowrap transition duration-200 hover:-translate-y-[5px] hover:bg-[#7a6230]">Sign
                            Up
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- Subscribe Section --}}



    {{-- Blogs section --}}
    @if (isset($blogs) && $blogs->count())
        <section class="mb-[60px] md:mb-24">
            <div class="container">
                <div class="flex items-center justify-between mb-10">
                    <h2 class="text-black font-bold text-[32px] leading-[1.1em] capitalize">
                        Travel to Egypt Blog
                    </h2>
                    <div class="hidden sm:flex items-center gap-4">
                        <div class="swiper-button-prev blog-index-prev !relative !w-12 !h-12 !text-dark-grey !mt-0 !left-0 !right-0 rounded-full p-2 bg-white-grey transition duration-200 hover:!text-white hover:bg-green-zomp"
                            style="--swiper-navigation-size: 20px"></div>
                        <div class="swiper-button-next blog-index-next !relative !w-12 !h-12 !text-dark-grey !mt-0 !left-0 !right-0 rounded-full p-2 bg-white-grey transition duration-200 hover:!text-white hover:bg-green-zomp"
                            style="--swiper-navigation-size: 20px"></div>
                    </div>
                </div>
                <div class="relative">
                    <div class="swiper blog-index-swiper">
                        <div class="swiper-wrapper">
                            @forelse($blogs as $blog)
                                @php
                                    $blogCover = $blog->cover_image
                                        ? asset('uploads/blogs/' . $blog->cover_image)
                                        : asset('assets/frontend/assets/images/blogs/01.png');
                                    $blogDate = $blog->published_at
                                        ? \Carbon\Carbon::parse($blog->published_at)->format('M d, Y')
                                        : '';
                                @endphp
                                <div class="swiper-slide">
                                    <article class="bg-white overflow-hidden rounded-2xl shadow-sm">
                                        <div class="overflow-hidden rounded-t-2xl">
                                            <img src="{{ $blogCover }}" alt="{{ $blog->title }}"
                                                class="w-full h-auto rounded-t-2xl object-cover hover:scale-105 transition duration-200">
                                        </div>
                                        <div class="border border-light-grey border-t-0 rounded-b-2xl p-4 pb-9">
                                            <h4
                                                class="text-black line-clamp-2 font-bold mb-2 transition duration-200 hover:text-green-zomp">
                                                <a href="{{ route('blogs.show', $blog->slug) }}" class="block">
                                                    {{ $blog->title }}
                                                </a>
                                            </h4>
                                            @if ($blogDate)
                                                <span class="block text-dark-grey text-sm mb-2">{{ $blogDate }}</span>
                                            @endif
                                            @if ($blog->short_description)
                                                <p class="text-dark-grey text-sm line-clamp-2">
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->short_description), 140) }}
                                                </p>
                                            @endif
                                        </div>
                                    </article>
                                </div>
                            @empty
                                <div class="swiper-slide">
                                    <article class="bg-white overflow-hidden rounded-2xl shadow-sm">
                                        <div class="p-6 text-center text-dark-grey">
                                            No blog posts available yet.
                                        </div>
                                    </article>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="swiper-pagination blog-index-pagination !-bottom-11 sm:hidden"></div>
                </div>

                <div class="flex justify-center mt-14 sm:mt-10">
                    <a href="{{ route('blogs.index') }}"
                        class="text-green-zomp py-4 px-6 rounded-[200px] border border-green-zomp font-semibold transition duration-200 hover:text-white hover:bg-green-zomp capitalize">
                        Explore Travel Egypt Blog
                    </a>
                </div>
            </div>
        </section>
    @endif
    {{-- Blogs section --}}

@endsection

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Hero Swiper Initialization
            new Swiper(".hero-swiper", {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".hero-swiper-next",
                    prevEl: ".hero-swiper-prev",
                },
                pagination: {
                    el: ".hero-swiper-pagination",
                    clickable: true,
                },
            });
        });
    </script>
@endpush
