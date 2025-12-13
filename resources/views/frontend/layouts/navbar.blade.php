<header class="w-full bg-white">
    <div class="container flex items-center justify-between py-4 mx-auto">
        <div class="menu-toggle cursor-pointer block lg:hidden">
            <span class="iconify" data-icon="fe:bar" data-width="24" data-height="24"></span>
        </div>
        <div class="header-logo flex items-center gap-2">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/frontend/assets/images/logo.png') }}" alt="Logo" class="w-auto h-10">
            </a>
        </div>
        <nav class="header-menu mx-3 lg:mx-9 relative w-full">
            <div class="close-menu-toggle lg:hidden absolute top-2.5 right-2.5">
                <span class="iconify" data-icon="ic:sharp-clear" data-width="22" data-height="22"></span>
            </div>
            <ul
                class="flex flex-wrap lg:flex-nowrap items-center justify-end gap-4 lg:gap-8 xl:gap-10 text-sm sm:text-base font-semibold text-black">
                <li class="nav-father">
                    <a href="#"
                        class="inline-flex items-center gap-1 py-2 transition-all duration-200 hover:text-green-zomp">
                        Home
                    </a>
                </li>
                <li class="nav-father">
                    <a href="#"
                        class="inline-flex items-center gap-1 py-2 transition-all duration-200 hover:text-green-zomp">
                        Nile Cruises
                    </a>
                </li>
                <li class="nav-father">
                    <a href="#"
                        class="inline-flex items-center gap-1 py-2 transition-all duration-200 hover:text-green-zomp">
                        Dahbia Wellness
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="inline-flex items-center gap-1 py-2 transition-all duration-200 hover:text-green-zomp">
                        Dahbia Private
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="inline-flex items-center gap-1 py-2 transition-all duration-200 hover:text-green-zomp">
                        Egypt Tours
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="inline-flex items-center gap-1 py-2 transition-all duration-200 hover:text-green-zomp">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="inline-flex items-center gap-1 py-2 transition-all duration-200 hover:text-green-zomp">
                        About Us
                    </a>
                </li>
                {{-- <li class="relative group nav-father">
                    <div
                        class="inline-flex items-center gap-1 py-2 cursor-pointer transition-all duration-200 hover:text-green-zomp">
                        <a href="#" class="hover:text-green-zomp">Page</a>
                        <span class="iconify text-dark-grey" data-icon="meteor-icons:angle-down" data-width="18"
                            data-height="18"></span>
                    </div>
                    <div
                        class="nav-wrapper lg:absolute lg:p-5 lg:w-60 lg:left-0 lg:top-8 bg-white lg:shadow-custom lg:rounded-custom lg:opacity-0 lg:invisible lg:transition-all lg:group-hover:opacity-100 lg:group-hover:visible z-[999]">
                        <ul class="nav-menu space-y-2.5">
                            <li class="nav-items cursor-pointer hover:text-green-zomp transition-all duration-200">
                                <a href="blogs.html">Blogs</a>
                            </li>
                            <li class="nav-items cursor-pointer hover:text-green-zomp transition-all duration-200">
                                <a href="shop.html">Shop</a>
                            </li>
                            <li class="nav-items cursor-pointer hover:text-green-zomp transition-all duration-200">
                                <a href="about-us.html">About us</a>
                            </li>
                            <li class="nav-items cursor-pointer hover:text-green-zomp transition-all duration-200">
                                <a href="contact-us.html">Contact Us</a>
                            </li>
                            <li class="nav-items cursor-pointer hover:text-green-zomp transition-all duration-200">
                                <a href="faqs.html">FAQs</a>
                            </li>
                            <li class="nav-items cursor-pointer hover:text-green-zomp transition-all duration-200">
                                <a href="gallery.html">Gallery</a>
                            </li>
                            <li class="nav-items cursor-pointer hover:text-green-zomp transition-all duration-200">
                                <a href="travel-tips.html">Travel Tips</a>
                            </li>
                            <li class="nav-items cursor-pointer hover:text-green-zomp transition-all duration-200">
                                <a href="my-account.html">My Account</a>
                            </li>
                            <li class="nav-items cursor-pointer hover:text-green-zomp transition-all duration-200">
                                <a href="cart.html">Cart</a>
                            </li>
                            <li class="nav-items cursor-pointer hover:text-green-zomp transition-all duration-200">
                                <a href="checkout.html">Checkout</a>
                            </li>
                            <li class="nav-items cursor-pointer hover:text-green-zomp transition-all duration-200">
                                <a href="terms-and-conditions.html">Terms and Conditions</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </nav>
    </div>
</header>
