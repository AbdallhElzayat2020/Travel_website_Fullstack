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
                        @if($cruiseGroup)
                            <a href="/{{ $cruiseGroup->slug }}" class="transition duration-200 hover:text-green-zomp">{{ $cruiseGroup->name }}</a>
                        @else
                            <a href="{{ route('home') }}" class="transition duration-200 hover:text-green-zomp">Nile Cruises</a>
                        @endif
                    </li>
                    <span class="mx-1">/</span>
                    <li>
                        <span class="text-dark-grey">{{ $experience->title }}</span>
                    </li>
                </ul>
            </nav>
            <h1 class="text-black text-[40px] font-bold leading-[1.1em] mb-2">
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
            {{-- Gallery - Tour style layout --}}
            @if($experience->images->count())
                @php
                    $coverImage = $experience->images->first()
                        ? asset('uploads/cruise-experiences/' . $experience->images->first()->image)
                        : asset('assets/frontend/assets/images/destination-01.png');
                    $firstImage = $experience->images->first();
                    $mainImage = $firstImage ? asset('uploads/cruise-experiences/' . $firstImage->image) : $coverImage;
                    // Get side images (skip first one if it's used as main)
                    $sideImages = $experience->images->skip(1)->take(2);
                @endphp
                <div class="grid grid-cols-12 gap-6 mb-8">
                    <div class="col-span-12 lg:col-span-8">
                        <a data-fancybox="cruise-gallery" href="{{ $mainImage }}">
                            <img src="{{ $coverImage }}" alt="{{ $experience->title }}"
                                class="w-full h-full object-cover rounded-xl" />
                        </a>
                    </div>
                    <div class="col-span-12 grid grid-cols-2 lg:col-span-4 lg:flex lg:flex-col gap-4">
                        @if($sideImages->count() > 0)
                            @foreach($sideImages as $index => $image)
                                <a data-fancybox="cruise-gallery" href="{{ asset('uploads/cruise-experiences/' . $image->image) }}">
                                    <img src="{{ asset('uploads/cruise-experiences/' . $image->image) }}" alt="Image {{ $index + 2 }}"
                                        class="w-full h-full object-cover rounded-xl" />
                                </a>
                            @endforeach
                        @endif
                        @if($experience->images->count() > 3)
                            <div class="relative">
                                <a data-fancybox="cruise-gallery"
                                    href="{{ asset('uploads/cruise-experiences/' . $experience->images->skip(3)->first()->image) }}">
                                    <img src="{{ asset('uploads/cruise-experiences/' . $experience->images->skip(3)->first()->image) }}"
                                        alt="Image 4" class="w-full h-full object-cover rounded-xl" />
                                </a>
                                @if($experience->images->count() > 4)
                                    <button
                                        class="absolute bottom-3 right-3 bg-white text-black px-4 py-2.5 rounded-full font-semibold flex items-center gap-2 transition duration-200 hover:bg-green-zomp hover:text-white"
                                        data-fancybox="cruise-gallery" data-src="{{ asset('uploads/cruise-experiences/' . $experience->images->skip(4)->first()->image) }}">
                                        <span class="iconify" data-icon="dashicons:grid-view" data-width="18"
                                            data-height="18"></span>
                                        Gallery
                                    </button>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
                {{-- Add all images to Fancybox gallery (hidden links for navigation) --}}
                @foreach($experience->images as $image)
                    <a data-fancybox="cruise-gallery" href="{{ asset('uploads/cruise-experiences/' . $image->image) }}" style="display: none;"></a>
                @endforeach
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

    {{-- Related Tours with Pagination --}}
    @if(isset($relatedTours) && $relatedTours->count())
        <section class="mb-[60px] md:mb-24">
            <div class="container">
                <h2 class="text-black text-3xl font-bold leading-[1.1] mb-8">{{ $experience->title }} Tours</h2>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach($relatedTours as $tour)
                        @php
                            $tourCover = $tour->cover_image
                                ? asset('uploads/tours/' . $tour->cover_image)
                                : asset('assets/frontend/assets/images/destination-01.png');
                            $tourPrice = $tour->current_price ?? $tour->price;
                            $tourState = $tour->state->name ?? null;
                            $tourCountry = $tour->country->name ?? null;
                        @endphp
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
                                            <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
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
                    @endforeach
                </div>

                @if($relatedTours->hasPages())
                    <nav class="flex items-center justify-center gap-2 mt-10 sm:mt-14" aria-label="Pagination">
                        {{-- Previous Page Link --}}
                        @if ($relatedTours->onFirstPage())
                            <span
                                class="group border border-grey text-grey w-10 h-10 py-2 rounded-full flex items-center justify-center opacity-50 cursor-not-allowed">
                                <span class="iconify text-dark-grey" data-icon="proicons:chevron-left" data-width="20"
                                    data-height="20"></span>
                            </span>
                        @else
                            <a href="{{ $relatedTours->previousPageUrl() }}"
                                class="group border border-grey text-grey w-10 h-10 py-2 rounded-full flex items-center justify-center transition duration-200 hover:!border-green-zomp hover:!bg-green-zomp hover:!text-white">
                                <span class="iconify text-dark-grey group-hover:!text-white" data-icon="proicons:chevron-left"
                                    data-width="20" data-height="20"></span>
                            </a>
                        @endif

                        {{-- Pagination Elements --}}
                        @php
                            $currentPage = $relatedTours->currentPage();
                            $lastPage = $relatedTours->lastPage();
                            $startPage = max(1, $currentPage - 2);
                            $endPage = min($lastPage, $currentPage + 2);
                        @endphp

                        {{-- First Page --}}
                        @if ($startPage > 1)
                            <a href="{{ $relatedTours->url(1) }}"
                                class="border border-transparent text-dark-grey font-bold text-sm w-10 h-10 py-2 rounded-full flex items-center justify-center transition duration-200 hover:!border-green-zomp hover:!bg-green-zomp hover:!text-white">1</a>
                            @if ($startPage > 2)
                                <span
                                    class="text-dark-grey font-bold text-sm py-2 w-10 h-10 rounded-full flex items-center justify-center">...</span>
                            @endif
                        @endif

                        {{-- Page Range --}}
                        @for ($page = $startPage; $page <= $endPage; $page++)
                            @if ($page == $currentPage)
                                <span
                                    class="font-bold text-sm bg-green-zomp text-white w-10 h-10 py-2 rounded-full flex items-center justify-center">{{ $page }}</span>
                            @else
                                <a href="{{ $relatedTours->url($page) }}"
                                    class="border border-transparent text-dark-grey font-bold text-sm w-10 h-10 py-2 rounded-full flex items-center justify-center transition duration-200 hover:!border-green-zomp hover:!bg-green-zomp hover:!text-white">{{ $page }}</a>
                            @endif
                        @endfor

                        {{-- Last Page --}}
                        @if ($endPage < $lastPage)
                            @if ($endPage < $lastPage - 1)
                                <span
                                    class="text-dark-grey font-bold text-sm py-2 w-10 h-10 rounded-full flex items-center justify-center">...</span>
                            @endif
                            <a href="{{ $relatedTours->url($lastPage) }}"
                                class="border border-transparent text-dark-grey font-bold text-sm w-10 h-10 py-2 rounded-full flex items-center justify-center transition duration-200 hover:!border-green-zomp hover:!bg-green-zomp hover:!text-white">{{ $lastPage }}</a>
                        @endif

                        {{-- Next Page Link --}}
                        @if ($relatedTours->hasMorePages())
                            <a href="{{ $relatedTours->nextPageUrl() }}"
                                class="group border border-grey text-grey w-10 h-10 py-2 rounded-full flex items-center justify-center transition duration-200 hover:!border-green-zomp hover:!bg-green-zomp hover:!text-white">
                                <span class="iconify text-dark-grey group-hover:!text-white" data-icon="proicons:chevron-right"
                                    data-width="20" data-height="20"></span>
                            </a>
                        @else
                            <span
                                class="group border border-grey text-grey w-10 h-10 py-2 rounded-full flex items-center justify-center opacity-50 cursor-not-allowed">
                                <span class="iconify text-dark-grey" data-icon="proicons:chevron-right" data-width="20"
                                    data-height="20"></span>
                            </span>
                        @endif
                    </nav>
                @endif
            </div>
        </section>
    @endif
@endsection

@push('css')
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #8b7138;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #7a6230;
        }
    </style>
@endpush
