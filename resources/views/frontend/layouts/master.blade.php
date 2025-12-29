<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

@include('frontend.layouts.head')

<body class="antialiased font-urbanist">

    @if($sharedAnnouncements->count() > 0)
        <div style="background-color: #f9e600; color: #8b7138;" id="announcement-bar"
            class="bg-[#f9e600] text-white py-2 relative overflow-hidden border-b-2 border-dark-grey">
            <div class="announcement-scroll whitespace-nowrap">
                @foreach($sharedAnnouncements as $announcement)
                    <span class="inline-block mx-8 font-bold text-base md:text-lg">{{ $announcement->content }}</span>
                @endforeach
            </div>
        </div>
    @endif

    @include('frontend.layouts.navbar')

    @yield('content')

    @include('frontend.layouts.footer')

    {{-- Floating Action Buttons --}}
    {{-- Scroll to Top Button --}}
    <button id="scrollToTop" class="floating-scroll-top-btn" aria-label="Scroll to top">
        <span class="iconify scroll-top-icon" data-icon="ph:arrow-up" data-width="24" data-height="24"></span>
    </button>

    {{-- WhatsApp Button --}}
    @php
        // Extract first phone number from the string (before / if exists)
        $phoneForWhatsApp = explode('/', $sitePhone)[0];
        $whatsappNumber = preg_replace('/[^0-9]/', '', trim($phoneForWhatsApp));
        // Remove leading zeros but keep country code
        if (strlen($whatsappNumber) > 10) {
            $whatsappNumber = ltrim($whatsappNumber, '0');
        }
    @endphp
    <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" rel="noopener noreferrer"
        class="floating-whatsapp-btn">
        <span class="iconify whatsapp-icon" data-icon="logos:whatsapp-icon" data-width="28" data-height="28"></span>
        <span class="notification-dot"></span>
    </a>

    @include('frontend.layouts.scripts')

    <script>
        // Scroll to Top functionality
        document.addEventListener('DOMContentLoaded', function () {
            const scrollToTopBtn = document.getElementById('scrollToTop');

            // Show/hide button based on scroll position
            window.addEventListener('scroll', function () {
                if (window.pageYOffset > 300) {
                    scrollToTopBtn.classList.add('show');
                } else {
                    scrollToTopBtn.classList.remove('show');
                }
            });

            // Scroll to top when button is clicked
            scrollToTopBtn.addEventListener('click', function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>

</body>

</html>