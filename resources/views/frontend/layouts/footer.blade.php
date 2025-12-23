<footer class="bg-darker-grey text-white">
    <div class="container">
        <div class="flex flex-wrap md:flex-nowrap justify-between gap-5 md:gap-6 py-6 md:py-12">
            <div class="w-full md:w-[35%] mb-10 md:mb-0">
                <img src="{{ asset('assets/frontend/assets/images/logo_mm.png') }}" alt="Logo"
                    class="h-[50px] w-auto mb-7" />
                <p class="text-white-grey font-medium mb-10">Don't just get there, get there in style.</p>
                <ul class="space-y-2 text-grey">
                    <li class="flex items-start gap-2">
                        <span class="iconify" data-icon="ep:location" data-width="20" data-height="20"></span>
                        <p>1901 Thornridge Cir. Shiloh, Hawaii 81063</p>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="iconify" data-icon="ph:phone-call" data-width="20" data-height="20"></span>
                        <p>(308) 555-0121</p>
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="iconify" data-icon="carbon:email" data-width="20" data-height="20"></span>
                        <p>hello@travelwp.com</p>
                    </li>
                </ul>
            </div>

            <div class="w-1/2 md:w-1/5 min-w-[150px] mb-10 md:mb-0">
                <h6 class="text-white font-bold mb-6">Quick Links</h6>
                <ul class="space-y-4 text-grey">
                    @php
                        // Get categories in specific order
                        $footerCategories = \App\Models\Category::whereIn('slug', ['nile-cruises', 'dahbia-tours', 'tour-egypt-packages'])
                            ->where('status', 'active')
                            ->orderByRaw("FIELD(slug, 'nile-cruises', 'dahbia-tours', 'tour-egypt-packages')")
                            ->get();

                        // Get cruise experiences
                        $footerCruises = \App\Models\CruiseExperience::active()
                            ->orderBy('sort_order')
                            ->get();
                    @endphp

                    {{-- Display Category: Nile Cruises --}}
                    @foreach($footerCategories as $category)
                        @if($category->slug === 'nile-cruises')
                            <li>
                                <a href="{{ route('tours.category', $category->slug) }}"
                                    class="hover:text-green-zomp transition duration-200">{{ $category->name }}</a>
                            </li>
                        @endif
                    @endforeach

                    {{-- Display Cruise Experiences (Dahbia Cruises) --}}
                    @foreach($footerCruises as $cruise)
                        <li>
                            <a href="{{ route('nile-cruises.show', $cruise->slug) }}"
                                class="hover:text-green-zomp transition duration-200">{{ $cruise->title }}</a>
                        </li>
                    @endforeach

                    {{-- Display Other Categories --}}
                    @foreach($footerCategories as $category)
                        @if($category->slug !== 'nile-cruises')
                            <li>
                                <a href="{{ route('tours.category', $category->slug) }}"
                                    class="hover:text-green-zomp transition duration-200">{{ $category->name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="w-1/2 md:w-1/5 min-w-[150px] mb-10 md:mb-0">
                <h6 class="text-white font-bold mb-6">Information</h6>
                <ul class="space-y-4 text-grey">
                    <li><a href="{{ route('blogs.index') }}"
                            class="hover:text-green-zomp transition duration-200">Blog</a></li>
                    <li><a href="{{ route('about-us') }}" class="hover:text-green-zomp transition duration-200">About
                            Us</a></li>
                    <li><a href="{{ route('contact-us') }}"
                            class="hover:text-green-zomp transition duration-200">Contact Us</a></li>
                    @php
                        $termsPage = \App\Models\Page::where('slug', 'terms-and-conditions')->where('status', 'active')->first();
                        $privacyPage = \App\Models\Page::where('slug', 'privacy-policy')->where('status', 'active')->first();
                    @endphp
                    @if($privacyPage)
                        <li><a href="{{ route('privacy-policy') }}"
                                class="hover:text-green-zomp transition duration-200">Privacy Policy</a></li>
                    @endif
                    @if($termsPage)
                        <li><a href="{{ route('terms-and-conditions') }}"
                                class="hover:text-green-zomp transition duration-200">Terms & Conditions</a></li>
                    @endif
                </ul>
            </div>

            <div class="w-full md:w-fit md:ml-auto">
                <h6 class="text-white font-bold mb-6">Follow Us</h6>
                <ul class="space-x-4 sm:space-x-2 lg:space-x-4 flex items-center mb-8">
                    <li class="w-10 h-10 rounded-full flex items-center justify-center p-2.5 bg-[#1877F2]">
                        <span class="iconify text-white" data-icon="bxl:facebook" data-width="22"
                            data-height="22"></span>
                    </li>
                    <li class="w-10 h-10 rounded-full flex items-center justify-center p-2.5 bg-[#CF3881]">
                        <span class="iconify text-white" data-icon="mdi:instagram" data-width="22"
                            data-height="22"></span>
                    </li>
                    <li class="w-10 h-10 rounded-full flex items-center justify-center p-2.5 bg-[#FF0000]">
                        <span class="iconify text-white" data-icon="ri:youtube-line" data-width="22"
                            data-height="22"></span>
                    </li>

                </ul>

                <h6 class="text-white font-bold mb-6">Follow Us</h6>
            </div>
        </div>

        <div class="h-px w-full bg-stroke"></div>
        <div class="py-[22px] text-center text-grey">
            <p>Copyright © {{ date('Y') }} Egypt Tours. All Rights Reserved.</p>
        </div>
    </div>
</footer>