@extends('frontend.layouts.master')
@section('title', 'Galleries')

@section('content')
    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-8">
                <h1 class="text-black font-bold text-[32px] leading-[1.1em] capitalize">Galleries</h1>
            </div>

            @if($galleries->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                    @foreach($galleries as $gallery)
                        @php
                            $cover = $gallery->cover_image
                                ? asset('uploads/galleries/' . $gallery->cover_image)
                                : asset('assets/frontend/assets/images/gallery-placeholder.png');
                        @endphp
                        <article class="group bg-white overflow-hidden rounded-2xl shadow-sm border border-light-grey">
                            <div class="overflow-hidden rounded-t-2xl">
                                <a href="{{ route('galleries.show', $gallery->slug) }}">
                                    <img src="{{ $cover }}" alt="{{ $gallery->title }}"
                                        class="w-full h-56 object-cover transition duration-300 group-hover:scale-105">
                                </a>
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-black mb-2 line-clamp-2 group-hover:text-green-zomp transition">
                                    <a href="{{ route('galleries.show', $gallery->slug) }}">{{ $gallery->title }}</a>
                                </h3>
                                @if($gallery->description)
                                    <p class="text-dark-grey text-sm line-clamp-2">{{ strip_tags($gallery->description) }}</p>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $galleries->links() }}
                </div>
            @else
                <div class="p-6 text-center text-dark-grey bg-white rounded-2xl border border-light-grey">
                    No galleries available yet.
                </div>
            @endif
        </div>
    </section>
@endsection
