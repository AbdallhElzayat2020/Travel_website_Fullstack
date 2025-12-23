@extends('frontend.layouts.master')
@php
    $metaTitle = $blog->meta_title ?? $blog->title;
    $metaImage = $blog->cover_image ? asset('uploads/blogs/' . $blog->cover_image) : null;
@endphp
@section('meta_title', $metaTitle)
@if ($blog->meta_description)
@section('meta_description', $blog->meta_description)
@endif
@if ($blog->author)
@section('meta_author', $blog->author)
@endif
@if ($blog->meta_keywords)
@section('meta_keywords', $blog->meta_keywords)
@endif
@if ($metaImage)
@section('meta_image', $metaImage)
@endif

@section('content')
    <section class="py-10 lg:py-12 border border-t-light-grey border-r-0 border-b-0 border-l-0">
        <div class="container">
            <nav class="font-medium text-grey" aria-label="Breadcrumb">
                <ul class="flex flex-wrap items-center gap-1 mb-2">
                    <li><a href="{{ route('home') }}" class="transition duration-200 hover:text-green-zomp">Home</a></li>
                    <span class="mx-1">/</span>
                    <li><a href="{{ route('blogs.index') }}" class="transition duration-200 hover:text-green-zomp">Blogs</a>
                    </li>
                    <span class="mx-1">/</span>
                    <li><span class="text-dark-grey">{{ $blog->title }}</span></li>
                </ul>
            </nav>
            <h1 class="text-black text-[40px] font-bold leading-[1.1em] mb-2">{{ $metaTitle }}</h1>
            <div class="flex flex-wrap items-center gap-4 text-sm text-dark-grey">
                @if ($blog->published_at)
                    <div class="flex items-center gap-2">
                        <span class="iconify" data-icon="mdi:calendar" data-width="16" data-height="16"></span>
                        <span>{{ $blog->published_at->format('M d, Y') }}</span>
                    </div>
                @endif
                @if ($blog->author)
                    <div class="flex items-center gap-2">
                        <span class="iconify" data-icon="mdi:account" data-width="16" data-height="16"></span>
                        <span>{{ $blog->author }}</span>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <div class="max-w-4xl mx-auto">
                <!-- Cover Image -->
                @if ($blog->cover_image)
                    @php
                        $coverImage = asset('uploads/blogs/' . $blog->cover_image);
                    @endphp
                    <div class="rounded-2xl overflow-hidden mb-8">
                        <img src="{{ $coverImage }}" alt="{{ $blog->title }}" class="w-full h-auto object-cover">
                    </div>
                @endif

                <!-- Blog Content -->
                @if ($blog->description)
                    <div class="prose max-w-none text-dark-grey text-base leading-relaxed">
                        {!! $blog->description !!}
                    </div>
                @elseif($blog->short_description)
                    <div class="prose max-w-none text-dark-grey text-base leading-relaxed">
                        {!! nl2br(e($blog->short_description)) !!}
                    </div>
                @endif

                <!-- Related Blogs -->
                @if (isset($relatedBlogs) && $relatedBlogs->count() > 0)
                    <div class="mt-12 pt-8 border-t border-light-grey">
                        <h2 class="text-black font-bold text-[28px] mb-6">Related Posts</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                            @foreach ($relatedBlogs as $relatedBlog)
                                @php
                                    $relatedCover = $relatedBlog->cover_image
                                        ? asset('uploads/blogs/' . $relatedBlog->cover_image)
                                        : asset('assets/frontend/assets/images/blogs/01.png');
                                    $relatedDate = $relatedBlog->published_at
                                        ? \Carbon\Carbon::parse($relatedBlog->published_at)->format('M d, Y')
                                        : '';
                                @endphp
                                <article class="group bg-white overflow-hidden rounded-2xl shadow-sm border border-light-grey">
                                    <div class="overflow-hidden rounded-t-2xl">
                                        <a href="{{ route('blogs.show', $relatedBlog->slug) }}">
                                            <img src="{{ $relatedCover }}" alt="{{ $relatedBlog->title }}"
                                                class="w-full h-40 object-cover transition duration-300 group-hover:scale-105">
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <h3
                                            class="text-base font-bold text-black mb-2 line-clamp-2 group-hover:text-green-zomp transition">
                                            <a href="{{ route('blogs.show', $relatedBlog->slug) }}">{{ $relatedBlog->title }}</a>
                                        </h3>
                                        @if ($relatedDate)
                                            <span class="block text-dark-grey text-xs mb-2">{{ $relatedDate }}</span>
                                        @endif
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
