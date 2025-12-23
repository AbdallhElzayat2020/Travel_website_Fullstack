@extends('frontend.layouts.master')

@php
    $metaTitle = $page->meta_title ?? $page->name;
    $metaDescription = $page->meta_description ?? null;
    $metaAuthor = $page->meta_author ?? null;
    $metaKeywords = $page->meta_keywords ?? null;
@endphp

@section('meta_title', $metaTitle)
@if ($metaDescription)
@section('meta_description', $metaDescription)
@endif
@if ($metaAuthor)
@section('meta_author', $metaAuthor)
@endif
@if ($metaKeywords)
@section('meta_keywords', $metaKeywords)
@endif

@section('content')
    <section class="py-10 lg:py-12 border border-t-light-grey border-r-0 border-b-0 border-l-0">
        <div class="container">
            <nav class="font-medium text-grey" aria-label="Breadcrumb">
                <ul class="flex flex-wrap items-center gap-1 mb-2">
                    <li><a href="{{ route('home') }}" class="transition duration-200 hover:text-green-zomp">Home</a></li>
                    <span class="mx-1">/</span>
                    <li><span class="text-dark-grey">{{ $page->name }}</span></li>
                </ul>
            </nav>
            <h1 class="text-black text-[40px] font-bold leading-[1.1em] mb-2">{{ $page->name }}</h1>
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <div class="bg-white rounded-2xl border border-light-grey p-6 md:p-8 lg:p-10">
                @if ($page->content)
                    <div class="summernote-content">
                        {!! $page->content !!}
                    </div>
                @else
                    <div class="text-center py-12">
                        <p class="text-dark-grey text-lg">Content coming soon...</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@push('css')
    <style>
        /* Summernote Content Styling */
        .summernote-content {
            color: #4a5568;
            line-height: 1.8;
            font-size: 16px;
        }

        .summernote-content h1,
        .summernote-content h2,
        .summernote-content h3,
        .summernote-content h4,
        .summernote-content h5,
        .summernote-content h6 {
            color: #1a202c;
            font-weight: 700;
            margin-top: 1.5em;
            margin-bottom: 0.75em;
            line-height: 1.3;
        }

        .summernote-content h1 {
            font-size: 2.25rem;
        }

        .summernote-content h2 {
            font-size: 1.875rem;
        }

        .summernote-content h3 {
            font-size: 1.5rem;
        }

        .summernote-content h4 {
            font-size: 1.25rem;
        }

        .summernote-content h5 {
            font-size: 1.125rem;
        }

        .summernote-content h6 {
            font-size: 1rem;
        }

        .summernote-content p {
            margin-bottom: 1em;
            line-height: 1.8;
            color: #4a5568;
        }

        .summernote-content ul,
        .summernote-content ol {
            margin: 1em 0;
            padding-left: 2em;
        }

        .summernote-content ul {
            list-style-type: disc;
        }

        .summernote-content ol {
            list-style-type: decimal;
        }

        .summernote-content li {
            margin-bottom: 0.5em;
            line-height: 1.8;
        }

        .summernote-content ul ul,
        .summernote-content ol ol,
        .summernote-content ul ol,
        .summernote-content ol ul {
            margin-top: 0.5em;
            margin-bottom: 0.5em;
        }

        .summernote-content a {
            color: #8b7138;
            text-decoration: none;
            transition: color 0.2s;
        }

        .summernote-content a:hover {
            color: #7a6230;
            text-decoration: underline;
        }

        .summernote-content strong,
        .summernote-content b {
            font-weight: 700;
            color: #1a202c;
        }

        .summernote-content em,
        .summernote-content i {
            font-style: italic;
        }

        .summernote-content u {
            text-decoration: underline;
        }

        .summernote-content blockquote {
            border-left: 4px solid #8b7138;
            padding-left: 1.5em;
            margin: 1.5em 0;
            font-style: italic;
            color: #718096;
        }

        .summernote-content table {
            width: 100%;
            border-collapse: collapse;
            margin: 1.5em 0;
        }

        .summernote-content table th,
        .summernote-content table td {
            border: 1px solid #e2e8f0;
            padding: 0.75em;
            text-align: left;
        }

        .summernote-content table th {
            background-color: #f7fafc;
            font-weight: 700;
            color: #1a202c;
        }

        .summernote-content table tr:nth-child(even) {
            background-color: #f9fafb;
        }

        .summernote-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin: 1.5em 0;
        }

        .summernote-content img[style*="float: left"],
        .summernote-content .note-image-float-left {
            float: left;
            margin-right: 1.5em;
            margin-bottom: 1em;
        }

        .summernote-content img[style*="float: right"],
        .summernote-content .note-image-float-right {
            float: right;
            margin-left: 1.5em;
            margin-bottom: 1em;
        }

        .summernote-content hr {
            border: none;
            border-top: 2px solid #e2e8f0;
            margin: 2em 0;
        }

        .summernote-content code {
            background-color: #f7fafc;
            padding: 0.2em 0.4em;
            border-radius: 0.25rem;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
            color: #e53e3e;
        }

        .summernote-content pre {
            background-color: #f7fafc;
            padding: 1em;
            border-radius: 0.5rem;
            overflow-x: auto;
            margin: 1.5em 0;
        }

        .summernote-content pre code {
            background-color: transparent;
            padding: 0;
            color: inherit;
        }

        /* Text Alignment */
        .summernote-content [style*="text-align: left"] {
            text-align: left;
        }

        .summernote-content [style*="text-align: center"] {
            text-align: center;
        }

        .summernote-content [style*="text-align: right"] {
            text-align: right;
        }

        .summernote-content [style*="text-align: justify"] {
            text-align: justify;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .summernote-content {
                font-size: 15px;
            }

            .summernote-content h1 {
                font-size: 1.875rem;
            }

            .summernote-content h2 {
                font-size: 1.5rem;
            }

            .summernote-content h3 {
                font-size: 1.25rem;
            }

            .summernote-content table {
                font-size: 0.875rem;
            }

            .summernote-content img[style*="float: left"],
            .summernote-content img[style*="float: right"],
            .summernote-content .note-image-float-left,
            .summernote-content .note-image-float-right {
                float: none;
                margin: 1em 0;
            }
        }
    </style>
@endpush
