<header class="w-full bg-white">
    <div class="container flex items-center justify-between py-4 mx-auto">
        <div class="menu-toggle cursor-pointer block lg:hidden">
            <span class="iconify" data-icon="fe:bar" data-width="24" data-height="24"></span>
        </div>
        <div class="header-logo flex items-center gap-2">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/frontend/assets/images/logo_mm.png') }}" alt="Logo" class="w-auto h-12">
            </a>
        </div>
        <nav class="header-menu mx-3 lg:mx-9 relative w-full">
            <div class="close-menu-toggle lg:hidden absolute top-2.5 right-2.5">
                <span class="iconify" data-icon="ic:sharp-clear" data-width="22" data-height="22"></span>
            </div>
            @php
                $navCruiseExperiences = \App\Models\CruiseExperience::active()
                    ->orderBy('sort_order')
                    ->get();
            @endphp
            <ul
                class="flex flex-wrap lg:flex-nowrap items-center justify-end gap-4 lg:gap-8 xl:gap-10 text-sm sm:text-base font-semibold text-black">
                <li class="nav-father">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center gap-1 py-2 transition-all duration-200 hover:text-green-zomp">
                        Home
                    </a>
                </li>
                <li class="relative group nav-father">
                    <button
                        class="inline-flex items-center gap-1 py-2 cursor-pointer transition-all duration-200 hover:text-green-zomp focus:outline-none">
                        <a href="{{ route('nile-cruises.index') }}" class="hover:text-green-zomp">Nile Cruises</a>
                        <i class="fa-solid fa-chevron-down text-xs text-dark-grey"></i>
                    </button>
                    @if($navCruiseExperiences->count())
                        <div
                            class="nav-wrapper lg:absolute lg:w-80 lg:left-0 lg:top-8 bg-white lg:shadow-custom lg:rounded-custom lg:opacity-0 lg:invisible lg:transition-all lg:group-hover:opacity-100 lg:group-hover:visible z-[999] border border-light-grey lg:border-none mt-2 lg:mt-0">
                            <ul class="nav-menu nav-dropdown divide-y divide-light-grey">
                                @foreach($navCruiseExperiences as $cruise)
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
                {{-- Static Dahbia programs dropdown --}}
                <li class="relative group nav-father">
                    <button
                        class="inline-flex items-center gap-1 py-2 cursor-pointer transition-all duration-200 hover:text-green-zomp focus:outline-none">
                        <span>Dahbia Nile Cruises</span>
                        <i class="fa-solid fa-chevron-down text-xs text-dark-grey"></i>
                    </button>
                    <div
                        class="nav-wrapper lg:absolute lg:w-80 lg:left-0 lg:top-8 bg-white lg:shadow-custom lg:rounded-custom lg:opacity-0 lg:invisible lg:transition-all lg:group-hover:opacity-100 lg:group-hover:visible z-[999] border border-light-grey lg:border-none mt-2 lg:mt-0">
                        <ul class="nav-menu nav-dropdown divide-y divide-light-grey">
                            <li class="nav-items">
                                <a href="#"
                                    class="block px-5 py-3 bg-white hover:bg-light-grey hover:text-green-zomp transition-all duration-200">
                                    Jade Dahabia
                                </a>
                            </li>
                            <li class="nav-items">
                                <a href="#"
                                    class="block px-5 py-3 bg-white hover:bg-light-grey hover:text-green-zomp transition-all duration-200">
                                    Amber Dahabia
                                </a>
                            </li>
                            <li class="nav-items">
                                <a href="#"
                                    class="block px-5 py-3 bg-white hover:bg-light-grey hover:text-green-zomp transition-all duration-200">
                                    Dhabia Wellness
                                </a>
                            </li>
                            <li class="nav-items">
                                <a href="#"
                                    class="block px-5 py-3 bg-white hover:bg-light-grey hover:text-green-zomp transition-all duration-200">
                                    Dahbia Private
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#"
                        class="inline-flex items-center gap-1 py-2 transition-all duration-200 hover:text-green-zomp">
                        Tour Egypt Packages
                    </a>
                </li>
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