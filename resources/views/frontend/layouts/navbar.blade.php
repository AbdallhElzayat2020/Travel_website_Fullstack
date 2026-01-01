<header class="w-full bg-white">
    <div class="container flex items-center justify-between py-4 mx-auto">
        <div class="menu-toggle cursor-pointer block lg:hidden">
            <span class="iconify" data-icon="fe:bar" data-width="24" data-height="24"></span>
        </div>
        <div class="header-logo flex items-center gap-2">
            <a href="{{ route('home') }}">
                @if ($navbarLogo)
                    <img src="{{ asset('uploads/settings/' . $navbarLogo) }}" alt="Logo" class="w-auto h-[60px]">
                @else
                    <img src="{{ asset('assets/frontend/assets/images/logo_master.webp') }}" alt="Logo"
                        class="w-auto h-[60px]">
                @endif
            </a>
        </div>
        <nav class="header-menu mx-3 lg:mx-9 relative w-full">
            <div class="close-menu-toggle lg:hidden absolute top-2.5 right-2.5">
                <span class="iconify" data-icon="ic:sharp-clear" data-width="22" data-height="22"></span>
            </div>
            @php
                $activeCategories = $sharedCategories;
                $dahbiaCruiseExperiences = $sharedCruiseExperiences;
            @endphp
            <ul
                class="flex flex-wrap lg:flex-nowrap items-center justify-end gap-4 lg:gap-8 xl:gap-10 text-sm sm:text-base font-semibold text-black">
                <li class="nav-father">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-1 py-2 transition-all duration-200 hover:text-green-zomp">
                        Home
                    </a>
                </li>

                {{-- Dahbia Cruises dropdown with cruise experiences (from settings) --}}
                <li class="relative group nav-father">
                    <div class="inline-flex items-center gap-1 py-2 transition-all duration-200 hover:text-green-zomp">
                        <a href="{{ route('nile-cruises.index') }}"
                            class="hover:text-green-zomp">{{ $dahbiaCruisesName }}</a>
                        @if ($dahbiaCruiseExperiences->count())
                            <i class="fa-solid fa-chevron-down text-xs text-dark-grey"></i>
                        @endif
                    </div>
                    @if ($dahbiaCruiseExperiences->count())
                        <div
                            class="nav-wrapper lg:absolute lg:w-80 lg:left-0 lg:top-8 bg-white lg:shadow-custom lg:rounded-custom lg:opacity-0 lg:invisible lg:transition-all lg:group-hover:opacity-100 lg:group-hover:visible z-[999] border border-light-grey lg:border-none mt-2 lg:mt-0">
                            <ul class="nav-menu nav-dropdown divide-y divide-light-grey">
                                @foreach ($dahbiaCruiseExperiences as $cruise)
                                    <li class="nav-items">
                                        <a href="{{ route('nile-cruises.show', $cruise->slug) }}"
                                            class="block px-5 py-3 bg-white hover:bg-light-grey hover:text-green-zomp transition-all duration-200">
                                            {{ $cruise->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </li>
                {{-- Dahbia Cruises dropdown with cruise experiences (from settings) --}}

                {{-- Display all active categories dynamically --}}
                @foreach ($activeCategories as $category)
                    <li>
                        <a href="{{ route('tours.category', $category->slug) }}"
                            class="inline-flex items-center gap-1 py-2 transition-all duration-200 hover:text-green-zomp">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach



                <li>
                    <a href="{{ route('blogs.index') }}"
                        class="inline-flex items-center gap-1 py-2 transition-all duration-200 hover:text-green-zomp">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="{{ route('about-us') }}"
                        class="inline-flex items-center gap-1 py-2 transition-all duration-200 hover:text-green-zomp">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact-us') }}"
                        class="inline-flex items-center gap-1 py-2 transition-all duration-200 hover:text-green-zomp">
                        Contact Us
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</header>


{{--
1- Dahbia Tours
رحلات عادية

Tour Egypt Packages
زي اكنها تورز عادية ممكن نخليها اسم كاتوجري ونعرض التورز الي تابعين للكاتوجري دي

Nile Cruises
هتبقي رحلات عادية برضو

Nile Cruises
هتبقي رحلات عادية برضو

--}}
