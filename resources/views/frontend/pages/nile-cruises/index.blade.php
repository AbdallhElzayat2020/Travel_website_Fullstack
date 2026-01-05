@extends('frontend.layouts.master')

@php
    $metaTitle = 'Nile Cruises - ' . config('app.name', 'Travel Website');
    $metaDescription = 'Discover our curated Nile cruise programs and experiences, with handpicked related tours for each cruise.';
@endphp

@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)

@section('content')
    <section class="py-10 lg:py-12 border border-t-light-grey border-r-0 border-b-0 border-l-0">
        <div class="container">
            <nav class="font-medium text-grey" aria-label="Breadcrumb">
                <ul class="flex flex-wrap items-center gap-1 mb-2">
                    <li>
                        <a href="{{ route('home') }}" class="transition duration-200 hover:text-green-zomp">Home</a>
                    </li>
                    <span class="mx-1">/</span>
                    <li><span class="text-dark-grey">Nile Cruises</span></li>
                </ul>
            </nav>
            <h1 class="text-black text-[32px] md:text-[40px] font-bold leading-[1.1em] mb-2">Nile Cruises</h1>
            <p class="text-dark-grey max-w-2xl">
                Explore our collection of Nile cruise journeys – each program comes with its own gallery, rich itinerary,
                and carefully selected related tours.
            </p>
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="container">
            @if($experiences->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 w-full">
                    @foreach($experiences as $experience)
                        @php
                            $firstImage = $experience->images->first();
                            $cover = $firstImage
                                ? asset('uploads/cruise-experiences/' . $firstImage->image)
                                : asset('assets/frontend/assets/images/destination-01.png');
                            $short = $experience->short_description
                                ? \Illuminate\Support\Str::limit(strip_tags($experience->short_description), 140)
                                : null;
                            $relatedToursCount = $experience->tours()->active()->count();

                            // Determine route based on group_key
                            $showRoute = match($experience->group_key ?? 'dahabiya') {
                                'dahabiya' => 'cruise-group-1.show',
                                'ultra' => 'cruise-group-2.show',
                                'grand' => 'cruise-group-3.show',
                                default => 'cruise-group-1.show',
                            };
                        @endphp
                        <article
                            class="group bg-white overflow-hidden rounded-2xl shadow-sm border border-light-grey flex flex-col">
                            <div class="relative overflow-hidden">
                                <a href="{{ route($showRoute, $experience->slug) }}">
                                    <img src="{{ $cover }}" alt="{{ $experience->title }}"
                                         class="w-full h-56 object-cover transition duration-300 group-hover:scale-105">
                                </a>
                            </div>
                            <div class="p-4 flex flex-col flex-1">
                                <h3
                                    class="text-lg font-bold text-black mb-2 leading-snug group-hover:text-green-zomp transition">
                                    <a href="{{ route($showRoute, $experience->slug) }}">
                                        {{ $experience->title }}
                                    </a>
                                </h3>

                                @if($short)
                                    <p class="text-sm text-dark-grey mb-4 flex-1">
                                        {{ $short }}
                                    </p>
                                @endif

                                <div class="mt-auto flex items-center justify-between gap-2 pt-2 border-t border-light-grey">
                                    <span class="text-xs font-medium text-grey uppercase tracking-wide">
                                        {{ $relatedToursCount }} {{ \Illuminate\Support\Str::plural('Tour', $relatedToursCount) }}
                                    </span>
                                    <a href="{{ route($showRoute, $experience->slug) }}"
                                       class="text-green-zomp text-sm font-semibold inline-flex items-center gap-1">
                                        View details
                                        <span class="iconify" data-icon="mdi:arrow-right" data-width="16"
                                              data-height="16"></span>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if($experiences->hasPages())
                    <nav class="flex items-center justify-center gap-2 mt-10 sm:mt-14" aria-label="Pagination">
                        {{-- Previous Page Link --}}
                        @if ($experiences->onFirstPage())
                            <span
                                class="group border border-grey text-grey w-10 h-10 py-2 rounded-full flex items-center justify-center opacity-50 cursor-not-allowed">
                                <span class="iconify text-dark-grey" data-icon="proicons:chevron-left" data-width="20"
                                      data-height="20"></span>
                            </span>
                        @else
                            <a href="{{ $experiences->previousPageUrl() }}"
                               class="group border border-grey text-grey w-10 h-10 py-2 rounded-full flex items-center justify-center transition duration-200 hover:!border-green-zomp hover:!bg-green-zomp hover:!text-white">
                                <span class="iconify text-dark-grey group-hover:!text-white"
                                      data-icon="proicons:chevron-left" data-width="20"
                                      data-height="20"></span>
                            </a>
                        @endif

                        {{-- Pagination Elements --}}
                        @php
                            $currentPage = $experiences->currentPage();
                            $lastPage = $experiences->lastPage();
                            $startPage = max(1, $currentPage - 2);
                            $endPage = min($lastPage, $currentPage + 2);
                        @endphp

                        {{-- First Page --}}
                        @if ($startPage > 1)
                            <a href="{{ $experiences->url(1) }}"
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
                                <a href="{{ $experiences->url($page) }}"
                                   class="border border-transparent text-dark-grey font-bold text-sm w-10 h-10 py-2 rounded-full flex items-center justify-center transition duration-200 hover:!border-green-zomp hover:!bg-green-zomp hover:!text-white">{{ $page }}</a>
                            @endif
                        @endfor

                        {{-- Last Page --}}
                        @if ($endPage < $lastPage)
                            @if ($endPage < $lastPage - 1)
                                <span
                                    class="text-dark-grey font-bold text-sm py-2 w-10 h-10 rounded-full flex items-center justify-center">...</span>
                            @endif
                            <a href="{{ $experiences->url($lastPage) }}"
                               class="border border-transparent text-dark-grey font-bold text-sm w-10 h-10 py-2 rounded-full flex items-center justify-center transition duration-200 hover:!border-green-zomp hover:!bg-green-zomp hover:!text-white">{{ $lastPage }}</a>
                        @endif

                        {{-- Next Page Link --}}
                        @if ($experiences->hasMorePages())
                            <a href="{{ $experiences->nextPageUrl() }}"
                               class="group border border-grey text-grey w-10 h-10 py-2 rounded-full flex items-center justify-center transition duration-200 hover:!border-green-zomp hover:!bg-green-zomp hover:!text-white">
                                <span class="iconify text-dark-grey group-hover:!text-white"
                                      data-icon="proicons:chevron-right"
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
            @else
                <div class="p-6 text-center text-dark-grey bg-white rounded-2xl border border-light-grey">
                    No Nile cruise programs are available at the moment.
                </div>
            @endif
        </div>
    </section>
@endsection


