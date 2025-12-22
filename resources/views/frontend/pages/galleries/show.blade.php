@extends('frontend.layouts.master')
@php
    $metaTitle = $gallery->title . ' - Gallery';
    $metaDescription = $gallery->description ? \Illuminate\Support\Str::limit(strip_tags($gallery->description), 160) : 'Explore our gallery of amazing travel destinations and experiences.';
    $metaImage = $gallery->cover_image ? asset('uploads/galleries/' . $gallery->cover_image) : null;
@endphp
@section('meta_title', $metaTitle)
@if($metaDescription)
@section('meta_description', $metaDescription)
@endif
@if($metaImage)
@section('meta_image', $metaImage)
@endif

@section('content')
    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <div class="mb-6">
                <h1 class="text-black font-bold text-[32px] leading-[1.1em] mb-2">{{ $gallery->title }}</h1>
                @if($gallery->published_at)
                    <p class="text-dark-grey text-sm">Published: {{ $gallery->published_at->format('M d, Y') }}</p>
                @endif
            </div>

            @php
                $cover = $gallery->cover_image
                    ? asset('uploads/galleries/' . $gallery->cover_image)
                    : asset('assets/frontend/assets/images/gallery-placeholder.png');
            @endphp

            <div class="rounded-2xl overflow-hidden mb-6">
                <img src="{{ $cover }}" alt="{{ $gallery->title }}" class="w-full h-auto object-cover">
            </div>

            @if($gallery->description)
                <div class="prose max-w-none text-dark-grey">
                    {!! $gallery->description!!}
                </div>
            @endif
        </div>
    </section>
@endsection
