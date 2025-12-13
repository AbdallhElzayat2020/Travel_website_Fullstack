@extends('frontend.layouts.master')
@section('title', $gallery->title)

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
                    {!! nl2br(e($gallery->description)) !!}
                </div>
            @endif
        </div>
    </section>
@endsection
