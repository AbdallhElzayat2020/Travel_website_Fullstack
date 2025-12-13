@extends('frontend.layouts.master')
@php
    $metaTitle = $blog->meta_title ?? $blog->title;
@endphp
@section('meta_title', $metaTitle)
@if($blog->meta_description)
@section('meta_description', $blog->meta_description)
@endif
@if($blog->author)
@section('meta_author', $blog->author)
@endif
@if($blog->meta_keywords)
@section('meta_keywords', $blog->meta_keywords)
@endif

@section('content')
    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <div class="max-w-4xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="mb-6 text-sm">
                    <ol class="flex items-center gap-2 text-dark-grey">
                        <li><a href="{{ route('home') }}" class="hover:text-green-zomp transition">Home</a></li>
                        <li><span class="iconify" data-icon="mdi:chevron-right" data-width="16" data-height="16"></span>
                        </li>
                        <li><a href="{{ route('blogs.index') }}" class="hover:text-green-zomp transition">Blogs</a></li>
                        <li><span class="iconify" data-icon="mdi:chevron-right" data-width="16" data-height="16"></span>
                        </li>
                        <li class="text-black">{{ $blog->title }}</li>
                    </ol>
                </nav>

                <!-- Blog Header -->
                <div class="mb-6">
                    <h1 class="text-black font-bold text-[32px] md:text-[40px] leading-[1.2em] mb-4">{{ $metaTitle }}</h1>

                    <div class="flex flex-wrap items-center gap-4 text-sm text-dark-grey mb-4">
                        @if($blog->published_at)
                            <div class="flex items-center gap-2">
                                <span class="iconify" data-icon="mdi:calendar" data-width="16" data-height="16"></span>
                                <span>{{ $blog->published_at->format('M d, Y') }}</span>
                            </div>
                        @endif
                        @if($blog->author)
                            <div class="flex items-center gap-2">
                                <span class="iconify" data-icon="mdi:account" data-width="16" data-height="16"></span>
                                <span>{{ $blog->author }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Cover Image -->
                @if($blog->cover_image)
                    @php
                        $coverImage = asset('uploads/blogs/' . $blog->cover_image);
                    @endphp
                    <div class="rounded-2xl overflow-hidden mb-8">
                        <img src="{{ $coverImage }}" alt="{{ $blog->title }}" class="w-full h-auto object-cover">
                    </div>
                @endif

                <!-- Blog Content -->
                @if($blog->description)
                    <div class="prose max-w-none text-dark-grey text-base leading-relaxed">
                        {!! $blog->description !!}
                    </div>
                @elseif($blog->short_description)
                    <div class="prose max-w-none text-dark-grey text-base leading-relaxed">
                        {!! nl2br(e($blog->short_description)) !!}
                    </div>
                @endif

                <!-- Related Blogs -->
                @if(isset($relatedBlogs) && $relatedBlogs->count() > 0)
                    <div class="mt-12 pt-8 border-t border-light-grey">
                        <h2 class="text-black font-bold text-[28px] mb-6">Related Posts</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                            @foreach($relatedBlogs as $relatedBlog)
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
                                        @if($relatedDate)
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
