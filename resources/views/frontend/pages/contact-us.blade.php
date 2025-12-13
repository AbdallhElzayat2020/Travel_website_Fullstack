@php
    $metaTitle = isset($page) && $page && $page->meta_title ? $page->meta_title : 'Contact Us';
    $metaDescription = isset($page) && $page ? $page->meta_description ?? null : null;
    $metaAuthor = isset($page) && $page ? $page->meta_author ?? null : null;
    $metaKeywords = isset($page) && $page ? $page->meta_keywords ?? null : null;
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
@extends('frontend.layouts.master')

@section('content')
    <section class="py-10 lg:py-12 border border-t-light-grey border-r-0 border-b-0 border-l-0">
        <div class="container">
            <nav class="font-medium text-grey" aria-label="Breadcrumb">
                <ul class="flex flex-wrap items-center gap-1 mb-2">
                    <li><a href="{{ route('home') }}" class="transition duration-200 hover:text-green-zomp">Home</a></li>
                    <span class="mx-1">/</span>
                    <li><span class="text-dark-grey">Contact us</span></li>
                </ul>
            </nav>
            <h1 class="text-black text-[40px] font-bold leading-[1.1em] mb-2">{{ $metaTitle }}</h1>
            <p class="text-dark-grey">Reach out to us for any inquiries or support—we're here to help!</p>
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="container p-6 md:p-[60px] xl:p-[120px] relative overflow-hidden bg-[#f2f4f4] rounded-2xl">
            <div class="absolute inset-0 z-0" style="background-image: url('{{ asset('assets/frontend/assets/images/about-us-bg-form.png') }}');
                                                        background-position: center center;
                                                        background-repeat: repeat;
                                                        opacity: 0.79;">
            </div>
            <div class="grid md:grid-cols-2 gap-10 md:gap-[60px] items-start relative z-10">
                <div class="wrapper">
                    <h2 class="text-black text-3xl md:text-[40px] font-bold capitalize leading-[1.1em] mb-7">
                        Let's connect and talk about your travel dreams
                    </h2>
                    <p class="text-dark-grey text-base leading-relaxed mb-6">
                        Talk about and plan what your travel dreams are this year, and we will help you to make your
                        dreams come true
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-green-light flex items-center justify-center">
                                <span class="iconify text-green-zomp" data-icon="mdi:email" data-width="24"
                                    data-height="24"></span>
                            </div>
                            <div>
                                <h3 class="text-black font-semibold mb-1">Email Us</h3>
                                <p class="text-dark-grey text-sm">Demo@domain.com</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-green-light flex items-center justify-center">
                                <span class="iconify text-green-zomp" data-icon="mdi:phone" data-width="24"
                                    data-height="24"></span>
                            </div>
                            <div>
                                <h3 class="text-black font-semibold mb-1">Call Us</h3>
                                <p class="text-dark-grey text-sm">(123) 456-7890</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-green-light flex items-center justify-center">
                                <span class="iconify text-green-zomp" data-icon="mdi:map-marker" data-width="24"
                                    data-height="24"></span>
                            </div>
                            <div>
                                <h3 class="text-black font-semibold mb-1">Visit Us</h3>
                                <p class="text-dark-grey text-sm">1901 Thornridge Cir. Shiloh, Hawaii 81063</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 md:p-8 shadow-lg">
                    <form action="{{ route('contact-us.store') }}" method="POST" class="space-y-5">
                        @csrf

                        @if (session('success'))
                            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-zomp rounded-lg flex items-start gap-3">
                                <span class="iconify text-green-zomp flex-shrink-0 mt-0.5" data-icon="mdi:check-circle"
                                    data-width="20" data-height="20"></span>
                                <div>
                                    <p class="text-green-800 font-medium">{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg">
                                <div class="flex items-start gap-3">
                                    <span class="iconify text-red-500 flex-shrink-0 mt-0.5" data-icon="mdi:alert-circle"
                                        data-width="20" data-height="20"></span>
                                    <div>
                                        <h4 class="text-red-800 font-semibold mb-2">Please fix the following errors:</h4>
                                        <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label for="name" class="block mb-2 text-dark-grey text-sm font-medium">
                                    Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Your name"
                                    required
                                    class="w-full border border-light-grey rounded-lg py-3 px-4 outline-none transition duration-200 focus:border-green-zomp focus:ring-2 focus:ring-green-zomp focus:ring-opacity-20 @error('name') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-dark-grey text-sm font-medium">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    placeholder="hello@email.com" required
                                    class="w-full border border-light-grey rounded-lg py-3 px-4 outline-none transition duration-200 focus:border-green-zomp focus:ring-2 focus:ring-green-zomp focus:ring-opacity-20 @error('email') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label for="phone" class="block mb-2 text-dark-grey text-sm font-medium">Phone</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                    placeholder="+1234567890"
                                    class="w-full border border-light-grey rounded-lg py-3 px-4 outline-none transition duration-200 focus:border-green-zomp focus:ring-2 focus:ring-green-zomp focus:ring-opacity-20 @error('phone') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="subject" class="block mb-2 text-dark-grey text-sm font-medium">Subject</label>
                                <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                                    placeholder="Subject"
                                    class="w-full border border-light-grey rounded-lg py-3 px-4 outline-none transition duration-200 focus:border-green-zomp focus:ring-2 focus:ring-green-zomp focus:ring-opacity-20 @error('subject') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">
                                @error('subject')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block mb-2 text-dark-grey text-sm font-medium">
                                Message <span class="text-red-500">*</span>
                            </label>
                            <textarea id="message" name="message" rows="6" required
                                placeholder="Tell us a little bit about your destination dream"
                                class="w-full border border-light-grey rounded-lg py-3 px-4 outline-none resize-none transition duration-200 focus:border-green-zomp focus:ring-2 focus:ring-green-zomp focus:ring-opacity-20 @error('message') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full bg-green-zomp text-white text-center font-semibold py-4 px-10 rounded-[200px] hover:bg-green-zomp-hover transition duration-200 transform hover:scale-[1.02] active:scale-[0.98] shadow-md hover:shadow-lg">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <div class="grid md:grid-cols-2 gap-10 md:gap-[60px] items-center justify-between">
                <iframe loading="lazy"
                    src="https://maps.google.com/maps?q=new%20york&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near"
                    title="new york" aria-label="new york" class="w-full h-[400px] rounded-2xl shadow-lg"></iframe>
                <div>
                    <h2 class="text-black font-bold text-2xl leading-[1.1em] mb-5">Travel Company</h2>
                    <div class="space-y-3 mb-6">
                        <p class="text-dark-grey flex items-center gap-2">
                            <span class="iconify text-green-zomp" data-icon="mdi:phone" data-width="20"
                                data-height="20"></span>
                            (123) 456-7890
                        </p>
                        <p class="text-dark-grey flex items-center gap-2">
                            <span class="iconify text-green-zomp" data-icon="mdi:email" data-width="20"
                                data-height="20"></span>
                            Demo@domain.com
                        </p>
                        <p class="text-dark-grey flex items-center gap-2">
                            <span class="iconify text-green-zomp" data-icon="mdi:map-marker" data-width="20"
                                data-height="20"></span>
                            1901 Thornridge Cir. Shiloh, Hawaii 81063
                        </p>
                    </div>
                    <ul class="space-x-4 flex items-center mb-6">
                        <li
                            class="group cursor-pointer w-[50px] h-[50px] rounded-md flex items-center justify-center p-2 bg-[#EBFEF5] transition duration-200 hover:bg-green-zomp">
                            <span class="iconify text-green-zomp group-hover:text-white" data-icon="mdi:facebook"
                                data-width="26" data-height="26"></span>
                        </li>
                        <li
                            class="group cursor-pointer w-[50px] h-[50px] rounded-md flex items-center justify-center p-2 bg-[#EBFEF5] transition duration-200 hover:bg-green-zomp">
                            <span class="iconify text-green-zomp group-hover:text-white" data-icon="mdi:instagram"
                                data-width="26" data-height="26"></span>
                        </li>
                        <li
                            class="group cursor-pointer w-[50px] h-[50px] rounded-md flex items-center justify-center p-2 bg-[#EBFEF5] transition duration-200 hover:bg-green-zomp">
                            <span class="iconify text-green-zomp group-hover:text-white" data-icon="ri:twitter-x-fill"
                                data-width="26" data-height="26"></span>
                        </li>
                    </ul>
                    <p class="text-dark-grey leading-relaxed">Amet, tellus lacinia aliquam ut semper morbi imperdiet vitae.
                        Sed leo
                        arcu, malesuada ut maecenas interdum. Nisl vitae leo amet nec, porttitor vitae odio tortor. A
                        pellentesque sodales urna, enim eros risus. Cras massa et odio donec faucibus in. Vitae pretium
                        massa dolor ullamcorper lectus elit quam.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
