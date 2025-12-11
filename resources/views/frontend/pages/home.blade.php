@extends('frontend.layouts.master')
@section('title', 'Home Page')

@section('content')
    <section class="mx-4 md:mx-6 mb-[60px] md:mb-24">
        <div class="swiper hero-swiper rounded-[32px] overflow-hidden">
            <div class="swiper-wrapper">
                @forelse($sliders as $slider)
                    <div class="swiper-slide bg-cover bg-center bg-no-repeat py-20 md:py-[130px] flex flex-col items-center w-full justify-center text-white"
                        style="background-image: url('{{ asset('uploads/sliders/' . $slider->image) }}')">
                        <div class="px-4 md:px-0 max-w-4xl mx-auto text-center">
                            <h1 class="text-[35px] sm:text-[45px] md:text-[56px] font-bold leading-[1.3em] mb-4 text-center">
                                {!! nl2br(e($slider->title)) !!}
                            </h1>
                            @if($slider->description)
                                <p class="mb-4 md:mb-10 text-lg font-semibold text-center">
                                    {{ $slider->description }}
                                </p>
                            @endif
                            @if($slider->link && $slider->button_text)
                                <a href="{{ $slider->link }}"
                                    class="inline-block bg-green-zomp text-white font-semibold py-3 px-8 rounded-[200px] transition duration-200 hover:bg-[#50d8c8] hover:-translate-y-1">
                                    {{ $slider->button_text }}
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <!-- Default Slide if no sliders -->
                    <div class="swiper-slide bg-cover bg-center bg-no-repeat py-20 md:py-[130px] flex flex-col items-center w-full justify-center text-white"
                        style="background-image: url('{{ asset('assets/frontend/assets/images/hero-banner.png') }}')">
                        <div class="px-4 md:px-0 max-w-4xl mx-auto text-center">
                            <h1 class="text-[35px] sm:text-[45px] md:text-[56px] font-bold leading-[1.3em] mb-4 text-center">
                                Discover amazing destinations. <br />
                                Create unforgettable memories.
                            </h1>
                            <p class="mb-4 md:mb-10 text-lg font-semibold text-center">Your next adventure is just one click
                                away</p>
                        </div>
                    </div>
                @endforelse
            </div>
            <!-- Navigation buttons -->
            <div class="swiper-button-next hero-swiper-next !text-white !w-12 !h-12 !mt-0 rounded-full p-2 bg-white/20 backdrop-blur-sm transition duration-200 hover:!bg-white/30"
                style="--swiper-navigation-size: 20px"></div>
            <div class="swiper-button-prev hero-swiper-prev !text-white !w-12 !h-12 !mt-0 rounded-full p-2 bg-white/20 backdrop-blur-sm transition duration-200 hover:!bg-white/30"
                style="--swiper-navigation-size: 20px"></div>
            <!-- Pagination -->
            <div class="swiper-pagination hero-swiper-pagination !bottom-6"></div>
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 lg:gap-6">
                <div class="text-center items">
                    <img src="./assets/images/features-01.svg" alt="" class="w-[72px] h-auto mx-auto mb-6">
                    <h4 class="mb-2 text-xl font-semibold text-black">Discover the possibilities</h4>
                    <p class="text-dark-grey">With nearly half a million attractions, <br /> hotels & more, you're sure
                        to find joy.</p>
                </div>
                <div class="text-center items">
                    <img src="./assets/images/features-02.svg" alt="" class="w-[72px] h-auto mx-auto mb-6">
                    <h4 class="mb-2 text-xl font-semibold text-black">Enjoy deals & delights</h4>
                    <p class="text-dark-grey">Quality activities. Great prices. Plus, <br /> earn credits to save more.
                    </p>
                </div>
                <div class="text-center items">
                    <img src="./assets/images/features-03.svg" alt="" class="w-[72px] h-auto mx-auto mb-6">
                    <h4 class="mb-2 text-xl font-semibold text-black">Exploring made easy</h4>
                    <p class="text-dark-grey">Book last minute, skip lines & get free <br /> cancellation for easier
                        exploring.</p>
                </div>
                <div class="text-center items">
                    <img src="./assets/images/features-04.svg" alt="" class="w-[72px] h-auto mx-auto mb-6">
                    <h4 class="mb-2 text-xl font-semibold text-black">Travel you can trust</h4>
                    <p class="text-dark-grey">Read reviews & get reliable customer <br /> support. We're with you at
                        every step.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <div class="flex items-center justify-between mb-10">
                <h2 class="text-black font-bold text-[32px] leading-[1.1em]">Top Destination For Your Next Vacation
                </h2>
                <div class="hidden sm:flex items-center gap-4">
                    <div class="swiper-button-prev top-destination-prev !relative !w-12 !h-12 !text-dark-grey !mt-0 !left-0 !right-0 rounded-full p-2 bg-white-grey transition duration-200 hover:!text-white hover:bg-green-zomp"
                        style="--swiper-navigation-size: 20px"></div>
                    <div class="swiper-button-next top-destination-next !relative !w-12 !h-12 !text-dark-grey !mt-0 !left-0 !right-0 rounded-full p-2 bg-white-grey transition duration-200 hover:!text-white hover:bg-green-zomp"
                        style="--swiper-navigation-size: 20px"></div>
                </div>
            </div>
            <div class="relative">
                <div class="swiper top-destination-swipper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide group relative min-h-[400px] rounded-2xl overflow-hidden">
                            <a href="tour-destination.html">
                                <img src="./assets/images/top-destination/01.png" alt=""
                                    class="absolute inset-0 z-0 object-cover w-full h-full" />
                            </a>
                            <div
                                class="absolute inset-0 before:content-[''] before:absolute before:inset-0 before:bg-gradient-to-b before:from-[#00000008] before:to-[#000] before:z-[1] opacity-60">
                            </div>
                            <h2
                                class="text-white font-bold text-[32px] absolute bottom-6 left-6 z-10 transition duration-200 group-hover:-translate-y-28 hover:text-green-zomp">
                                <a href="tour-destination.html">Tokyo</a>
                            </h2>
                            <div
                                class="absolute z-10 transition-all duration-200 transform translate-y-6 opacity-0 bottom-6 left-6 right-6 group-hover:translate-y-0 group-hover:opacity-100">
                                <p class="mb-6 text-white">Discover the Tokyo with our special tours</p>
                                <a href="tour-destination.html"
                                    class="border border-white text-sm text-white font-semibold py-3 px-4 rounded-[200px] transition duration-200 hover:bg-green-zomp hover:border-green-zomp">See
                                    All Tours</a>
                            </div>
                        </div>
                        <div class="swiper-slide group relative min-h-[400px] rounded-2xl overflow-hidden">
                            <a href="tour-destination.html">
                                <img src="./assets/images/top-destination/02.png" alt=""
                                    class="absolute inset-0 z-0 object-cover w-full h-full" />
                            </a>
                            <div
                                class="absolute inset-0 before:content-[''] before:absolute before:inset-0 before:bg-gradient-to-b before:from-[#00000008] before:to-[#000] before:z-[1] opacity-60">
                            </div>
                            <h2
                                class="text-white font-bold text-[32px] absolute bottom-6 left-6 z-10 transition duration-200 group-hover:-translate-y-28 hover:text-green-zomp">
                                <a href="tour-destination.html">Bali</a>
                            </h2>
                            <div
                                class="absolute z-10 transition-all duration-200 transform translate-y-6 opacity-0 bottom-6 left-6 right-6 group-hover:translate-y-0 group-hover:opacity-100">
                                <p class="mb-6 text-white">Discover the Bali with our special tours</p>
                                <a href="tour-destination.html"
                                    class="border border-white text-sm text-white font-semibold py-3 px-4 rounded-[200px] transition duration-200 hover:bg-green-zomp hover:border-green-zomp">See
                                    All Tours</a>
                            </div>
                        </div>
                        <div class="swiper-slide group relative min-h-[400px] rounded-2xl overflow-hidden">
                            <a href="tour-destination.html">
                                <img src="./assets/images/top-destination/03.png" alt=""
                                    class="absolute inset-0 z-0 object-cover w-full h-full" />
                            </a>
                            <div
                                class="absolute inset-0 before:content-[''] before:absolute before:inset-0 before:bg-gradient-to-b before:from-[#00000008] before:to-[#000] before:z-[1] opacity-60">
                            </div>
                            <h2
                                class="text-white font-bold text-[32px] absolute bottom-6 left-6 z-10 transition duration-200 group-hover:-translate-y-28 hover:text-green-zomp">
                                <a href="tour-destination.html">Bangkok</a>
                            </h2>
                            <div
                                class="absolute z-10 transition-all duration-200 transform translate-y-6 opacity-0 bottom-6 left-6 right-6 group-hover:translate-y-0 group-hover:opacity-100">
                                <p class="mb-6 text-white">Discover the Bali with our special tours</p>
                                <a href="tour-destination.html"
                                    class="border border-white text-sm text-white font-semibold py-3 px-4 rounded-[200px] transition duration-200 hover:bg-green-zomp hover:border-green-zomp">See
                                    All Tours</a>
                            </div>
                        </div>
                        <div class="swiper-slide group relative min-h-[400px] rounded-2xl overflow-hidden">
                            <a href="tour-destination.html">
                                <img src="./assets/images/top-destination/04.png" alt=""
                                    class="absolute inset-0 z-0 object-cover w-full h-full" />
                            </a>
                            <div
                                class="absolute inset-0 before:content-[''] before:absolute before:inset-0 before:bg-gradient-to-b before:from-[#00000008] before:to-[#000] before:z-[1] opacity-60">
                            </div>
                            <h2
                                class="text-white font-bold text-[32px] absolute bottom-6 left-6 z-10 transition duration-200 group-hover:-translate-y-28 hover:text-green-zomp">
                                <a href="tour-destination.html">Cancun</a>
                            </h2>
                            <div
                                class="absolute z-10 transition-all duration-200 transform translate-y-6 opacity-0 bottom-6 left-6 right-6 group-hover:translate-y-0 group-hover:opacity-100">
                                <p class="mb-6 text-white">Discover the Bali with our special tours</p>
                                <a href="tour-destination.html"
                                    class="border border-white text-sm text-white font-semibold py-3 px-4 rounded-[200px] transition duration-200 hover:bg-green-zomp hover:border-green-zomp">See
                                    All Tours</a>
                            </div>
                        </div>
                        <div class="swiper-slide group relative min-h-[400px] rounded-2xl overflow-hidden">
                            <a href="tour-destination.html">
                                <img src="./assets/images/top-destination/02.png" alt=""
                                    class="absolute inset-0 z-0 object-cover w-full h-full" />
                            </a>
                            <div
                                class="absolute inset-0 before:content-[''] before:absolute before:inset-0 before:bg-gradient-to-b before:from-[#00000008] before:to-[#000] before:z-[1] opacity-60">
                            </div>
                            <h2
                                class="text-white font-bold text-[32px] absolute bottom-6 left-6 z-10 transition duration-200 group-hover:-translate-y-28 hover:text-green-zomp">
                                <a href="tour-destination.html">Phuket</a>
                            </h2>
                            <div
                                class="absolute z-10 transition-all duration-200 transform translate-y-6 opacity-0 bottom-6 left-6 right-6 group-hover:translate-y-0 group-hover:opacity-100">
                                <p class="mb-6 text-white">Discover the Bali with our special tours</p>
                                <a href="tour-destination.html"
                                    class="border border-white text-sm text-white font-semibold py-3 px-4 rounded-[200px] transition duration-200 hover:bg-green-zomp hover:border-green-zomp">See
                                    All Tours</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination top-destination-pagination !-bottom-11 sm:hidden"></div>
            </div>
            <div class="flex justify-center mt-14 sm:mt-10">
                <a href="destinations.html"
                    class="text-green-zomp py-4 px-6 rounded-[200px] border border-green-zomp font-semibold transition duration-200 hover:text-white hover:bg-green-zomp capitalize">See
                    All Destination</a>
            </div>
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <h2 class="text-black font-bold text-[32px] leading-[1.1em] capitalize mb-10">Offers to inspire you</h2>
            <div class="grid md:grid-cols-2 gap-4 md:gap-6">
                <div class="rounded-2xl md:rounded-3xl bg-cover bg-center bg-no-repeat relative overflow-hidden"
                    style="background-image: url('./assets/images/inspire-01.png');">
                    <div class="absolute inset-0 rounded-2xl md:rounded-3xl"
                        style="background: linear-gradient(134deg, #11A191 18%, #01AA9000 100%);"></div>
                    <div class="relative p-[34px] lg:pr-[157px] h-full flex flex-col justify-between">
                        <div>
                            <h2 class="text-white font-bold text-[32px] leading-[1.3] mb-4">South Bali (Kuta, Canggu,
                                Uluwatu, Jimbaran)</h2>
                            <p class="text-white mb-[60px]">Travel hassle-free within Bali, visit popular attractions,
                                or do water activities!</p>
                        </div>
                        <a href="trip-ideas.html"
                            class="block w-max text-green-zomp capitalize p-4 bg-white rounded-[200px] border border-green-zomp font-semibold transition duration-200 hover:text-white hover:bg-green-zomp">
                            See all activities
                        </a>
                    </div>
                </div>

                <div class="rounded-2xl md:rounded-3xl bg-cover bg-center bg-no-repeat relative overflow-hidden"
                    style="background-image: url('./assets/images/inspire-02.png');">
                    <div
                        class="absolute inset-0 rounded-2xl md:rounded-3xl bg-gradient-to-r from-[#322153]/80 to-transparent">
                    </div>
                    <div class="relative p-[34px] lg:pr-[157px] h-full flex flex-col justify-between">
                        <div>
                            <h2 class="text-white font-bold text-[32px] leading-[1.3] mb-4">Beyond the City</h2>
                            <p class="text-white mb-[60px]">Discover the wonders that lie outside the walls of Da Nang
                                with these exciting tours of surrounding areas</p>
                        </div>
                        <a href="trip-ideas.html"
                            class="block w-max text-green-zomp capitalize p-4 bg-white rounded-[200px] border border-green-zomp font-semibold transition duration-200 hover:text-white hover:bg-green-zomp">
                            See all activities
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <h2 class="text-black font-bold text-[32px] leading-[1.1em] capitalize mb-10">Popular activities</h2>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

                <article class="relative overflow-hidden transition duration-200">
                    <div class="bg-white border rounded-2xl border-light-grey">
                        <div class="relative overflow-hidden rounded-t-2xl">
                            <a href="tours-details-style-01.html">
                                <img src="./assets/images/tours/01.png" alt="Universal Studios Singapore Special Ticket"
                                    class="object-cover w-full h-auto transition duration-300 hover:scale-105">
                                <span
                                    class="absolute top-4 right-4 bg-[#F51D35] rounded py-1 px-2 text-white text-sm font-semibold">On
                                    Sale</span>
                            </a>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                                <span class="text-sm text-dark-grey">Theme park, Singapore</span>
                            </div>

                            <h4
                                class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                                <a href="tours-details-style-01.html">Universal Studios Singapore Special Ticket</a>
                            </h4>

                            <div class="flex items-center mb-2 text-orange-yellow">
                                <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                                    data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                                    class="iconify" data-icon="mdi:star"></span><span class="iconify"
                                    data-icon="mdi:star"></span><span class="ml-2 text-dark-grey">(200 reviews)</span>
                            </div>

                            <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-featured transition hover:bg-green-zomp hover:text-white">Featured</a><a
                                    href="tours.html"
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-best-seller transition hover:bg-green-zomp hover:text-white">Best
                                    seller</a></div>

                            <div class="h-px my-4 border-t border-light-grey"></div>

                            <div class="mb-1 text-sm font-bold line-through text-grey">$80.50</div>

                            <div class="flex items-center justify-between gap-2">
                                <span class="flex items-center gap-1">
                                    <span>From</span>
                                    <span class="text-base font-bold text-green-zomp">$60.50</span>
                                </span>
                                <span class="flex items-center gap-1">
                                    <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                        data-height="15"></span>
                                    <div class="text-sm text-dark-grey">3 days 2 nights</div>
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="relative overflow-hidden transition duration-200">
                    <div class="bg-white border rounded-2xl border-light-grey">
                        <div class="relative overflow-hidden rounded-t-2xl">
                            <a href="tours-details-style-01.html">
                                <img src="./assets/images/tours/02.png" alt="Borobudur Sunrise Experience with Local Guide"
                                    class="object-cover w-full h-auto transition duration-300 hover:scale-105">
                                <span
                                    class="absolute top-4 right-4 bg-[#F51D35] rounded py-1 px-2 text-white text-sm font-semibold">On
                                    Sale</span>
                            </a>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                                <span class="text-sm text-dark-grey">Cultural tour, Indonesia</span>
                            </div>

                            <h4
                                class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                                <a href="tours-details-style-01.html">Borobudur Sunrise Experience with Local Guide</a>
                            </h4>

                            <div class="flex items-center mb-2 text-orange-yellow">
                                <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                                    data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                                    class="iconify" data-icon="mdi:star"></span><span class="iconify"
                                    data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(145
                                    reviews)</span>
                            </div>

                            <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-featured transition hover:bg-green-zomp hover:text-white">Featured</a>
                            </div>

                            <div class="h-px my-4 border-t border-light-grey"></div>

                            <div class="mb-1 text-sm font-bold line-through text-grey">$59.00</div>

                            <div class="flex items-center justify-between gap-2">
                                <span class="flex items-center gap-1">
                                    <span>From</span>
                                    <span class="text-base font-bold text-green-zomp">$45.00</span>
                                </span>
                                <span class="flex items-center gap-1">
                                    <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                        data-height="15"></span>
                                    <div class="text-sm text-dark-grey">1 day</div>
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="relative overflow-hidden transition duration-200">
                    <div class="bg-white border rounded-2xl border-light-grey">
                        <div class="relative overflow-hidden rounded-t-2xl">
                            <a href="tours-details-style-01.html">
                                <img src="./assets/images/tours/03.png" alt="Phi Phi Island Speedboat Tour"
                                    class="object-cover w-full h-auto transition duration-300 hover:scale-105">

                            </a>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                                <span class="text-sm text-dark-grey">Island, Thailand</span>
                            </div>

                            <h4
                                class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                                <a href="tours-details-style-01.html">Phi Phi Island Speedboat Tour</a>
                            </h4>

                            <div class="flex items-center mb-2 text-orange-yellow">
                                <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                                    data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                                    class="iconify" data-icon="mdi:star"></span><span class="iconify"
                                    data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(320
                                    reviews)</span>
                            </div>

                            <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-featured transition hover:bg-green-zomp hover:text-white">Featured</a>
                            </div>

                            <div class="h-px my-4 border-t border-light-grey"></div>


                            <div class="flex items-center justify-between gap-2">
                                <span class="flex items-center gap-1">
                                    <span>From</span>
                                    <span class="text-base font-bold text-green-zomp">$55.00</span>
                                </span>
                                <span class="flex items-center gap-1">
                                    <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                        data-height="15"></span>
                                    <div class="text-sm text-dark-grey">1 day</div>
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="relative overflow-hidden transition duration-200">
                    <div class="bg-white border rounded-2xl border-light-grey">
                        <div class="relative overflow-hidden rounded-t-2xl">
                            <a href="tours-details-style-01.html">
                                <img src="./assets/images/tours/04.png"
                                    alt="Kuala Lumpur City &amp; Batu Caves Full Day Tour"
                                    class="object-cover w-full h-auto transition duration-300 hover:scale-105">
                                <span
                                    class="absolute top-4 right-4 bg-[#F51D35] rounded py-1 px-2 text-white text-sm font-semibold">On
                                    Sale</span>
                            </a>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                                <span class="text-sm text-dark-grey">City tour, Malaysia</span>
                            </div>

                            <h4
                                class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                                <a href="tours-details-style-01.html">Kuala Lumpur City &amp; Batu Caves Full Day
                                    Tour</a>
                            </h4>

                            <div class="flex items-center mb-2 text-orange-yellow">
                                <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                                    data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                                    class="iconify" data-icon="mdi:star"></span><span class="iconify"
                                    data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(89
                                    reviews)</span>
                            </div>

                            <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-cultural transition hover:bg-green-zomp hover:text-white">Cultural</a><a
                                    href="tours.html"
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-popular transition hover:bg-green-zomp hover:text-white">Popular</a>
                            </div>

                            <div class="h-px my-4 border-t border-light-grey"></div>

                            <div class="mb-1 text-sm font-bold line-through text-grey">$42.00</div>

                            <div class="flex items-center justify-between gap-2">
                                <span class="flex items-center gap-1">
                                    <span>From</span>
                                    <span class="text-base font-bold text-green-zomp">$35.00</span>
                                </span>
                                <span class="flex items-center gap-1">
                                    <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                        data-height="15"></span>
                                    <div class="text-sm text-dark-grey">1 day</div>
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="relative overflow-hidden transition duration-200">
                    <div class="bg-white border rounded-2xl border-light-grey">
                        <div class="relative overflow-hidden rounded-t-2xl">
                            <a href="tours-details-style-01.html">
                                <img src="./assets/images/tours/05.png" alt="El Nido Island Hopping Adventure"
                                    class="object-cover w-full h-auto transition duration-300 hover:scale-105">

                            </a>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                                <span class="text-sm text-dark-grey">Beach, Philippines</span>
                            </div>

                            <h4
                                class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                                <a href="tours-details-style-01.html">El Nido Island Hopping Adventure</a>
                            </h4>

                            <div class="flex items-center mb-2 text-orange-yellow">
                                <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                                    data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                                    class="iconify" data-icon="mdi:star"></span><span class="iconify"
                                    data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(276
                                    reviews)</span>
                            </div>

                            <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-featured transition hover:bg-green-zomp hover:text-white">Featured</a><a
                                    href="tours.html"
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-best-seller transition hover:bg-green-zomp hover:text-white">Best
                                    seller</a><a href="tours.html"
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-adventure transition hover:bg-green-zomp hover:text-white">Adventure</a>
                            </div>

                            <div class="h-px my-4 border-t border-light-grey"></div>


                            <div class="flex items-center justify-between gap-2">
                                <span class="flex items-center gap-1">
                                    <span>From</span>
                                    <span class="text-base font-bold text-green-zomp">$68.00</span>
                                </span>
                                <span class="flex items-center gap-1">
                                    <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                        data-height="15"></span>
                                    <div class="text-sm text-dark-grey">2 days 1 night</div>
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="relative overflow-hidden transition duration-200">
                    <div class="bg-white border rounded-2xl border-light-grey">
                        <div class="relative overflow-hidden rounded-t-2xl">
                            <a href="tours-details-style-01.html">
                                <img src="./assets/images/tours/06.png" alt="Sapa Trekking &amp; Homestay Experience"
                                    class="object-cover w-full h-auto transition duration-300 hover:scale-105">
                                <span
                                    class="absolute top-4 right-4 bg-[#F51D35] rounded py-1 px-2 text-white text-sm font-semibold">On
                                    Sale</span>
                            </a>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                                <span class="text-sm text-dark-grey">Mountain, Vietnam</span>
                            </div>

                            <h4
                                class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                                <a href="tours-details-style-01.html">Sapa Trekking &amp; Homestay Experience</a>
                            </h4>

                            <div class="flex items-center mb-2 text-orange-yellow">
                                <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                                    data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                                    class="iconify" data-icon="mdi:star"></span><span class="iconify"
                                    data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(152
                                    reviews)</span>
                            </div>

                            <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-adventure transition hover:bg-green-zomp hover:text-white">Adventure</a><a
                                    href="tours.html"
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-cultural transition hover:bg-green-zomp hover:text-white">Cultural</a>
                            </div>

                            <div class="h-px my-4 border-t border-light-grey"></div>

                            <div class="mb-1 text-sm font-bold line-through text-grey">$95.00</div>

                            <div class="flex items-center justify-between gap-2">
                                <span class="flex items-center gap-1">
                                    <span>From</span>
                                    <span class="text-base font-bold text-green-zomp">$85.00</span>
                                </span>
                                <span class="flex items-center gap-1">
                                    <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                        data-height="15"></span>
                                    <div class="text-sm text-dark-grey">3 days 2 nights</div>
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="relative overflow-hidden transition duration-200">
                    <div class="bg-white border rounded-2xl border-light-grey">
                        <div class="relative overflow-hidden rounded-t-2xl">
                            <a href="tours-details-style-01.html">
                                <img src="./assets/images/tours/07.png" alt="Tokyo Highlights &amp; Mt. Fuji Day Trip"
                                    class="object-cover w-full h-auto transition duration-300 hover:scale-105">

                            </a>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                                <span class="text-sm text-dark-grey">City, Japan</span>
                            </div>

                            <h4
                                class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                                <a href="tours-details-style-01.html">Tokyo Highlights &amp; Mt. Fuji Day Trip</a>
                            </h4>

                            <div class="flex items-center mb-2 text-orange-yellow">
                                <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                                    data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                                    class="iconify" data-icon="mdi:star"></span><span class="iconify"
                                    data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(412
                                    reviews)</span>
                            </div>

                            <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-featured transition hover:bg-green-zomp hover:text-white">Featured</a><a
                                    href="tours.html"
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-popular transition hover:bg-green-zomp hover:text-white">Popular</a>
                            </div>

                            <div class="h-px my-4 border-t border-light-grey"></div>


                            <div class="flex items-center justify-between gap-2">
                                <span class="flex items-center gap-1">
                                    <span>From</span>
                                    <span class="text-base font-bold text-green-zomp">$120.00</span>
                                </span>
                                <span class="flex items-center gap-1">
                                    <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                        data-height="15"></span>
                                    <div class="text-sm text-dark-grey">1 day</div>
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="relative overflow-hidden transition duration-200">
                    <div class="bg-white border rounded-2xl border-light-grey">
                        <div class="relative overflow-hidden rounded-t-2xl">
                            <a href="tours-details-style-01.html">
                                <img src="./assets/images/tours/08.png" alt="Maldives Resort &amp; Snorkeling Package"
                                    class="object-cover w-full h-auto transition duration-300 hover:scale-105">
                                <span
                                    class="absolute top-4 right-4 bg-[#F51D35] rounded py-1 px-2 text-white text-sm font-semibold">On
                                    Sale</span>
                            </a>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="iconify" data-icon="ep:location" data-width="14" data-height="14"></span>
                                <span class="text-sm text-dark-grey">Beach, Maldives</span>
                            </div>

                            <h4
                                class="mb-2 text-base font-bold text-black transition duration-200 line-clamp-2 hover:text-green-zomp">
                                <a href="tours-details-style-01.html">Maldives Resort &amp; Snorkeling Package</a>
                            </h4>

                            <div class="flex items-center mb-2 text-orange-yellow">
                                <span class="iconify" data-icon="mdi:star"></span><span class="iconify"
                                    data-icon="mdi:star"></span><span class="iconify" data-icon="mdi:star"></span><span
                                    class="iconify" data-icon="mdi:star"></span><span class="iconify"
                                    data-icon="mdi:star-half-full"></span><span class="ml-2 text-dark-grey">(95
                                    reviews)</span>
                            </div>

                            <div class="flex flex-wrap items-center gap-2"><a href="tours.html"
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-luxury transition hover:bg-green-zomp hover:text-white">Luxury</a><a
                                    href="tours.html"
                                    class="inline-block px-2 py-1 text-sm font-semibold rounded text-darker-grey bg-white-grey category-tag category-best-seller transition hover:bg-green-zomp hover:text-white">Best
                                    seller</a></div>

                            <div class="h-px my-4 border-t border-light-grey"></div>

                            <div class="mb-1 text-sm font-bold line-through text-grey">$420.00</div>

                            <div class="flex items-center justify-between gap-2">
                                <span class="flex items-center gap-1">
                                    <span>From</span>
                                    <span class="text-base font-bold text-green-zomp">$350.00</span>
                                </span>
                                <span class="flex items-center gap-1">
                                    <span class="iconify text-dark-grey" data-icon="fluent:clock-24-regular" data-width="15"
                                        data-height="15"></span>
                                    <div class="text-sm text-dark-grey">5 days 4 nights</div>
                                </span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <div class="bg-cover bg-center rounded-2xl px-6 py-12 lg:pl-[108px] lg:pr-10 lg:pt-[120px] lg:pb-[90px] text-white"
                style="background-image: url('./assets/images/subscribe-bg.png')">
                <div class="p-6 md:p-10 bg-darker-grey bg-opacity-90 rounded-2xl w-full lg:w-fit">
                    <h2 class="text-2xl md:text-[40px] font-bold mb-4">Subscribe & Get 20% off</h2>
                    <p class="text-white-grey mb-8 max-w-full md:max-w-[540px] text-sm md:text-base">
                        Join our newsletter and discover new destinations to inspire the traveler within. Plus, get 20%
                        off at our
                        online shop. Every week you’ll receive expert advice, tips, exclusive offers, and much more.
                    </p>
                    <form class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                        <input type="email" placeholder="Your email address"
                            class="flex-1 text-dark-grey font-normal py-3 px-6 rounded-full focus:outline-none" />
                        <button type="submit"
                            class="bg-green-zomp py-3 px-6 text-white font-semibold rounded-full whitespace-nowrap transition duration-200 hover:-translate-y-[5px] hover:bg-[#50d8c8]">Sign
                            Up</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <section class="mb-[60px] md:mb-24">
        <div class="swiper gallerySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="./assets/images/list-gallery/01.png" alt="Gallery 1" class="object-cover w-full h-auto" />
                </div>
                <div class="swiper-slide">
                    <img src="./assets/images/list-gallery/02.png" alt="Gallery 2" class="object-cover w-full h-auto" />
                </div>
                <div class="swiper-slide">
                    <img src="./assets/images/list-gallery/03.png" alt="Gallery 3" class="object-cover w-full h-auto" />
                </div>
                <div class="swiper-slide">
                    <img src="./assets/images/list-gallery/04.png" alt="Gallery 4" class="object-cover w-full h-auto" />
                </div>
                <div class="swiper-slide">
                    <img src="./assets/images/list-gallery/05.png" alt="Gallery 5" class="object-cover w-full h-auto" />
                </div>
                <div class="swiper-slide">
                    <img src="./assets/images/list-gallery/06.png" alt="Gallery 6" class="object-cover w-full h-auto" />
                </div>
                <div class="swiper-slide">
                    <img src="./assets/images/list-gallery/07.png" alt="Gallery 7" class="object-cover w-full h-auto" />
                </div>
                <div class="swiper-slide">
                    <img src="./assets/images/list-gallery/08.png" alt="Gallery 8" class="object-cover w-full h-auto" />
                </div>
                <div class="swiper-slide">
                    <img src="./assets/images/list-gallery/09.png" alt="Gallery 9" class="object-cover w-full h-auto" />
                </div>
            </div>
        </div>
    </section>

    <section class="mb-[60px] md:mb-24">
        <div class="container">
            <div class="flex items-center justify-between mb-10">
                <h2 class="text-black font-bold text-[32px] leading-[1.1em] capitalize">Inspiration, guides, stories
                </h2>
                <div class="hidden sm:flex items-center gap-4">
                    <div class="swiper-button-prev blog-index-prev !relative !w-12 !h-12 !text-dark-grey !mt-0 !left-0 !right-0 rounded-full p-2 bg-white-grey transition duration-200 hover:!text-white hover:bg-green-zomp"
                        style="--swiper-navigation-size: 20px"></div>
                    <div class="swiper-button-next blog-index-next !relative !w-12 !h-12 !text-dark-grey !mt-0 !left-0 !right-0 rounded-full p-2 bg-white-grey transition duration-200 hover:!text-white hover:bg-green-zomp"
                        style="--swiper-navigation-size: 20px"></div>
                </div>
            </div>
            <div class="relative">
                <div class="swiper blog-index-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">

                            <article class="bg-white overflow-hidden rounded-2xl shadow-sm">
                                <div class="overflow-hidden rounded-t-2xl">
                                    <img src="./assets/images/blogs/01.png"
                                        alt="10 Hidden Gems in Southeast Asia You Must Visit"
                                        class="w-full h-auto rounded-t-2xl object-cover hover:scale-105 transition duration-200">
                                </div>
                                <div class="border border-light-grey border-t-0 rounded-b-2xl p-4 pb-9">
                                    <div class="mb-2">
                                        <a href="blogs-category.html" class="block"><span
                                                class="inline-block text-dark-grey font-semibold text-sm bg-light-grey py-1 px-2 rounded-md mr-1 last:mr-0 transition duration-200 hover:text-white hover:bg-green-zomp">Travel</span><span
                                                class="inline-block text-dark-grey font-semibold text-sm bg-light-grey py-1 px-2 rounded-md mr-1 last:mr-0 transition duration-200 hover:text-white hover:bg-green-zomp">Adventure</span></a>
                                    </div>
                                    <h4
                                        class="text-black line-clamp-2 font-bold mb-2 transition duration-200 hover:text-green-zomp">
                                        <a href="blogs-details.html" class="block">10 Hidden Gems in Southeast Asia
                                            You
                                            Must Visit</a>
                                    </h4>
                                    <span class="block text-dark-grey text-sm mb-2">July 5, 2024</span>
                                    <p class="text-dark-grey text-sm line-clamp-2">Discover the most breathtaking
                                        hidden
                                        destinations across Southeast Asia, from secluded beaches in Philippines to
                                        mystical temples in Cambodia. Perfect for adventurous travelers seeking unique
                                        experiences.</p>
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">

                            <article class="bg-white overflow-hidden rounded-2xl shadow-sm">
                                <div class="overflow-hidden rounded-t-2xl">
                                    <img src="./assets/images/blogs/02.png"
                                        alt="Street Food Guide: Authentic Flavors of Vietnam"
                                        class="w-full h-auto rounded-t-2xl object-cover hover:scale-105 transition duration-200">
                                </div>
                                <div class="border border-light-grey border-t-0 rounded-b-2xl p-4 pb-9">
                                    <div class="mb-2">
                                        <a href="blogs-category.html" class="block"><span
                                                class="inline-block text-dark-grey font-semibold text-sm bg-light-grey py-1 px-2 rounded-md mr-1 last:mr-0 transition duration-200 hover:text-white hover:bg-green-zomp">Food</span><span
                                                class="inline-block text-dark-grey font-semibold text-sm bg-light-grey py-1 px-2 rounded-md mr-1 last:mr-0 transition duration-200 hover:text-white hover:bg-green-zomp">Culture</span></a>
                                    </div>
                                    <h4
                                        class="text-black line-clamp-2 font-bold mb-2 transition duration-200 hover:text-green-zomp">
                                        <a href="blogs-details.html" class="block">Street Food Guide: Authentic
                                            Flavors
                                            of Vietnam</a>
                                    </h4>
                                    <span class="block text-dark-grey text-sm mb-2">July 3, 2024</span>
                                    <p class="text-dark-grey text-sm line-clamp-2">Explore the vibrant street food
                                        culture of Vietnam, from pho and banh mi to lesser-known local delicacies. A
                                        comprehensive guide for food lovers and cultural enthusiasts.</p>
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">

                            <article class="bg-white overflow-hidden rounded-2xl shadow-sm">
                                <div class="overflow-hidden rounded-t-2xl">
                                    <img src="./assets/images/blogs/03.png" alt="How to Travel Asia on $30 a Day"
                                        class="w-full h-auto rounded-t-2xl object-cover hover:scale-105 transition duration-200">
                                </div>
                                <div class="border border-light-grey border-t-0 rounded-b-2xl p-4 pb-9">
                                    <div class="mb-2">
                                        <a href="blogs-category.html" class="block"><span
                                                class="inline-block text-dark-grey font-semibold text-sm bg-light-grey py-1 px-2 rounded-md mr-1 last:mr-0 transition duration-200 hover:text-white hover:bg-green-zomp">Budget
                                                Travel</span><span
                                                class="inline-block text-dark-grey font-semibold text-sm bg-light-grey py-1 px-2 rounded-md mr-1 last:mr-0 transition duration-200 hover:text-white hover:bg-green-zomp">Tips</span></a>
                                    </div>
                                    <h4
                                        class="text-black line-clamp-2 font-bold mb-2 transition duration-200 hover:text-green-zomp">
                                        <a href="blogs-details.html" class="block">How to Travel Asia on $30 a
                                            Day</a>
                                    </h4>
                                    <span class="block text-dark-grey text-sm mb-2">July 1, 2024</span>
                                    <p class="text-dark-grey text-sm line-clamp-2">Practical tips and strategies for
                                        budget-conscious travelers. Learn how to maximize your travel experience in Asia
                                        without breaking the bank, including accommodation, transportation, and dining
                                        hacks.</p>
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">

                            <article class="bg-white overflow-hidden rounded-2xl shadow-sm">
                                <div class="overflow-hidden rounded-t-2xl">
                                    <img src="./assets/images/blogs/04.png"
                                        alt="Capturing the Perfect Sunset: Best Spots in Bali"
                                        class="w-full h-auto rounded-t-2xl object-cover hover:scale-105 transition duration-200">
                                </div>
                                <div class="border border-light-grey border-t-0 rounded-b-2xl p-4 pb-9">
                                    <div class="mb-2">
                                        <a href="blogs-category.html" class="block"><span
                                                class="inline-block text-dark-grey font-semibold text-sm bg-light-grey py-1 px-2 rounded-md mr-1 last:mr-0 transition duration-200 hover:text-white hover:bg-green-zomp">Nature</span><span
                                                class="inline-block text-dark-grey font-semibold text-sm bg-light-grey py-1 px-2 rounded-md mr-1 last:mr-0 transition duration-200 hover:text-white hover:bg-green-zomp">Photography</span></a>
                                    </div>
                                    <h4
                                        class="text-black line-clamp-2 font-bold mb-2 transition duration-200 hover:text-green-zomp">
                                        <a href="blogs-details.html" class="block">Capturing the Perfect Sunset: Best
                                            Spots in Bali</a>
                                    </h4>
                                    <span class="block text-dark-grey text-sm mb-2">June 28, 2024</span>
                                    <p class="text-dark-grey text-sm line-clamp-2">A photographer&#039;s guide to the
                                        most stunning sunset locations in Bali. Includes timing, camera settings, and
                                        insider tips for capturing Instagram-worthy shots.</p>
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">

                            <article class="bg-white overflow-hidden rounded-2xl shadow-sm">
                                <div class="overflow-hidden rounded-t-2xl">
                                    <img src="./assets/images/blogs/05.png"
                                        alt="Solo Female Travel in Thailand: Safety Tips &amp; Experiences"
                                        class="w-full h-auto rounded-t-2xl object-cover hover:scale-105 transition duration-200">
                                </div>
                                <div class="border border-light-grey border-t-0 rounded-b-2xl p-4 pb-9">
                                    <div class="mb-2">
                                        <a href="blogs-category.html" class="block"><span
                                                class="inline-block text-dark-grey font-semibold text-sm bg-light-grey py-1 px-2 rounded-md mr-1 last:mr-0 transition duration-200 hover:text-white hover:bg-green-zomp">Solo
                                                Travel</span><span
                                                class="inline-block text-dark-grey font-semibold text-sm bg-light-grey py-1 px-2 rounded-md mr-1 last:mr-0 transition duration-200 hover:text-white hover:bg-green-zomp">Safety</span></a>
                                    </div>
                                    <h4
                                        class="text-black line-clamp-2 font-bold mb-2 transition duration-200 hover:text-green-zomp">
                                        <a href="blogs-details.html" class="block">Solo Female Travel in Thailand:
                                            Safety Tips &amp; Experiences</a>
                                    </h4>
                                    <span class="block text-dark-grey text-sm mb-2">June 25, 2024</span>
                                    <p class="text-dark-grey text-sm line-clamp-2">Essential safety tips and personal
                                        experiences for women traveling alone in Thailand. Covering accommodation,
                                        transportation, cultural considerations, and must-visit destinations.</p>
                                </div>
                            </article>
                        </div>
                        <div class="swiper-slide">

                            <article class="bg-white overflow-hidden rounded-2xl shadow-sm">
                                <div class="overflow-hidden rounded-t-2xl">
                                    <img src="./assets/images/blogs/06.png"
                                        alt="Ancient Temples of Angkor: A Complete Guide"
                                        class="w-full h-auto rounded-t-2xl object-cover hover:scale-105 transition duration-200">
                                </div>
                                <div class="border border-light-grey border-t-0 rounded-b-2xl p-4 pb-9">
                                    <div class="mb-2">
                                        <a href="blogs-category.html" class="block"><span
                                                class="inline-block text-dark-grey font-semibold text-sm bg-light-grey py-1 px-2 rounded-md mr-1 last:mr-0 transition duration-200 hover:text-white hover:bg-green-zomp">Culture</span><span
                                                class="inline-block text-dark-grey font-semibold text-sm bg-light-grey py-1 px-2 rounded-md mr-1 last:mr-0 transition duration-200 hover:text-white hover:bg-green-zomp">History</span></a>
                                    </div>
                                    <h4
                                        class="text-black line-clamp-2 font-bold mb-2 transition duration-200 hover:text-green-zomp">
                                        <a href="blogs-details.html" class="block">Ancient Temples of Angkor: A
                                            Complete
                                            Guide</a>
                                    </h4>
                                    <span class="block text-dark-grey text-sm mb-2">June 22, 2024</span>
                                    <p class="text-dark-grey text-sm line-clamp-2">Explore the magnificent temple
                                        complex of Angkor Wat and surrounding sites. Historical insights, best visiting
                                        times, and photography tips for this UNESCO World Heritage site.</p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination blog-index-pagination !-bottom-11 sm:hidden"></div>
            </div>

            <div class="flex justify-center mt-14 sm:mt-10">
                <a href="blogs.html"
                    class="text-green-zomp py-4 px-6 rounded-[200px] border border-green-zomp font-semibold transition duration-200 hover:text-white hover:bg-green-zomp capitalize">See
                    all stories</a>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Hero Swiper Initialization
            new Swiper(".hero-swiper", {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".hero-swiper-next",
                    prevEl: ".hero-swiper-prev",
                },
                pagination: {
                    el: ".hero-swiper-pagination",
                    clickable: true,
                },
            });
        });
    </script>
@endpush