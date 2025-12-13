@extends('frontend.layouts.master')
@php
    $blogsPage = \App\Models\Page::getBySlug('blogs');
    $metaTitle = $blogsPage && $blogsPage->meta_title ? $blogsPage->meta_title : 'Blogs';
@endphp
@section('meta_title', $metaTitle)
@if($blogsPage && $blogsPage->meta_description)
@section('meta_description', $blogsPage->meta_description)
@endif
@if($blogsPage && $blogsPage->meta_author)
@section('meta_author', $blogsPage->meta_author)
@endif
@if($blogsPage && $blogsPage->meta_keywords)
@section('meta_keywords', $blogsPage->meta_keywords)
@endif

@section('content')
    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-8">
                <h1 class="text-black font-bold text-[32px] leading-[1.1em] capitalize">{{ $metaTitle }}</h1>
            </div>

            @if($blogs->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                    @foreach($blogs as $blog)
                        @php
                            $blogCover = $blog->cover_image
                                ? asset('uploads/blogs/' . $blog->cover_image)
                                : asset('assets/frontend/assets/images/blogs/01.png');
                            $blogDate = $blog->published_at
                                ? \Carbon\Carbon::parse($blog->published_at)->format('M d, Y')
                                : '';
                        @endphp
                        <article class="group bg-white overflow-hidden rounded-2xl shadow-sm border border-light-grey">
                            <div class="overflow-hidden rounded-t-2xl">
                                <a href="{{ route('blogs.show', $blog->slug) }}">
                                    <img src="{{ $blogCover }}" alt="{{ $blog->title }}"
                                        class="w-full h-56 object-cover transition duration-300 group-hover:scale-105">
                                </a>
                            </div>
                            <div class="p-4 pb-6">
                                <h3 class="text-lg font-bold text-black mb-2 line-clamp-2 group-hover:text-green-zomp transition">
                                    <a href="{{ route('blogs.show', $blog->slug) }}">{{ $blog->title }}</a>
                                </h3>
                                @if($blogDate)
                                    <span class="block text-dark-grey text-sm mb-2">{{ $blogDate }}</span>
                                @endif
                                @if($blog->short_description)
                                    <p class="text-dark-grey text-sm line-clamp-3">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($blog->short_description), 140) }}
                                    </p>
                                @endif
                                @if($blog->author)
                                    <div class="mt-3 flex items-center gap-2 text-sm text-dark-grey">
                                        <span class="iconify" data-icon="mdi:account" data-width="16" data-height="16"></span>
                                        <span>{{ $blog->author }}</span>
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>

                @if($blogs->hasPages())
                    <nav class="flex items-center justify-center gap-2 mt-10 sm:mt-16" aria-label="Pagination">
                        {{-- Previous Page Link --}}
                        @if ($blogs->onFirstPage())
                            <span
                                class="group border border-grey text-grey w-12 h-12 py-3 rounded-full flex items-center justify-center opacity-50 cursor-not-allowed">
                                <span class="iconify text-dark-grey" data-icon="proicons:chevron-left" data-width="24"
                                    data-height="24"></span>
                            </span>
                        @else
                            <a href="{{ $blogs->previousPageUrl() }}"
                                class="group border border-grey text-grey w-12 h-12 py-3 rounded-full flex items-center justify-center transition duration-200 hover:!border-green-zomp hover:!bg-green-zomp hover:!text-white">
                                <span class="iconify text-dark-grey group-hover:!text-white" data-icon="proicons:chevron-left"
                                    data-width="24" data-height="24"></span>
                            </a>
                        @endif

                        {{-- Pagination Elements --}}
                        @php
                            $currentPage = $blogs->currentPage();
                            $lastPage = $blogs->lastPage();
                            $startPage = max(1, $currentPage - 2);
                            $endPage = min($lastPage, $currentPage + 2);
                        @endphp

                        {{-- First Page --}}
                        @if ($startPage > 1)
                            <a href="{{ $blogs->url(1) }}"
                                class="border border-transparent text-dark-grey font-bold text-base w-12 h-12 py-3 rounded-full flex items-center justify-center transition duration-200 hover:!border-green-zomp hover:!bg-green-zomp hover:!text-white">1</a>
                            @if ($startPage > 2)
                                <span
                                    class="text-dark-grey font-bold text-base py-3 w-12 h-12 rounded-full flex items-center justify-center">...</span>
                            @endif
                        @endif

                        {{-- Page Range --}}
                        @for ($page = $startPage; $page <= $endPage; $page++)
                            @if ($page == $currentPage)
                                <span
                                    class="font-bold text-base bg-green-zomp text-white w-12 h-12 py-3 rounded-full flex items-center justify-center">{{ $page }}</span>
                            @else
                                <a href="{{ $blogs->url($page) }}"
                                    class="border border-transparent text-dark-grey font-bold text-base w-12 h-12 py-3 rounded-full flex items-center justify-center transition duration-200 hover:!border-green-zomp hover:!bg-green-zomp hover:!text-white">{{ $page }}</a>
                            @endif
                        @endfor

                        {{-- Last Page --}}
                        @if ($endPage < $lastPage)
                            @if ($endPage < $lastPage - 1)
                                <span
                                    class="text-dark-grey font-bold text-base py-3 w-12 h-12 rounded-full flex items-center justify-center">...</span>
                            @endif
                            <a href="{{ $blogs->url($lastPage) }}"
                                class="border border-transparent text-dark-grey font-bold text-base w-12 h-12 py-3 rounded-full flex items-center justify-center transition duration-200 hover:!border-green-zomp hover:!bg-green-zomp hover:!text-white">{{ $lastPage }}</a>
                        @endif

                        {{-- Next Page Link --}}
                        @if ($blogs->hasMorePages())
                            <a href="{{ $blogs->nextPageUrl() }}"
                                class="group border border-grey text-grey w-12 h-12 py-3 rounded-full flex items-center justify-center transition duration-200 hover:!border-green-zomp hover:!bg-green-zomp hover:!text-white">
                                <span class="iconify text-dark-grey group-hover:!text-white" data-icon="proicons:chevron-right"
                                    data-width="24" data-height="24"></span>
                            </a>
                        @else
                            <span
                                class="group border border-grey text-grey w-12 h-12 py-3 rounded-full flex items-center justify-center opacity-50 cursor-not-allowed">
                                <span class="iconify text-dark-grey" data-icon="proicons:chevron-right" data-width="24"
                                    data-height="24"></span>
                            </span>
                        @endif
                    </nav>
                @endif
            @else
                <div class="p-6 text-center text-dark-grey bg-white rounded-2xl border border-light-grey">
                    No blog posts available yet.
                </div>
            @endif
        </div>
    </section>
@endsection
