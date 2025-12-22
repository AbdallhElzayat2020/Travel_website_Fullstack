@extends('frontend.layouts.master')

@php
    $metaTitle = $experience->meta_title ?: $experience->title . ' - Nile Cruise Program';
    $metaDescription = $experience->meta_description
        ?: \Illuminate\Support\Str::limit(strip_tags($experience->short_description ?: $experience->description), 160);
    $metaKeywords = $experience->meta_keywords;
    $firstImage = $experience->images->first();
    $coverImageUrl = $firstImage
        ? asset('uploads/cruise-experiences/' . $firstImage->image)
        : asset('assets/frontend/assets/images/destination-01.png');
@endphp

@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)
@if($metaKeywords)
@section('meta_keywords', $metaKeywords)
@endif
@section('meta_image', $coverImageUrl)

@section('content')
    <section class="py-10 lg:py-12 border border-t-light-grey border-r-0 border-b-0 border-l-0">
        <div class="container">
            <nav class="font-medium text-grey" aria-label="Breadcrumb">
                <ul class="flex flex-wrap items-center gap-1 mb-2">
                    <li>
                        <a href="{{ route('home') }}" class="transition duration-200 hover:text-green-zomp">Home</a>
                    </li>
                    <span class="mx-1">/</span>
                    <li>
                        <a href="{{ route('nile-cruises.index') }}"
                            class="transition duration-200 hover:text-green-zomp">Nile Cruises</a>
                    </li>
                    <span class="mx-1">/</span>
                    <li>
                        <span class="text-dark-grey">{{ $experience->title }}</span>
                    </li>
                </ul>
            </nav>
            <h1 class="text-black text-[30px] md:text-[40px] font-bold leading-[1.1em] mb-4">
                {{ $experience->title }}
            </h1>
            @if($experience->short_description)
                <p class="text-dark-grey max-w-3xl leading-[1.6]">
                    {{ $experience->short_description }}
                </p>
            @endif
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="container">
            {{-- Gallery full-width --}}
            @if($experience->images->count())
                @php
                    $galleryImages = $experience->images;
                    $mainImage = $galleryImages->first()
                        ? asset('uploads/cruise-experiences/' . $galleryImages->first()->image)
                        : $coverImageUrl;
                @endphp
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 mb-8 items-stretch">
                    <div class="md:col-span-2">
                        <a data-fancybox="cruise-gallery" href="{{ $mainImage }}">
                            <div class="rounded-2xl overflow-hidden h-[260px] md:h-[360px] lg:h-[420px]">
                                <img src="{{ $coverImageUrl }}" alt="{{ $experience->title }}"
                                    class="w-full h-full object-cover" />
                            </div>
                        </a>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-1 gap-4">
                        @foreach($galleryImages->slice(0, 2) as $index => $image)
                            <a data-fancybox="cruise-gallery" href="{{ asset('uploads/cruise-experiences/' . $image->image) }}">
                                <div class="rounded-2xl overflow-hidden h-[120px] md:h-[140px]">
                                    <img src="{{ asset('uploads/cruise-experiences/' . $image->image) }}"
                                        alt="Image {{ $index + 1 }}" class="w-full h-full object-cover" />
                                </div>
                            </a>
                        @endforeach

                        @if($galleryImages->count() > 2)
                            @php
                                $thirdImage = $galleryImages->slice(2, 1)->first();
                            @endphp
                            @if($thirdImage)
                                <div class="relative">
                                    <a data-fancybox="cruise-gallery"
                                        href="{{ asset('uploads/cruise-experiences/' . $thirdImage->image) }}">
                                        <div class="rounded-2xl overflow-hidden h-[120px] md:h-[140px]">
                                            <img src="{{ asset('uploads/cruise-experiences/' . $thirdImage->image) }}" alt="Image 3"
                                                class="w-full h-full object-cover" />
                                        </div>
                                    </a>
                                    <button
                                        class="absolute bottom-3 right-3 bg-white text-black px-4 py-2.5 rounded-full font-semibold flex items-center gap-2 transition duration-200 hover:bg-green-zomp hover:text-white"
                                        data-fancybox="cruise-gallery" data-src="{{ $mainImage }}" data-thumb="{{ $mainImage }}">
                                        <span class="iconify" data-icon="dashicons:grid-view" data-width="18" data-height="18"></span>
                                        Gallery
                                    </button>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            @endif

            {{-- Program Content full-width --}}
            <div class="bg-white rounded-2xl border border-light-grey p-6 md:p-8">
                <h2 class="text-black text-2xl md:text-3xl font-bold mb-4">Program Overview</h2>
                <div class="prose max-w-none prose-p:mb-3 prose-ul:list-disc prose-ul:pl-5 prose-li:mb-1 text-dark-grey">
                    {!! $experience->description !!}
                </div>
            </div>
        </div>
    </section>

    {{-- Related Tours (same section position/style as tour details "Related Tours") --}}
    @if($experience->tours->count())
        <section class="mb-[60px] md:mb-24">
            <div class="container">
                <h2 class="text-black text-3xl font-bold leading-[1.1] mb-8">Related Tours</h2>
                <div class="swiper tours-similar-swiper">
                    <div class="swiper-wrapper">
                        @foreach($experience->tours as $tour)
                            @php
                                $tourCover = $tour->cover_image
                                    ? asset('uploads/tours/' . $tour->cover_image)
                                    : asset('assets/frontend/assets/images/destination-01.png');
                                $tourPrice = $tour->current_price ?? $tour->price;
                                $tourState = $tour->state->name ?? null;
                                $tourCountry = $tour->country->name ?? null;
                            @endphp
                            <div class="swiper-slide">
                                <article class="relative overflow-hidden transition duration-200">
                                    <div class="bg-white border rounded-2xl border-light-grey">
                                        <div class="relative overflow-hidden rounded-t-2xl">
                                            <a href="{{ route('tours.show', $tour->slug) }}">
                                                <img src="{{ $tourCover }}" alt="{{ $tour->title }}"
                                                    class="object-cover w-full h-auto transition duration-300 hover:scale-105">
                                            </a>
                                        </div>
                                        <div class="p-4">
                                            @if($tourState || $tourCountry)
                                                <div class="flex items-center gap-2 mb-2">
                                                    <span class="iconify" data-icon="ep:location" data-width="14"
                                                        data-height="14"></span>
                                                    <span class="text-sm text-dark-grey">
                                                        {{ trim(($tourState ? $tourState . ', ' : '') . ($tourCountry ?? '')) }}
                                                    </span>
                                                </div>
                                            @endif

                                            <h4
                                                class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                                                <a href="{{ route('tours.show', $tour->slug) }}">{{ $tour->title }}</a>
                                            </h4>

                                            <div class="flex items-center mb-2 text-orange-yellow">
                                                <span class="iconify" data-icon="mdi:star"></span>
                                                <span class="iconify" data-icon="mdi:star"></span>
                                                <span class="iconify" data-icon="mdi:star"></span>
                                                <span class="iconify" data-icon="mdi:star"></span>
                                                <span class="iconify" data-icon="mdi:star"></span>
                                            </div>

                                            <div class="h-px my-4 border-t border-light-grey"></div>

                                            @if($tourPrice !== null)
                                                <div class="flex items-center justify-between gap-2">
                                                    <span class="flex items-center gap-1">
                                                        <span>From</span>
                                                        <span class="text-base font-bold text-green-zomp">
                                                            {{ number_format($tourPrice, 2) }} EGP
                                                        </span>
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection