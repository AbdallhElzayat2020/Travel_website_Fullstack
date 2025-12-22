@extends('frontend.layouts.master')
@php
    $metaTitle = $tour->meta_title ?? $tour->title;
    $metaDescription = $tour->meta_description ?? ($tour->short_description ? \Illuminate\Support\Str::limit(strip_tags($tour->short_description), 160) : 'Discover amazing tours and travel experiences. Book your next adventure with us.');
    $metaImage = $tour->cover_image ? asset('uploads/tours/' . $tour->cover_image) : null;
@endphp
@section('meta_title', $metaTitle)
@if($metaDescription)
@section('meta_description', $metaDescription)
@endif
@if($tour->meta_keywords)
@section('meta_keywords', $tour->meta_keywords)
@endif
@if($metaImage)
@section('meta_image', $metaImage)
@endif

@section('content')
    <section id="scroll-nav" class="[box-shadow:0px_9px_16px_0px_#0000001F] py-6 px-10 bg-white hidden">
        <ul class="flex items-center justify-center gap-14">
            <li>
                <a href="#overview"
                    class="text-dark-grey font-semibold [&.active]:text-green-zomp transition duration-200 before:content-[''] before:absolute before:left-0 before:-bottom-1 before:w-full before:h-[2px] before:scale-x-0 before:bg-green-zomp before:transition before:duration-200 [&.active]:before:scale-x-100 relative">Overview</a>
            </li>
            <li>
                <a href="#what-to-expect"
                    class="text-dark-grey font-semibold [&.active]:text-green-zomp transition duration-200 before:content-[''] before:absolute before:left-0 before:-bottom-1 before:w-full before:h-[2px] before:scale-x-0 before:bg-green-zomp before:transition before:duration-200 [&.active]:before:scale-x-100 relative">What
                    To Expect</a>
            </li>

            @if($tour->seasonalPrices->count() > 0)
                <li>
                    <a href="#prices-accommodation"
                        class="text-dark-grey font-semibold [&.active]:text-green-zomp transition duration-200 before:content-[''] before:absolute before:left-0 before:-bottom-1 before:w-full before:h-[2px] before:scale-x-0 before:bg-green-zomp before:transition before:duration-200 [&.active]:before:scale-x-100 relative">
                        Prices
                    </a>
                </li>
            @endif
            <li>
                <a href="#reviews"
                    class="text-dark-grey font-semibold [&.active]:text-green-zomp transition duration-200 before:content-[''] before:absolute before:left-0 before:-bottom-1 before:w-full before:h-[2px] before:scale-x-0 before:bg-green-zomp before:transition before:duration-200 [&.active]:before:scale-x-100 relative">Reviews</a>
            </li>
        </ul>
    </section>

    <section class="pt-10 lg:pt-12 pb-2 border border-b-0 border-l-0 border-r-0 border-t-light-grey">
        <div class="container">
            <nav class="font-medium text-grey" aria-label="Breadcrumb">
                <ul class="flex flex-wrap items-center gap-1 mb-2">
                    <li>
                        <a href="{{ route('home') }}" class="transition duration-200 hover:text-green-zomp">Home</a>
                    </li>
                    <span class="mx-1">/</span>
                    <li><span class="text-dark-grey">Tours</span></li>
                    @if($tour->category)
                        <span class="mx-1">/</span>
                        <li><span class="text-dark-grey">{{ $tour->category->name }}</span></li>
                    @endif
                </ul>
            </nav>
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <div class="tours-details-wrap">
                <div class="grid grid-cols-12 gap-6 items-end justify-between mb-6">
                    <div class="col-span-12 lg:col-span-8">
                        <h1 class="text-black text-2xl lg:text-[32px] font-bold leading-[1.1em] mb-4">{{ $tour->title }}
                        </h1>
                        <div class="flex flex-wrap items-center gap-2 mb-2">
                            @if($tour->show_on_homepage)
                                <span
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-featured">Featured</span>
                            @endif
                            @if($tour->has_offer && $tour->isOfferActive())
                                <span
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-best-seller">On
                                    Sale</span>
                            @endif
                        </div>
                        <div class="flex flex-wrap items-center gap-2">
                            <div class="flex items-center">
                                <span class="iconify text-orange-yellow" data-icon="mdi:star"></span>
                                <span class="iconify text-orange-yellow" data-icon="mdi:star"></span>
                                <span class="iconify text-orange-yellow" data-icon="mdi:star"></span>
                                <span class="iconify text-orange-yellow" data-icon="mdi:star"></span>
                                <span class="iconify text-orange-yellow" data-icon="mdi:star"></span>

                            </div>
                            <ul class="flex items-center gap-7 list-disc marker:text-[#C0C5C9] pl-5">
                                @if($tour->state)
                                    <li class="text-dark-grey">{{ $tour->state->name }}, {{ $tour->country->name ?? '' }}</li>
                                @elseif($tour->country)
                                    <li class="text-dark-grey">{{ $tour->country->name }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-4 flex justify-end items-end">
                        <div class="relative inline-block group">
                            <div
                                class="cursor-pointer flex items-center gap-2 text-black font-semibold transition duration-200 hover:text-green-zomp">
                                <span class="iconify" data-icon="solar:share-outline" data-width="24"
                                    data-height="24"></span>
                                Share
                            </div>
                            <div
                                class="absolute shadow-shadow-custom left-auto right-0 py-6 px-4 mt-3 w-[350px] bg-white rounded-lg invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-200 z-50">
                                <h4 class=" text-darker-grey text-2xl font-semibold mb-4">Share</h4>
                                <div class="border-b border-light-grey mb-4"></div>
                                <ul class="grid grid-cols-4 gap-x-4">
                                    <li class="flex flex-col items-center">
                                        <a href="#"
                                            class="bg-[#3C58A5] w-9 h-9 rounded-full flex items-center justify-center">
                                            <span class="iconify text-white" data-icon="bxl:facebook" data-width="20"
                                                data-height="20"></span>
                                        </a>
                                        <span class="block text-sm text-dark-grey mt-2">Facebook</span>
                                    </li>

                                    <li class="flex flex-col items-center">
                                        <a href="#" class="bg-white w-9 h-9 rounded-full flex items-center justify-center">
                                            <span class="iconify text-black" data-icon="ri:twitter-x-fill" data-width="20"
                                                data-height="20"></span>
                                        </a>
                                        <span class="block text-sm text-dark-grey mt-2">Twitter</span>
                                    </li>

                                    <li class="flex flex-col items-center">
                                        <a href="#"
                                            class="bg-[#0077FF] w-9 h-9 rounded-full flex items-center justify-center">
                                            <span class="iconify text-white" data-icon="ri:linkedin-fill" data-width="20"
                                                data-height="20"></span>
                                        </a>
                                        <span class="block text-sm text-dark-grey mt-2">LinkedIn</span>
                                    </li>

                                    <li class="flex flex-col items-center">
                                        <a href="#"
                                            class="bg-[#F54848] w-9 h-9 rounded-full flex items-center justify-center">
                                            <span class="iconify text-white" data-icon="jam:pinterest" data-width="20"
                                                data-height="20"></span>
                                        </a>
                                        <span class="block text-sm text-dark-grey mt-2">Pinterest</span>
                                    </li>
                                </ul>
                                <div class="mt-5 bg-white-grey rounded-lg py-2 px-3 flex items-center gap-2">
                                    <input type="text"
                                        class="copy-input text-grey bg-white-grey px-5 py-2 rounded-lg outline-none w-full"
                                        value="{{ url()->current() }}" readonly>
                                    <button
                                        class="btn-copy-link bg-green-zomp text-white py-1.5 px-2 rounded-lg w-[80px] text-center">
                                        Copy
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-6 mb-8">
                    <div class="col-span-12 lg:col-span-8">
                        @php
                            $coverImage = $tour->cover_image ? asset('uploads/tours/' . $tour->cover_image) : asset('assets/frontend/assets/images/blogs/01.png');
                            $firstImage = $tour->tourImages->first();
                            $mainImage = $firstImage ? asset('uploads/tours/' . $firstImage->image) : $coverImage;
                        @endphp
                        <a data-fancybox="gallery" href="{{ $mainImage }}">
                            <img src="{{ $coverImage }}" alt="{{ $tour->title }}"
                                class="w-full h-full object-cover rounded-xl" />
                        </a>
                    </div>
                    <div class="col-span-12 grid grid-cols-2 lg:col-span-4 lg:flex lg:flex-col gap-4">
                        @if($tour->tourImages->count() > 0)
                            @foreach($tour->tourImages->take(2) as $index => $image)
                                <a data-fancybox="gallery" href="{{ asset('uploads/tours/' . $image->image) }}">
                                    <img src="{{ asset('uploads/tours/' . $image->image) }}" alt="Image {{ $index + 1 }}"
                                        class="w-full h-full object-cover rounded-xl" />
                                </a>
                            @endforeach
                        @else
                            <a data-fancybox="gallery" href="{{ $coverImage }}">
                                <img src="{{ $coverImage }}" alt="Image 2" class="w-full h-full object-cover rounded-xl" />
                            </a>
                        @endif
                        @if($tour->tourImages->count() > 2)
                            <div class="relative">
                                <a data-fancybox="gallery"
                                    href="{{ asset('uploads/tours/' . $tour->tourImages->skip(2)->first()->image) }}">
                                    <img src="{{ asset('uploads/tours/' . $tour->tourImages->skip(2)->first()->image) }}"
                                        alt="Image 3" class="w-full h-full object-cover rounded-xl" />
                                </a>
                                <button
                                    class="absolute bottom-3 right-3 bg-white text-black px-4 py-2.5 rounded-full font-semibold flex items-center gap-2 transition duration-200 hover:bg-green-zomp hover:text-white"
                                    data-fancybox="gallery" data-src="{{ $coverImage }}" data-thumb="{{ $coverImage }}">
                                    <span class="iconify" data-icon="dashicons:grid-view" data-width="18"
                                        data-height="18"></span>
                                    Gallery
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-8">
                        <div
                            class="sm:flex flex-wrap items-center justify-center p-4 bg-white-grey sm:gap-3 md:gap-10 lg:gap-20 rounded-2xl">
                            <div class="flex flex-1 items-center gap-2">
                                <span class="iconify text-green-zomp" data-icon="solar:clock-circle-linear" data-width="24"
                                    data-height="24"></span>
                                <span class="text-dark-grey">
                                    <span>Duration:</span>
                                    <span>{{ $tour->duration }}
                                        {{ $tour->duration_type == 'days' ? ($tour->duration > 1 ? 'Days' : 'Day') : ($tour->duration > 1 ? 'Hours' : 'Hour') }}</span>
                                </span>
                            </div>
                            @if($tour->category)
                                <div class="flex flex-1 items-center gap-2">
                                    <span class="iconify text-green-zomp" data-icon="solar:planet-2-linear" data-width="24"
                                        data-height="24"></span>
                                    <span class="text-dark-grey">
                                        <span>Category:</span>
                                        <span>{{ $tour->category->name }}</span>
                                    </span>
                                </div>
                            @endif
                            @if($tour->subCategory)
                                <div class="flex items-center gap-2">
                                    <span class="iconify text-green-zomp" data-icon="solar:tag-horizontal-linear"
                                        data-width="24" data-height="24"></span>
                                    <span class="text-dark-grey">
                                        <span>Sub Category:</span>
                                        <span>{{ $tour->subCategory->name }}</span>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="tours-content">
                            <div id="overview" class="border border-white-grey rounded-2xl p-6 mt-6 bg-white mb-6">
                                @if($tour->description)
                                    <div class="text-dark-grey mb-6">
                                        {!! $tour->description !!}
                                    </div>
                                @endif
                                <div class="h-px w-full bg-light-grey my-8"></div>
                            </div>

                            <div id="what-to-expect" class="border border-white-grey rounded-2xl p-6 mt-6 bg-white mb-6">
                                <h3 class="text-black text-2xl font-semibold leading-[1.1] mb-6">What To Expect</h3>
                                @if($tour->tourDays->count() > 0)
                                    <div class="flex flex-col relative">
                                        @foreach($tour->tourDays as $index => $day)
                                            <div
                                                class="relative flex items-start md:before:content-[''] md:before:absolute md:before:top-11 md:before:left-[22px] md:before:w-px md:before:bg-green-zomp md:last:before:hidden md:before:h-full">
                                                <div class="relative z-10">
                                                    <div
                                                        class="h-11 w-11 rounded-full border border-green-zomp bg-white hidden md:flex items-center justify-center text-green-zomp font-bold">
                                                        {{ $day->day_number }}
                                                    </div>
                                                </div>
                                                <div class="md:ml-6 flex-1 {{ !$loop->last ? 'mb-8' : '' }}">
                                                    <h6 class="text-black font-bold mb-2">{{ $day->day_title }}</h6>
                                                    @if($day->details)
                                                        <div class="text-dark-grey">
                                                            {!! $day->details !!}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-dark-grey">No itinerary details available.</p>
                                @endif
                            </div>

                            @if($tour->seasonalPrices->count() > 0)
                                <div id="prices-accommodation"
                                    class="border border-white-grey rounded-2xl p-6 mt-6 bg-white mb-6">
                                    <h3 class="text-black text-2xl font-semibold leading-[1.1] mb-6">Prices & Accommodation</h3>
                                    <div class="space-y-6">
                                        @foreach($tour->seasonalPrices as $seasonalPrice)
                                            <div class="mb-6">
                                                <h4 class="text-black text-xl font-bold mb-3">
                                                    {{ $seasonalPrice->season_name }}
                                                    @if($seasonalPrice->description)
                                                        <span class="text-base font-normal text-dark-grey"> -
                                                            {{ $seasonalPrice->description }}</span>
                                                    @endif
                                                </h4>
                                                @if($seasonalPrice->priceItems->count() > 0)
                                                    <div class="overflow-x-auto">
                                                        <table class="w-full border-collapse border border-light-grey">
                                                            <thead>
                                                                <tr class="bg-white-grey">
                                                                    <th
                                                                        class="border border-light-grey px-4 py-3 text-left text-black font-semibold">
                                                                        Accommodation Type</th>
                                                                    <th
                                                                        class="border border-light-grey px-4 py-3 text-left text-black font-semibold">
                                                                        Price</th>
                                                                    @if($seasonalPrice->priceItems->first()->description)
                                                                        <th
                                                                            class="border border-light-grey px-4 py-3 text-left text-black font-semibold">
                                                                            Description</th>
                                                                    @endif
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($seasonalPrice->priceItems as $item)
                                                                    <tr class="accommodation-row transition duration-200 cursor-pointer hover:bg-green-zomp group"
                                                                        data-item-id="{{ $item->id }}" data-price="{{ $item->price_value }}"
                                                                        data-item-name="{{ $item->price_name }}"
                                                                        onclick="selectAccommodation({{ $item->id }}, {{ $item->price_value }}, '{{ $item->price_name }} - {{ $seasonalPrice->season_name }}')">
                                                                        <td
                                                                            class="border border-light-grey px-4 py-3 text-dark-grey font-medium accommodation-name group-hover:text-white">
                                                                            {{ $item->price_name }}
                                                                        </td>
                                                                        <td
                                                                            class="border border-light-grey px-4 py-3 text-green-zomp font-bold accommodation-price group-hover:text-white">
                                                                            ${{ number_format($item->price_value, 2) }}</td>
                                                                        @if($item->description)
                                                                            <td
                                                                                class="border border-light-grey px-4 py-3 text-dark-grey accommodation-desc group-hover:text-white">
                                                                                {{ $item->description }}
                                                                            </td>
                                                                        @endif
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div id="reviews" class="border border-white-grey rounded-2xl p-6 md:p-10 mt-6 bg-white">
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
                                    <h3 class="text-black text-2xl md:text-3xl font-bold leading-[1.1]">Reviews</h3>
                                    @if($testimonials->count() > 0)
                                        <div class="flex items-center gap-3">
                                            <span
                                                class="text-[36px] md:text-[42px] font-bold text-black">{{ number_format($averageRating, 1) }}</span>
                                            <div class="flex items-center gap-0.5">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i
                                                        class="fas fa-star text-sm md:text-base {{ $i <= round($averageRating) ? 'text-orange-yellow' : 'text-light-grey' }}"></i>
                                                @endfor
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                @if($testimonials->count() > 0)
                                    <div class="relative mb-10">
                                        <div class="swiper reviews-swiper">
                                            <div class="swiper-wrapper">
                                                @foreach($testimonials as $testimonial)
                                                    <div class="swiper-slide">
                                                        <div class="bg-white-grey rounded-2xl p-6 md:p-10 relative overflow-hidden">
                                                            <div
                                                                class="absolute top-6 left-6 text-orange-yellow text-7xl md:text-8xl font-bold opacity-10 leading-none font-serif">
                                                                "</div>
                                                            <p
                                                                class="text-dark-grey text-base md:text-lg leading-relaxed relative z-10 mb-6 min-h-[100px]">
                                                                {{ $testimonial->description }}
                                                            </p>
                                                            <div
                                                                class="flex flex-col md:flex-row md:items-center md:justify-between pt-6 border-t border-light-grey gap-3">
                                                                <div>
                                                                    <p class="font-bold text-black text-base md:text-lg mb-1">
                                                                        {{ $testimonial->name }}
                                                                    </p>
                                                                    <p class="text-dark-grey text-sm">
                                                                        {{ $testimonial->company ?? $testimonial->job_title ?? 'Traveler' }}
                                                                    </p>
                                                                </div>
                                                                <div class="flex items-center gap-0.5">
                                                                    @for($i = 1; $i <= 5; $i++)
                                                                        <i
                                                                            class="fas fa-star text-xs md:text-sm {{ $i <= ($testimonial->rating ?? 5) ? 'text-orange-yellow' : 'text-light-grey' }}"></i>
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-center gap-4 mt-8">
                                            <button
                                                class="reviews-swiper-prev w-12 h-12 rounded-full border-2 border-green-zomp bg-white flex items-center justify-center text-green-zomp hover:bg-green-zomp hover:text-white transition duration-200 shadow-md hover:shadow-lg">
                                                <i class="fas fa-chevron-left text-sm"></i>
                                            </button>
                                            <button
                                                class="reviews-swiper-next w-12 h-12 rounded-full border-2 border-green-zomp bg-white flex items-center justify-center text-green-zomp hover:bg-green-zomp hover:text-white transition duration-200 shadow-md hover:shadow-lg">
                                                <i class="fas fa-chevron-right text-sm"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- External Review Platforms -->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 mt-8">
                                        <!-- Trustpilot -->
                                        <div
                                            class="review-trust-card bg-white border-2 border-light-grey rounded-xl p-5 md:p-6 flex items-center gap-4 hover:border-green-zomp transition duration-200 shadow-sm hover:shadow-md">
                                            <div
                                                class="review-trust-icon trustpilot w-14 h-14 md:w-16 md:h-16 rounded-full bg-[#00B67A] flex items-center justify-center flex-shrink-0 shadow-md overflow-hidden">
                                                <img src="{{ asset('assets/frontend/assets/images/Trustpilot.png') }}"
                                                    alt="Trustpilot" class="w-20 h-20 object-contain">
                                            </div>
                                            <div class="review-trust-content flex-1">
                                                <span
                                                    class="review-trust-label block font-bold text-black text-base md:text-lg mb-2">Trustpilot</span>
                                                <div class="flex items-center gap-2">
                                                    <span
                                                        class="review-trust-score font-bold text-black text-lg md:text-xl">4.6/5</span>
                                                    <span class="review-trust-stars flex items-center gap-0.5">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <svg class="w-3 h-3 {{ $i <= 4 ? 'text-orange-yellow fill-current' : ($i == 5 ? 'text-orange-yellow fill-current opacity-40' : 'text-light-grey') }}"
                                                                viewBox="0 0 24 24" fill="currentColor">
                                                                <path
                                                                    d="M12 0L15.09 8.26L24 9.27L18 14.14L19.18 21.02L12 17.77L4.82 21.02L6 14.14L0 9.27L8.91 8.26L12 0Z" />
                                                            </svg>
                                                        @endfor
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Google -->
                                        <div
                                            class="review-trust-card bg-white border-2 border-light-grey rounded-xl p-5 md:p-6 flex items-center gap-4 hover:border-green-zomp transition duration-200 shadow-sm hover:shadow-md">
                                            <div
                                                class="review-trust-icon google w-14 h-14 md:w-16 md:h-16 rounded-full bg-white border-2 border-[#4285F4] flex items-center justify-center flex-shrink-0 shadow-md overflow-hidden">
                                                <img src="{{ asset('assets/frontend/assets/images/google.png') }}" alt="Google"
                                                    class="w-10 h-10 md:w-12 md:h-12 object-contain">
                                            </div>
                                            <div class="review-trust-content flex-1">
                                                <span
                                                    class="review-trust-label block font-bold text-black text-base md:text-lg mb-2">Google</span>
                                                <div class="flex items-center gap-2">
                                                    <span
                                                        class="review-trust-score font-bold text-black text-lg md:text-xl">4.8/5</span>
                                                    <span class="review-trust-stars flex items-center gap-0.5">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <svg class="w-3 h-3 {{ $i <= 4 ? 'text-orange-yellow fill-current' : ($i == 5 ? 'text-orange-yellow fill-current opacity-40' : 'text-light-grey') }}"
                                                                viewBox="0 0 24 24" fill="currentColor">
                                                                <path
                                                                    d="M12 0L15.09 8.26L24 9.27L18 14.14L19.18 21.02L12 17.77L4.82 21.02L6 14.14L0 9.27L8.91 8.26L12 0Z" />
                                                            </svg>
                                                        @endfor
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- TripAdvisor -->
                                        <div
                                            class="review-trust-card bg-white border-2 border-light-grey rounded-xl p-5 md:p-6 flex items-center gap-4 hover:border-green-zomp transition duration-200 shadow-sm hover:shadow-md">
                                            <div
                                                class="review-trust-icon tripadvisor w-14 h-14 md:w-16 md:h-16 rounded-full bg-[#00AF87] flex items-center justify-center flex-shrink-0 shadow-md overflow-hidden">
                                                <img src="{{ asset('assets/frontend/assets/images/TripAdvisor.jpg') }}"
                                                    alt="TripAdvisor" class="w-10 h-10 md:w-12 md:h-12 object-contain">
                                            </div>
                                            <div class="review-trust-content flex-1">
                                                <span
                                                    class="review-trust-label block font-bold text-black text-base md:text-lg mb-2">TripAdvisor</span>
                                                <div class="flex items-center gap-2">
                                                    <span
                                                        class="review-trust-score font-bold text-black text-lg md:text-xl">4.8/5</span>
                                                    <span class="review-trust-stars flex items-center gap-0.5">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <svg class="w-3 h-3 {{ $i <= 4 ? 'text-orange-yellow fill-current' : ($i == 5 ? 'text-orange-yellow fill-current opacity-40' : 'text-light-grey') }}"
                                                                viewBox="0 0 24 24" fill="currentColor">
                                                                <path
                                                                    d="M12 0L15.09 8.26L24 9.27L18 14.14L19.18 21.02L12 17.77L4.82 21.02L6 14.14L0 9.27L8.91 8.26L12 0Z" />
                                                            </svg>
                                                        @endfor
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="bg-white-grey rounded-2xl p-10 md:p-12 text-center">
                                        <i class="fas fa-comments text-light-grey text-5xl md:text-6xl mb-4"></i>
                                        <p class="text-dark-grey text-base md:text-lg">There are no reviews yet.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-4">
                        <div class="border-2 border-green-zomp rounded-2xl p-6 bg-white-grey">
                            <h4 class="text-black text-[32px] font-semibold leading-[1.1] mb-6">
                                <span class="text-dark-grey text-base font-medium mr-2">From</span>
                                @if($tour->has_offer && $tour->isOfferActive())
                                    <span
                                        class="line-through text-grey text-lg mr-2">${{ number_format($tour->price_before_discount ?? $tour->price, 2) }}</span>
                                    ${{ number_format($tour->price_after_discount ?? $tour->price, 2) }}
                                @else
                                    ${{ number_format($tour->price, 2) }}
                                @endif
                            </h4>
                            <div class="col-span-8">
                                @php
                                    $hasSeasonalPrices = $tour->seasonalPrices->count() > 0;
                                    $basePrice = $tour->has_offer && $tour->isOfferActive()
                                        ? ($tour->price_after_discount ?? $tour->price)
                                        : $tour->price;
                                @endphp
                                <div class="booking-form-wrapper">
                                    <p class="text-black font-semibold mb-3">Book This Tour</p>

                                    @if(session('success'))
                                        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                                            <i class="fas fa-check-circle me-2"></i>
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if($errors->any())
                                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                                            <strong class="block mb-2">Please fix the following errors:</strong>
                                            <ul class="list-disc list-inside">
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('bookings.store') }}" method="POST" class="text-dark-grey"
                                        id="booking-form">
                                        @csrf
                                        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                                        <div class="mb-5">
                                            <input type="text" id="first_name" name="first_name" placeholder="First name"
                                                value="{{ old('first_name') }}"
                                                class="w-full border {{ $errors->has('first_name') ? 'border-red-500' : 'border-light-grey' }} rounded-lg py-2.5 px-4 outline-none">
                                            @error('first_name')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-5">
                                            <input type="text" id="last_name" name="last_name" placeholder="Last name"
                                                value="{{ old('last_name') }}"
                                                class="w-full border {{ $errors->has('last_name') ? 'border-red-500' : 'border-light-grey' }} rounded-lg py-2.5 px-4 outline-none">
                                            @error('last_name')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-5">
                                            <input type="email" id="email" name="email" placeholder="Email"
                                                value="{{ old('email') }}"
                                                class="w-full border {{ $errors->has('email') ? 'border-red-500' : 'border-light-grey' }} rounded-lg py-2.5 px-4 outline-none">
                                            @error('email')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-5">
                                            <input type="tel" id="phone" name="phone" placeholder="Phone"
                                                value="{{ old('phone') }}"
                                                class="w-full border {{ $errors->has('phone') ? 'border-red-500' : 'border-light-grey' }} rounded-lg py-2.5 px-4 outline-none">
                                            @error('phone')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        @if($hasSeasonalPrices)
                                            <div class="mb-5">
                                                <label class="block mb-2 text-dark-grey font-semibold">Accommodation
                                                    Type</label>
                                                <select id="accommodation_type" name="accommodation_type"
                                                    class="w-full border {{ $errors->has('accommodation_type_id') ? 'border-red-500' : 'border-light-grey' }} rounded-lg py-2.5 px-4 outline-none cursor-pointer">
                                                    <option value="">Select Accommodation Type</option>
                                                    @foreach($tour->seasonalPrices as $seasonalPrice)
                                                        @foreach($seasonalPrice->priceItems as $item)
                                                            <option value="{{ $item->id }}" data-price="{{ $item->price_value }}"
                                                                data-season="{{ $seasonalPrice->season_name }}" {{ old('accommodation_type_id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->price_name }} - {{ $seasonalPrice->season_name }}
                                                                (${{ number_format($item->price_value, 2) }})
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                                @error('accommodation_type_id')
                                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endif

                                        @if($tour->variants->count() > 0)
                                            <p class="mb-2.5 font-semibold">Extra Options</p>
                                            @php
                                                $oldVariants = old('selected_variants', []);
                                                // Convert to array if it's a JSON string
                                                if (is_string($oldVariants)) {
                                                    $oldVariants = json_decode($oldVariants, true) ?? [];
                                                }
                                                // Ensure it's an array
                                                if (!is_array($oldVariants)) {
                                                    $oldVariants = [];
                                                }
                                            @endphp
                                            @foreach($tour->variants as $variant)
                                                <div class="mb-2.5">
                                                    <label class="flex items-center gap-2 text-dark-grey cursor-pointer">
                                                        <input type="checkbox" class="variant-checkbox w-4 h-4"
                                                            data-variant-id="{{ $variant->id }}"
                                                            data-price="{{ $variant->additional_price }}" value="{{ $variant->id }}"
                                                            {{ in_array($variant->id, $oldVariants) ? 'checked' : '' }}>
                                                        <span>{{ $variant->title }}
                                                            (${{ number_format($variant->additional_price, 2) }})</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                            @error('selected_variants')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        @endif

                                        @error('total_price')
                                            <div class="mb-4">
                                                <p class="text-sm text-red-600">{{ $message }}</p>
                                            </div>
                                        @enderror

                                        <p class="mb-5 font-semibold text-black">Total: $<span
                                                id="total-price">{{ number_format($basePrice, 2) }}</span>
                                        </p>
                                        <input type="hidden" id="base-tour-price" value="{{ $basePrice }}">
                                        <input type="hidden" id="accommodation-type-id" name="accommodation_type_id"
                                            value="{{ old('accommodation_type_id') }}">
                                        <input type="hidden" id="selected-variants" name="selected_variants" value="">
                                        <input type="hidden" id="total-price-input" name="total_price"
                                            value="{{ old('total_price', $basePrice) }}">
                                        <button type="submit"
                                            class="text-white font-semibold py-4 px-6 w-full bg-green-zomp rounded-[200px] transition duration-200 hover:bg-green-zomp-hover hover:-translate-y-[5px]">Booking
                                            Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <h2 class="text-black text-3xl font-bold leading-[1.1] mb-8">Related Tours</h2>
            @if($relatedTours->count() > 0)
                <div class="swiper tours-similar-swiper">
                    <div class="swiper-wrapper">
                        @foreach($relatedTours as $relatedTour)
                            <div class="swiper-slide">
                                <article class="relative overflow-hidden transition duration-200">
                                    <div class="bg-white border rounded-2xl border-light-grey">
                                        <div class="relative overflow-hidden rounded-t-2xl">
                                            <a href="{{ route('tours.show', $relatedTour->slug) }}">
                                                @php
                                                    $relatedCoverImage = $relatedTour->cover_image ? asset('uploads/tours/' . $relatedTour->cover_image) : asset('assets/frontend/assets/images/blogs/01.png');
                                                @endphp
                                                <img src="{{ $relatedCoverImage }}" alt="{{ $relatedTour->title }}"
                                                    class="object-cover w-full h-auto transition duration-300 hover:scale-105">
                                                @if($relatedTour->has_offer && $relatedTour->isOfferActive())
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
                                                <span class="text-sm text-dark-grey">
                                                    @if($relatedTour->state)
                                                        {{ $relatedTour->state->name }}, {{ $relatedTour->country->name ?? '' }}
                                                    @elseif($relatedTour->country)
                                                        {{ $relatedTour->country->name }}
                                                    @endif
                                                </span>
                                            </div>

                                            <h4
                                                class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                                                <a
                                                    href="{{ route('tours.show', $relatedTour->slug) }}">{{ $relatedTour->title }}</a>
                                            </h4>

                                            <div class="flex items-center mb-2 text-orange-yellow">
                                                <span class="iconify" data-icon="mdi:star"></span>
                                                <span class="iconify" data-icon="mdi:star"></span>
                                                <span class="iconify" data-icon="mdi:star"></span>
                                                <span class="iconify" data-icon="mdi:star"></span>
                                                <span class="iconify" data-icon="mdi:star"></span>
                                            </div>

                                            <div class="flex flex-wrap items-center gap-2">
                                                @if($relatedTour->show_on_homepage)
                                                    <span
                                                        class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-featured transition hover:bg-green-zomp hover:text-white">Featured</span>
                                                @endif
                                            </div>

                                            <div class="h-px my-4 border-t border-light-grey"></div>

                                            @if($relatedTour->has_offer && $relatedTour->isOfferActive())
                                                <div class="mb-1 text-sm font-bold line-through text-grey">
                                                    ${{ number_format($relatedTour->price_before_discount ?? $relatedTour->price, 2) }}
                                                </div>
                                            @endif

                                            <div class="flex items-center justify-between gap-2">
                                                <span class="flex items-center gap-1">
                                                    <span>From</span>
                                                    <span class="text-base font-bold text-green-zomp">
                                                        @if($relatedTour->has_offer && $relatedTour->isOfferActive())
                                                            ${{ number_format($relatedTour->price_after_discount ?? $relatedTour->price, 2) }}
                                                        @else
                                                            ${{ number_format($relatedTour->price, 2) }}
                                                        @endif
                                                    </span>
                                                </span>
                                                <span class="flex items-center gap-1">
                                                    <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular"
                                                        data-width="15" data-height="15"></span>
                                                    <div class="text-sm text-dark-grey">
                                                        {{ $relatedTour->duration }}
                                                        {{ $relatedTour->duration_type == 'days' ? ($relatedTour->duration > 1 ? 'days' : 'day') : ($relatedTour->duration > 1 ? 'hours' : 'hour') }}
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-dark-grey text-center">No related tours available.</p>
            @endif
        </div>
    </section>
@endsection

@section('modals')
    <div class="review-modal hidden fixed inset-0 z-50 flex items-center justify-center [&.active]:flex">
        <div class="overlay absolute inset-0 bg-black/50 z-0"></div>
        <div class="modal-box w-[650px] relative z-10 rounded-2xl border-[3px] border-green-zomp bg-white p-6">
            <div class="p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                    <span class="text-sm text-dark-grey">Theme park, Singapore</span>
                </div>

                <h4 class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                    <a href="tours-details-style-01.html">Universal Studios Singapore Special
                        Ticket</a>
                </h4>

                <div class="flex items-center mb-2 text-orange-yellow">
                    <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                        data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                        data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                        class="ml-2 text-dark-grey">(200
                        reviews)</span>
                </div>

                <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                        class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-featured transition hover:bg-green-zomp hover:text-white">Featured</a><a
                        href="tours.html"
                        class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-best-seller transition hover:bg-green-zomp hover:text-white">Best
                        seller</a></div>

                <div class="h-px my-4 border-t border-light-grey"></div>

                <div class="mb-1 text-sm font-bold line-through text-grey">$80.50</div>

                <div class="flex items-center justify-between gap-2">
                    <span class="flex items-center gap-1">
                        <span>From</span>
                        <span class="text-base font-bold text-green-zomp">$60.50</span>
                    </span>
                    <span class="flex items-center gap-1">
                        <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                            data-height="15"></span>
                        <div class="text-sm text-dark-grey">3 days 2 nights</div>
                    </span>
                </div>
            </div>
        </div>
        </article>
    </div>
    <div class="swiper-slide">
        <article class="relative overflow-hidden transition duration-200">
            <div class="bg-white border rounded-2xl border-light-grey">
                <div class="relative overflow-hidden rounded-t-2xl">
                    <a href="tours-details-style-01.html">
                        <img src="./assets/images/tours/02.png" alt="Borobudur Sunrise Experience with Local Guide"
                            class="object-cover w-full h-auto transition duration-300 hover:scale-105">
                        <span
                            class="absolute top-4 right-4 bg-[#F51D35] rounded py-1 px-2 text-white text-sm font-semibold">On
                            Sale</span>
                    </a>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                        <span class="text-sm text-dark-grey">Cultural tour, Indonesia</span>
                    </div>

                    <h4
                        class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                        <a href="tours-details-style-01.html">Borobudur Sunrise Experience with Local
                            Guide</a>
                    </h4>

                    <div class="flex items-center mb-2 text-orange-yellow">
                        <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                            class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(145
                            reviews)</span>
                    </div>

                    <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-featured transition hover:bg-green-zomp hover:text-white">Featured</a>
                    </div>

                    <div class="h-px my-4 border-t border-light-grey"></div>

                    <div class="mb-1 text-sm font-bold line-through text-grey">$59.00</div>

                    <div class="flex items-center justify-between gap-2">
                        <span class="flex items-center gap-1">
                            <span>From</span>
                            <span class="text-base font-bold text-green-zomp">$45.00</span>
                        </span>
                        <span class="flex items-center gap-1">
                            <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                data-height="15"></span>
                            <div class="text-sm text-dark-grey">1 day</div>
                        </span>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="swiper-slide">
        <article class="relative overflow-hidden transition duration-200">
            <div class="bg-white border rounded-2xl border-light-grey">
                <div class="relative overflow-hidden rounded-t-2xl">
                    <a href="tours-details-style-01.html">
                        <img src="./assets/images/tours/03.png" alt="Phi Phi Island Speedboat Tour"
                            class="object-cover w-full h-auto transition duration-300 hover:scale-105">

                    </a>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                        <span class="text-sm text-dark-grey">Island, Thailand</span>
                    </div>

                    <h4
                        class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                        <a href="tours-details-style-01.html">Phi Phi Island Speedboat Tour</a>
                    </h4>

                    <div class="flex items-center mb-2 text-orange-yellow">
                        <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                            class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(320
                            reviews)</span>
                    </div>

                    <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-featured transition hover:bg-green-zomp hover:text-white">Featured</a>
                    </div>

                    <div class="h-px my-4 border-t border-light-grey"></div>



                    <div class="flex items-center justify-between gap-2">
                        <span class="flex items-center gap-1">
                            <span>From</span>
                            <span class="text-base font-bold text-green-zomp">$55.00</span>
                        </span>
                        <span class="flex items-center gap-1">
                            <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                data-height="15"></span>
                            <div class="text-sm text-dark-grey">1 day</div>
                        </span>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="swiper-slide">
        <article class="relative overflow-hidden transition duration-200">
            <div class="bg-white border rounded-2xl border-light-grey">
                <div class="relative overflow-hidden rounded-t-2xl">
                    <a href="tours-details-style-01.html">
                        <img src="./assets/images/tours/04.png" alt="Kuala Lumpur City &amp; Batu Caves Full Day Tour"
                            class="object-cover w-full h-auto transition duration-300 hover:scale-105">
                        <span
                            class="absolute top-4 right-4 bg-[#F51D35] rounded py-1 px-2 text-white text-sm font-semibold">On
                            Sale</span>
                    </a>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                        <span class="text-sm text-dark-grey">City tour, Malaysia</span>
                    </div>

                    <h4
                        class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                        <a href="tours-details-style-01.html">Kuala Lumpur City &amp; Batu Caves Full
                            Day Tour</a>
                    </h4>

                    <div class="flex items-center mb-2 text-orange-yellow">
                        <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                            class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(89
                            reviews)</span>
                    </div>

                    <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-cultural transition hover:bg-green-zomp hover:text-white">Cultural</a><a
                            href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-popular transition hover:bg-green-zomp hover:text-white">Popular</a>
                    </div>

                    <div class="h-px my-4 border-t border-light-grey"></div>

                    <div class="mb-1 text-sm font-bold line-through text-grey">$42.00</div>

                    <div class="flex items-center justify-between gap-2">
                        <span class="flex items-center gap-1">
                            <span>From</span>
                            <span class="text-base font-bold text-green-zomp">$35.00</span>
                        </span>
                        <span class="flex items-center gap-1">
                            <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                data-height="15"></span>
                            <div class="text-sm text-dark-grey">1 day</div>
                        </span>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="swiper-slide">
        <article class="relative overflow-hidden transition duration-200">
            <div class="bg-white border rounded-2xl border-light-grey">
                <div class="relative overflow-hidden rounded-t-2xl">
                    <a href="tours-details-style-01.html">
                        <img src="./assets/images/tours/05.png" alt="El Nido Island Hopping Adventure"
                            class="object-cover w-full h-auto transition duration-300 hover:scale-105">

                    </a>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                        <span class="text-sm text-dark-grey">Beach, Philippines</span>
                    </div>

                    <h4
                        class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                        <a href="tours-details-style-01.html">El Nido Island Hopping Adventure</a>
                    </h4>

                    <div class="flex items-center mb-2 text-orange-yellow">
                        <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                            class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(276
                            reviews)</span>
                    </div>

                    <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-featured transition hover:bg-green-zomp hover:text-white">Featured</a><a
                            href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-best-seller transition hover:bg-green-zomp hover:text-white">Best
                            seller</a><a href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-adventure transition hover:bg-green-zomp hover:text-white">Adventure</a>
                    </div>

                    <div class="h-px my-4 border-t border-light-grey"></div>



                    <div class="flex items-center justify-between gap-2">
                        <span class="flex items-center gap-1">
                            <span>From</span>
                            <span class="text-base font-bold text-green-zomp">$68.00</span>
                        </span>
                        <span class="flex items-center gap-1">
                            <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                data-height="15"></span>
                            <div class="text-sm text-dark-grey">2 days 1 night</div>
                        </span>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="swiper-slide">
        <article class="relative overflow-hidden transition duration-200">
            <div class="bg-white border rounded-2xl border-light-grey">
                <div class="relative overflow-hidden rounded-t-2xl">
                    <a href="tours-details-style-01.html">
                        <img src="./assets/images/tours/06.png" alt="Sapa Trekking &amp; Homestay Experience"
                            class="object-cover w-full h-auto transition duration-300 hover:scale-105">
                        <span
                            class="absolute top-4 right-4 bg-[#F51D35] rounded py-1 px-2 text-white text-sm font-semibold">On
                            Sale</span>
                    </a>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                        <span class="text-sm text-dark-grey">Mountain, Vietnam</span>
                    </div>

                    <h4
                        class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                        <a href="tours-details-style-01.html">Sapa Trekking &amp; Homestay
                            Experience</a>
                    </h4>

                    <div class="flex items-center mb-2 text-orange-yellow">
                        <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                            class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(152
                            reviews)</span>
                    </div>

                    <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-adventure transition hover:bg-green-zomp hover:text-white">Adventure</a><a
                            href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-cultural transition hover:bg-green-zomp hover:text-white">Cultural</a>
                    </div>

                    <div class="h-px my-4 border-t border-light-grey"></div>

                    <div class="mb-1 text-sm font-bold line-through text-grey">$95.00</div>

                    <div class="flex items-center justify-between gap-2">
                        <span class="flex items-center gap-1">
                            <span>From</span>
                            <span class="text-base font-bold text-green-zomp">$85.00</span>
                        </span>
                        <span class="flex items-center gap-1">
                            <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                data-height="15"></span>
                            <div class="text-sm text-dark-grey">3 days 2 nights</div>
                        </span>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="swiper-slide">
        <article class="relative overflow-hidden transition duration-200">
            <div class="bg-white border rounded-2xl border-light-grey">
                <div class="relative overflow-hidden rounded-t-2xl">
                    <a href="tours-details-style-01.html">
                        <img src="./assets/images/tours/07.png" alt="Tokyo Highlights &amp; Mt. Fuji Day Trip"
                            class="object-cover w-full h-auto transition duration-300 hover:scale-105">

                    </a>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                        <span class="text-sm text-dark-grey">City, Japan</span>
                    </div>

                    <h4
                        class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                        <a href="tours-details-style-01.html">Tokyo Highlights &amp; Mt. Fuji Day
                            Trip</a>
                    </h4>

                    <div class="flex items-center mb-2 text-orange-yellow">
                        <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                            class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(412
                            reviews)</span>
                    </div>

                    <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-featured transition hover:bg-green-zomp hover:text-white">Featured</a><a
                            href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-popular transition hover:bg-green-zomp hover:text-white">Popular</a>
                    </div>

                    <div class="h-px my-4 border-t border-light-grey"></div>



                    <div class="flex items-center justify-between gap-2">
                        <span class="flex items-center gap-1">
                            <span>From</span>
                            <span class="text-base font-bold text-green-zomp">$120.00</span>
                        </span>
                        <span class="flex items-center gap-1">
                            <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                data-height="15"></span>
                            <div class="text-sm text-dark-grey">1 day</div>
                        </span>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="swiper-slide">
        <article class="relative overflow-hidden transition duration-200">
            <div class="bg-white border rounded-2xl border-light-grey">
                <div class="relative overflow-hidden rounded-t-2xl">
                    <a href="tours-details-style-01.html">
                        <img src="./assets/images/tours/08.png" alt="Maldives Resort &amp; Snorkeling Package"
                            class="object-cover w-full h-auto transition duration-300 hover:scale-105">
                        <span
                            class="absolute top-4 right-4 bg-[#F51D35] rounded py-1 px-2 text-white text-sm font-semibold">On
                            Sale</span>
                    </a>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                        <span class="text-sm text-dark-grey">Beach, Maldives</span>
                    </div>

                    <h4
                        class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                        <a href="tours-details-style-01.html">Maldives Resort &amp; Snorkeling
                            Package</a>
                    </h4>

                    <div class="flex items-center mb-2 text-orange-yellow">
                        <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                            class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(95
                            reviews)</span>
                    </div>

                    <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-luxury transition hover:bg-green-zomp hover:text-white">Luxury</a><a
                            href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-best-seller transition hover:bg-green-zomp hover:text-white">Best
                            seller</a></div>

                    <div class="h-px my-4 border-t border-light-grey"></div>

                    <div class="mb-1 text-sm font-bold line-through text-grey">$420.00</div>

                    <div class="flex items-center justify-between gap-2">
                        <span class="flex items-center gap-1">
                            <span>From</span>
                            <span class="text-base font-bold text-green-zomp">$350.00</span>
                        </span>
                        <span class="flex items-center gap-1">
                            <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                data-height="15"></span>
                            <div class="text-sm text-dark-grey">5 days 4 nights</div>
                        </span>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="swiper-slide">
        <article class="relative overflow-hidden transition duration-200">
            <div class="bg-white border rounded-2xl border-light-grey">
                <div class="relative overflow-hidden rounded-t-2xl">
                    <a href="tours-details-style-01.html">
                        <img src="./assets/images/tours/09.png" alt="Masai Mara Wildlife Safari Experience"
                            class="object-cover w-full h-auto transition duration-300 hover:scale-105">

                    </a>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                        <span class="text-sm text-dark-grey">Safari, Kenya</span>
                    </div>

                    <h4
                        class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                        <a href="tours-details-style-01.html">Masai Mara Wildlife Safari Experience</a>
                    </h4>

                    <div class="flex items-center mb-2 text-orange-yellow">
                        <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                            class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(67
                            reviews)</span>
                    </div>

                    <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-adventure transition hover:bg-green-zomp hover:text-white">Adventure</a><a
                            href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-wildlife transition hover:bg-green-zomp hover:text-white">Wildlife</a>
                    </div>

                    <div class="h-px my-4 border-t border-light-grey"></div>



                    <div class="flex items-center justify-between gap-2">
                        <span class="flex items-center gap-1">
                            <span>From</span>
                            <span class="text-base font-bold text-green-zomp">$280.00</span>
                        </span>
                        <span class="flex items-center gap-1">
                            <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                data-height="15"></span>
                            <div class="text-sm text-dark-grey">4 days 3 nights</div>
                        </span>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="swiper-slide">
        <article class="relative overflow-hidden transition duration-200">
            <div class="bg-white border rounded-2xl border-light-grey">
                <div class="relative overflow-hidden rounded-t-2xl">
                    <a href="tours-details-style-01.html">
                        <img src="./assets/images/tours/10.png" alt="Sahara Desert Camel Trekking Tour"
                            class="object-cover w-full h-auto transition duration-300 hover:scale-105">
                        <span
                            class="absolute top-4 right-4 bg-[#F51D35] rounded py-1 px-2 text-white text-sm font-semibold">On
                            Sale</span>
                    </a>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                        <span class="text-sm text-dark-grey">Desert, Morocco</span>
                    </div>

                    <h4
                        class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                        <a href="tours-details-style-01.html">Sahara Desert Camel Trekking Tour</a>
                    </h4>

                    <div class="flex items-center mb-2 text-orange-yellow">
                        <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                            class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(134
                            reviews)</span>
                    </div>

                    <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-adventure transition hover:bg-green-zomp hover:text-white">Adventure</a><a
                            href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-cultural transition hover:bg-green-zomp hover:text-white">Cultural</a>
                    </div>

                    <div class="h-px my-4 border-t border-light-grey"></div>

                    <div class="mb-1 text-sm font-bold line-through text-grey">$185.00</div>

                    <div class="flex items-center justify-between gap-2">
                        <span class="flex items-center gap-1">
                            <span>From</span>
                            <span class="text-base font-bold text-green-zomp">$165.00</span>
                        </span>
                        <span class="flex items-center gap-1">
                            <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                data-height="15"></span>
                            <div class="text-sm text-dark-grey">3 days 2 nights</div>
                        </span>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="swiper-slide">
        <article class="relative overflow-hidden transition duration-200">
            <div class="bg-white border rounded-2xl border-light-grey">
                <div class="relative overflow-hidden rounded-t-2xl">
                    <a href="tours-details-style-01.html">
                        <img src="./assets/images/tours/11.png" alt="Angkor Wat Temple Complex Private Tour"
                            class="object-cover w-full h-auto transition duration-300 hover:scale-105">

                    </a>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                        <span class="text-sm text-dark-grey">Historic, Cambodia</span>
                    </div>

                    <h4
                        class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                        <a href="tours-details-style-01.html">Angkor Wat Temple Complex Private Tour</a>
                    </h4>

                    <div class="flex items-center mb-2 text-orange-yellow">
                        <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                            class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(198
                            reviews)</span>
                    </div>

                    <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-cultural transition hover:bg-green-zomp hover:text-white">Cultural</a><a
                            href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-featured transition hover:bg-green-zomp hover:text-white">Featured</a>
                    </div>

                    <div class="h-px my-4 border-t border-light-grey"></div>



                    <div class="flex items-center justify-between gap-2">
                        <span class="flex items-center gap-1">
                            <span>From</span>
                            <span class="text-base font-bold text-green-zomp">$75.00</span>
                        </span>
                        <span class="flex items-center gap-1">
                            <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                data-height="15"></span>
                            <div class="text-sm text-dark-grey">2 days 1 night</div>
                        </span>
                    </div>
                </div>
            </div>
        </article>
    </div>
    <div class="swiper-slide">
        <article class="relative overflow-hidden transition duration-200">
            <div class="bg-white border rounded-2xl border-light-grey">
                <div class="relative overflow-hidden rounded-t-2xl">
                    <a href="tours-details-style-01.html">
                        <img src="./assets/images/tours/12.png" alt="Seoul Food &amp; Culture Walking Tour"
                            class="object-cover w-full h-auto transition duration-300 hover:scale-105">
                        <span
                            class="absolute top-4 right-4 bg-[#F51D35] rounded py-1 px-2 text-white text-sm font-semibold">On
                            Sale</span>
                    </a>
                </div>
                <div class="p-4">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                        <span class="text-sm text-dark-grey">City, South Korea</span>
                    </div>

                    <h4
                        class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                        <a href="tours-details-style-01.html">Seoul Food &amp; Culture Walking Tour</a>
                    </h4>

                    <div class="flex items-center mb-2 text-orange-yellow">
                        <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                            class="iconify" data-icon="mdi:star"></span><span class="iconify"
                            data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(223
                            reviews)</span>
                    </div>

                    <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-cultural transition hover:bg-green-zomp hover:text-white">Cultural</a><a
                            href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-popular transition hover:bg-green-zomp hover:text-white">Popular</a><a
                            href="tours.html"
                            class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-food transition hover:bg-green-zomp hover:text-white">Food</a>
                    </div>

                    <div class="h-px my-4 border-t border-light-grey"></div>

                    <div class="mb-1 text-sm font-bold line-through text-grey">$65.00</div>

                    <div class="flex items-center justify-between gap-2">
                        <span class="flex items-center gap-1">
                            <span>From</span>
                            <span class="text-base font-bold text-green-zomp">$52.00</span>
                        </span>
                        <span class="flex items-center gap-1">
                            <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                data-height="15"></span>
                            <div class="text-sm text-dark-grey">1 day</div>
                        </span>
                    </div>
                </div>
            </div>
        </article>
    </div>
    </div>
    </div>
    </div>
    </section>
@endsection

@section('modals')
    <div class="review-modal hidden fixed inset-0 z-50 flex items-center justify-center [&.active]:flex">
        <div class="overlay absolute inset-0 bg-black/50 z-0"></div>
        <div class="modal-box w-[650px] relative z-10 rounded-2xl border-[3px] border-green-zomp bg-white p-6">
            <div class="flex items-center justify-between gap-4 mb-6">
                <h4 class="text-2xl text-black font-semibold leading-[1.1]">Write a review</h4>
                <div class="cursor-pointer x-review-modal">
                    <span class="iconify text-green-zomp" data-icon="ic:sharp-clear" data-width="24"
                        data-height="24"></span>
                </div>
            </div>
            <p class="text-darker-grey font-semibold mb-2">Rate your experience</p>
            <div class="flex items-center mb-6">
                <span class="iconify text-orange-yellow" data-icon="mdi:star" data-width="32" data-height="32"></span>
                <span class="iconify text-orange-yellow" data-icon="mdi:star" data-width="32" data-height="32"></span>
                <span class="iconify text-orange-yellow" data-icon="mdi:star" data-width="32" data-height="32"></span>
                <span class="iconify text-orange-yellow" data-icon="mdi:star" data-width="32" data-height="32"></span>
                <span class="iconify text-orange-yellow" data-icon="mdi:star" data-width="32" data-height="32"></span>
            </div>
            <form action="" class="text-dark-grey">
                <div class="mb-5">
                    <label class="block mb-2 text-dark-grey">Leave a review</label>
                    <textarea id="review" name="review" placeholder="Highlight your experience" rows="6"
                        class="w-full bg-white-grey rounded-lg py-2.5 px-4 outline-none"></textarea>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-dark-grey">Give your review a title</label>
                    <input type="text" id="review-title" name="review-title" placeholder="Summarize your experience"
                        class="w-full bg-white-grey rounded-lg py-2.5 px-4 outline-none">
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-dark-grey">Upload a photo</label>
                    <label for="review-photo"
                        class="w-24 h-24 border-2 border-dashed border-green-zomp rounded-lg flex items-center justify-center cursor-pointer bg-white-grey">
                        <span class="iconify text-green-zomp" data-icon="proicons:camera" data-width="32"
                            data-height="32"></span>
                    </label>
                    <input type="file" id="review-photo" name="review-photo" accept="image/*" class="hidden">
                </div>
                <button class="text-white font-semibold py-4 px-6 w-full bg-green-zomp rounded-[200px]">Send</button>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get base prices
            const baseTourPrice = parseFloat(document.getElementById('base-tour-price')?.value || 0);

            // Get elements
            const variantCheckboxes = document.querySelectorAll('.variant-checkbox');
            const accommodationSelect = document.getElementById('accommodation_type');
            const totalPriceElement = document.getElementById('total-price');

            // Calculate total price
            function calculateTotal() {
                // Start with base tour price
                let total = baseTourPrice;

                // Add accommodation price if selected
                if (accommodationSelect && accommodationSelect.value) {
                    const selectedOption = accommodationSelect.options[accommodationSelect.selectedIndex];
                    const accommodationPrice = parseFloat(selectedOption.getAttribute('data-price')) || 0;
                    total += accommodationPrice;
                }


                // Add variant prices
                variantCheckboxes.forEach(function (checkbox) {
                    if (checkbox.checked) {
                        const variantPrice = parseFloat(checkbox.getAttribute('data-price')) || 0;
                        total += variantPrice;
                    }
                });

                // Update total price display
                if (totalPriceElement) {
                    totalPriceElement.textContent = total.toFixed(2);
                }

                // Update hidden inputs for form submission
                const totalPriceInput = document.getElementById('total-price-input');
                if (totalPriceInput) {
                    totalPriceInput.value = total.toFixed(2);
                }

                // Update accommodation type id
                const accommodationTypeIdInput = document.getElementById('accommodation-type-id');
                if (accommodationTypeIdInput && accommodationSelect && accommodationSelect.value) {
                    accommodationTypeIdInput.value = accommodationSelect.value;
                } else if (accommodationTypeIdInput) {
                    accommodationTypeIdInput.value = '';
                }

                // Update selected variants
                const selectedVariantsInput = document.getElementById('selected-variants');
                if (selectedVariantsInput) {
                    const selectedVariants = [];
                    variantCheckboxes.forEach(function (checkbox) {
                        if (checkbox.checked) {
                            selectedVariants.push(checkbox.value);
                        }
                    });
                    selectedVariantsInput.value = JSON.stringify(selectedVariants);
                }
            }


            // Event listeners

            variantCheckboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', calculateTotal);
            });

            if (accommodationSelect) {
                accommodationSelect.addEventListener('change', function () {
                    calculateTotal();
                    // Update accommodation type id when changed
                    const accommodationTypeIdInput = document.getElementById('accommodation-type-id');
                    if (accommodationTypeIdInput) {
                        accommodationTypeIdInput.value = accommodationSelect.value || '';
                    }
                });
            }

            // Initialize on page load
            calculateTotal();

            // Function to select accommodation from table
            window.selectAccommodation = function (itemId, price, displayName) {
                if (accommodationSelect) {
                    accommodationSelect.value = itemId;
                    // Trigger change event to recalculate
                    accommodationSelect.dispatchEvent(new Event('change'));

                    // Highlight selected row
                    document.querySelectorAll('.accommodation-row').forEach(function (row) {
                        row.classList.remove('bg-green-zomp');
                        const nameCell = row.querySelector('.accommodation-name');
                        const priceCell = row.querySelector('.accommodation-price');
                        const descCell = row.querySelector('.accommodation-desc');

                        if (row.getAttribute('data-item-id') == itemId) {
                            row.classList.add('bg-green-zomp');
                            if (nameCell) {
                                nameCell.classList.remove('text-dark-grey');
                                nameCell.classList.add('text-white');
                            }
                            if (priceCell) {
                                priceCell.classList.remove('text-green-zomp');
                                priceCell.classList.add('text-white');
                            }
                            if (descCell) {
                                descCell.classList.remove('text-dark-grey');
                                descCell.classList.add('text-white');
                            }
                        } else {
                            if (nameCell) {
                                nameCell.classList.remove('text-white');
                                nameCell.classList.add('text-dark-grey');
                            }
                            if (priceCell) {
                                priceCell.classList.remove('text-white');
                                priceCell.classList.add('text-green-zomp');
                            }
                            if (descCell) {
                                descCell.classList.remove('text-white');
                                descCell.classList.add('text-dark-grey');
                            }
                        }
                    });
                }
            };

            // Initialize Reviews Swiper
            if (typeof Swiper !== 'undefined') {
                const reviewsSwiper = new Swiper('.reviews-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
                    navigation: {
                        nextEl: '.reviews-swiper-next',
                        prevEl: '.reviews-swiper-prev',
                    },
                    breakpoints: {
                        768: {
                            slidesPerView: 1,
                        },
                    },
                });
            }

            // Initialize total
            calculateTotal();

            // Handle form submission
            const bookingForm = document.getElementById('booking-form');
            if (bookingForm) {
                bookingForm.addEventListener('submit', function (e) {
                    // Ensure all hidden fields are updated before submission
                    calculateTotal();

                    // Validate required fields
                    const firstName = document.getElementById('first_name');
                    const lastName = document.getElementById('last_name');
                    const email = document.getElementById('email');
                    const phone = document.getElementById('phone');

                    let isValid = true;

                    if (!firstName || !firstName.value.trim()) {
                        isValid = false;
                        if (firstName) {
                            firstName.classList.add('border-red-500');
                        }
                    }

                    if (!lastName || !lastName.value.trim()) {
                        isValid = false;
                        if (lastName) {
                            lastName.classList.add('border-red-500');
                        }
                    }

                    if (!email || !email.value.trim() || !email.validity.valid) {
                        isValid = false;
                        if (email) {
                            email.classList.add('border-red-500');
                        }
                    }

                    if (!phone || !phone.value.trim()) {
                        isValid = false;
                        if (phone) {
                            phone.classList.add('border-red-500');
                        }
                    }

                    if (!isValid) {
                        e.preventDefault();
                        alert('Please fill in all required fields correctly.');
                        return false;
                    }

                    // Show loading state
                    const submitButton = bookingForm.querySelector('button[type="submit"]');
                    if (submitButton) {
                        submitButton.disabled = true;
                        submitButton.textContent = 'Submitting...';
                    }
                });
            }
        });
    </script>
@endpush