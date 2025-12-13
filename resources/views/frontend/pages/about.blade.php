@extends('frontend.layouts.master')
@php
    $metaTitle = isset($page) && $page && $page->meta_title ? $page->meta_title : 'About Us';
    $metaDescription = isset($page) && $page ? ($page->meta_description ?? null) : null;
    $metaAuthor = isset($page) && $page ? ($page->meta_author ?? null) : null;
    $metaKeywords = isset($page) && $page ? ($page->meta_keywords ?? null) : null;
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
                    <li><span class="text-dark-grey">About us</span></li>
                </ul>
            </nav>
            <h1 class="text-black text-[40px] font-bold leading-[1.1em] mb-2">{{ $metaTitle }}</h1>
            <p class="text-dark-grey">Let’s explore what we do!</p>
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="relative px-4 xl:px-64">
            <img src="{{ asset('assets/frontend/assets/images/about-us-bg.png') }}" alt="Thumbnail"
                class="w-full min-h-[400px] object-cover rounded-2xl" />
            <a href="https://www.youtube.com/watch?v=KUKjXffO_tI" data-fancybox
                class="absolute inset-0 flex items-center justify-center">
                <div class="w-[90px] h-[90px] rounded-full border-[3px] border-white flex items-center justify-center">
                    <span class="iconify text-white" data-icon="iconoir:play-solid" data-width="48" data-height="48">
                    </span>
                </div>
            </a>
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <h2
                class="text-black text-3xl sm:text-[45px] xl:text-[56px] text-center font-bold leading-[1.1em] mb-5 md:max-w-[630px] mx-auto capitalize">
                Provide the best travel experience for you</h2>
            <p class="text-dark-grey text-center mb-10 md:mb-24 md:max-w-[730px] mx-auto">We understand that every
                journey has unique needs. Therefore, we offer customized travel packages designed according to your
                preferences and budget.</p>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="items bg-green-light rounded-2xl py-5 px-8">
                    <img src="{{ asset('assets/frontend/assets/images/our-vision.svg') }}" alt=""
                        class="w-[72px] h-auto mb-6">
                    <h2 class="text-black font-bold text-[32px] leading-[1.1em] mb-6">Our Vision</h2>
                    <p class="text-dark-grey">Our vision is to become a leading travel agency company that provides
                        high-quality services and inspiration for our customer.</p>
                </div>
                <div class="items bg-green-light rounded-2xl py-5 px-8">
                    <img src="{{ asset('assets/frontend/assets/images/our-mission.svg') }}" alt=""
                        class="w-[72px] h-auto mb-6">
                    <h2 class="text-black font-bold text-[32px] leading-[1.1em] mb-6">Our Mission</h2>
                    <p class="text-dark-grey">Our mission is to provide travel packages that are unique, personalized,
                        and cater to individual wants and needs.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-[60px] xl:mb-24 bg-green-dark py-[60px] xl:py-[100px]">
        <div class="container">
            <div class="grid xl:grid-cols-2 gap-10 xl:gap-24 items-center justify-between">
                <div class="text-center xl:text-left">
                    <h2 class="text-white text-3xl sm:text-[45px] xl:text-[56px] font-bold leading-[1.1em] mb-7 capitalize">
                        Finding your dream destination is our priority</h2>
                    <p class="text-light-grey">With a collection of destinations that include stunning natural
                        landscapes, vibrant cosmopolitan cities and enchanting tropical islands, we take you to the
                        world's most stunning places.</p>
                </div>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div class="bg-green-light rounded-2xl py-11 px-5">
                        <img src="{{ asset('assets/frontend/assets/images/dream-01.svg') }}" alt=""
                            class="w-10 h-auto mb-7">
                        <h2 class="text-black font-bold text-2xl leading-[1.1em] mb-3">Lots of choices</h2>
                        <p class="text-dark-grey">
                            Thousands of the best destinations are ready to spoil your eyes.
                        </p>
                    </div>
                    <div class="bg-green-light rounded-2xl py-11 px-5">
                        <img src="{{ asset('assets/frontend/assets/images/dream-02.svg') }}" alt=""
                            class="w-10 h-auto mb-7">
                        <h2 class="text-black font-bold text-2xl leading-[1.1em] mb-3">Accomodation</h2>
                        <p class="text-dark-grey">
                            There are many choices of interesting destinations to make stories on your trip.
                        </p>
                    </div>
                    <div class="bg-green-light rounded-2xl py-11 px-5">
                        <img src="{{ asset('assets/frontend/assets/images/dream-03.svg') }}" alt=""
                            class="w-10 h-auto mb-7">
                        <h2 class="text-black font-bold text-2xl leading-[1.1em] mb-3">Easy Booking</h2>
                        <p class="text-dark-grey">
                            No need to be complicated in ordering tickets, order now with a few taps.
                        </p>
                    </div>
                    <div class="bg-green-light rounded-2xl py-11 px-5">
                        <img src="{{ asset('assets/frontend/assets/images/dream-04.svg') }}" alt=""
                            class="w-10 h-auto mb-7">
                        <h2 class="text-black font-bold text-2xl leading-[1.1em] mb-3">Best Tour Guide</h2>
                        <p class="text-dark-grey">
                            Don't worry about traveling anywhere, our tour guide is ready to guide you anytime.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <div class="grid md:grid-cols-2 gap-10 md:gap-24 items-center justify-between">
                <div class="order-2 md:order-1">
                    <img src="{{ asset('assets/frontend/assets/images/about-us-enjoy.png') }}" alt=""
                        class="w-full h-auto object-cover rounded-2xl" />
                </div>
                <div class="order-1 md:order-2">
                    <div class="wrapper">
                        <h2
                            class="text-black text-3xl sm:text-[45px] xl:text-[56px] font-bold leading-[1.1em] mb-5 capitalize">
                            Enjoy exclusive personalized service and an unforgettable experience
                        </h2>
                        <p class="text-dark-grey">
                            We are a team of professionals with a deep passion for travel. We believe that travel is a
                            window to adventure, cultural discovery and personal growth.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-[60px] xl:py-[120px] bg-green-light">
        <div class="container">
            <div class="md:max-w-[670px] mx-auto text-center mb-10 md:mb-[60px]">
                <h2 class="text-black text-3xl sm:text-[45px] xl:text-[56px] font-bold leading-[1.1em] mb-7 capitalize">
                    Experienced professionals with best service</h2>
                <p class="text-dark-grey">Our team consists of experienced professionals and is highly committed to
                    providing the best service to our customers.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="{{ asset('assets/frontend/assets/images/list-gallery/10.png') }}" alt=""
                        class="w-full h-auto object-cover rounded-2xl" />
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                        style="background: linear-gradient(180deg, rgba(12, 20, 29, 0.028125) 54.09%, rgba(12, 20, 29, 0.117) 66.22%, rgba(12, 20, 29, 0.9) 100%);">
                    </div>
                    <div
                        class="absolute bottom-6 left-6 text-white opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 z-10">
                        <h4 class="text-[32px] font-bold">John Marvel</h4>
                        <p class="text-xl font-semibold">Travel Expert Team</p>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="{{ asset('assets/frontend/assets/images/list-gallery/11.png') }}" alt=""
                        class="w-full h-auto object-cover rounded-2xl" />
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                        style="background: linear-gradient(180deg, rgba(12, 20, 29, 0.028125) 54.09%, rgba(12, 20, 29, 0.117) 66.22%, rgba(12, 20, 29, 0.9) 100%);">
                    </div>
                    <div
                        class="absolute bottom-6 left-6 text-white opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 z-10">
                        <h4 class="text-[32px] font-bold">John Marvel</h4>
                        <p class="text-xl font-semibold">Travel Expert Team</p>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="{{ asset('assets/frontend/assets/images/list-gallery/12.png') }}" alt=""
                        class="w-full h-auto object-cover rounded-2xl" />
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                        style="background: linear-gradient(180deg, rgba(12, 20, 29, 0.028125) 54.09%, rgba(12, 20, 29, 0.117) 66.22%, rgba(12, 20, 29, 0.9) 100%);">
                    </div>
                    <div
                        class="absolute bottom-6 left-6 text-white opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 z-10">
                        <h4 class="text-[32px] font-bold">John Marvel</h4>
                        <p class="text-xl font-semibold">Travel Expert Team</p>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="{{ asset('assets/frontend/assets/images/list-gallery/13.png') }}" alt=""
                        class="w-full h-auto object-cover rounded-2xl" />
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                        style="background: linear-gradient(180deg, rgba(12, 20, 29, 0.028125) 54.09%, rgba(12, 20, 29, 0.117) 66.22%, rgba(12, 20, 29, 0.9) 100%);">
                    </div>
                    <div
                        class="absolute bottom-6 left-6 text-white opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 z-10">
                        <h4 class="text-[32px] font-bold">John Marvel</h4>
                        <p class="text-xl font-semibold">Travel Expert Team</p>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="{{ asset('assets/frontend/assets/images/list-gallery/14.png') }}" alt=""
                        class="w-full h-auto object-cover rounded-2xl" />
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                        style="background: linear-gradient(180deg, rgba(12, 20, 29, 0.028125) 54.09%, rgba(12, 20, 29, 0.117) 66.22%, rgba(12, 20, 29, 0.9) 100%);">
                    </div>
                    <div
                        class="absolute bottom-6 left-6 text-white opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 z-10">
                        <h4 class="text-[32px] font-bold">John Marvel</h4>
                        <p class="text-xl font-semibold">Travel Expert Team</p>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="{{ asset('assets/frontend/assets/images/list-gallery/15.png') }}" alt=""
                        class="w-full h-auto object-cover rounded-2xl" />
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                        style="background: linear-gradient(180deg, rgba(12, 20, 29, 0.028125) 54.09%, rgba(12, 20, 29, 0.117) 66.22%, rgba(12, 20, 29, 0.9) 100%);">
                    </div>
                    <div
                        class="absolute bottom-6 left-6 text-white opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 z-10">
                        <h4 class="text-[32px] font-bold">John Marvel</h4>
                        <p class="text-xl font-semibold">Travel Expert Team</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-[60px] xl:py-[120px] bg-white">
        <div class="container">
            <div class="grid md:grid-cols-3 gap-10">
                <div class="flex flex-col items-center text-center">
                    <img src="{{ asset('assets/frontend/assets/images/email.svg') }}" alt=""
                        class="w-[72px] h-auto mx-auto mb-6">
                    <h2 class="text-black font-bold text-[32px] leading-[1.1em] mb-6">Email</h2>
                    <p class="text-dark-grey min-h-[60px]">A wonderful serenity has taken possession of my entire soul,
                        like these sweet mornings.</p>
                    <a href="" class="text-[#1B78EE] font-semibold mt-auto">hello@travelwp.com</a>
                </div>

                <div class="flex flex-col items-center text-center">
                    <img src="{{ asset('assets/frontend/assets/images/phone.svg') }}" alt=""
                        class="w-[72px] h-auto mx-auto mb-6">
                    <h2 class="text-black font-bold text-[32px] leading-[1.1em] mb-6">Phone</h2>
                    <p class="text-dark-grey min-h-[60px]">A wonderful serenity has taken possession of my entire soul,
                        like these sweet mornings.</p>
                    <a href="" class="text-[#1B78EE] font-semibold mt-auto">(308) 555-0121</a>
                </div>

                <div class="flex flex-col items-center text-center">
                    <img src="{{ asset('assets/frontend/assets/images/location.svg') }}" alt=""
                        class="w-[72px] h-auto mx-auto mb-6">
                    <h2 class="text-black font-bold text-[32px] leading-[1.1em] mb-6">Location</h2>
                    <p class="text-dark-grey min-h-[60px]">1901 Thornridge Cir. Shiloh, Hawaii 81063</p>
                    <a href="" class="text-[#1B78EE] font-semibold mt-auto">View on Google Map</a>
                </div>
            </div>
        </div>
    </section>

    <section class="relative py-[60px] xl:py-[120px] bg-[#f2f4f4] overflow-hidden">
        <div class="absolute inset-0 z-0" style="background-image: url('{{ asset('assets/frontend/assets/images/about-us-bg-form.png') }}');
                                                                background-position: center center;
                                                                background-repeat: repeat;
                                                                opacity: 0.79;">
        </div>
        <div class="container relative z-10">
            <div class="grid xl:grid-cols-2 gap-10 xl:gap-24 items-center justify-center xl:justify-between">
                <div class="wrapper">
                    <h2 class="text-black text-3xl sm:text-[40px] font-bold capitalize leading-[1.1em] mb-7">
                        Let’s connect and talk about your travel dreams
                    </h2>
                    <p class="text-dark-grey">
                        Talk about and plan what your travel dreams are this year, and we will help you to make your
                        dreams come true
                    </p>
                </div>
                <form action="" method="post">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-dark-grey text-sm">Name</label>
                        <input type="text" id="name" name="name" placeholder="Your name"
                            class="w-full border border-light-grey rounded-lg py-2.5 px-4 outline-none" required
                            minlength="2">
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-dark-grey text-sm">Email</label>
                        <input type="email" id="email" name="email" placeholder="hello@email.com"
                            class="w-full border border-light-grey rounded-lg py-2.5 px-4 outline-none" required>
                    </div>

                    <div class="mb-6">
                        <label for="destination" class="block mb-2 text-dark-grey text-sm">How can we help?</label>
                        <textarea id="destination" name="destination"
                            placeholder="Tell us a little bit about your destination dream" rows="6"
                            class="w-full border border-light-grey rounded-lg py-2.5 px-4 outline-none" required
                            minlength="10"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-green-zomp text-white text-center font-semibold py-4 px-10 rounded-[200px]">
                        Send
                    </button>
                </form>
            </div>
        </div>
    </section>

@endsection()
