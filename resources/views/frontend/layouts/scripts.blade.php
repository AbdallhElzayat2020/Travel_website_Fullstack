<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.8.1/nouislider.min.js"></script>
<script src="{{ asset('assets/frontend/assets/js/main.min.js') }}"></script>

<script>
    // Announcement scrolling effect
    document.addEventListener('DOMContentLoaded', function () {
        const announcementBar = document.getElementById('announcement-bar');
        if (announcementBar) {
            const scrollContent = announcementBar.querySelector('.announcement-scroll');
            if (scrollContent) {
                // Duplicate content multiple times for seamless loop
                const originalContent = scrollContent.innerHTML;
                // Duplicate 3 times to ensure smooth continuous scrolling
                scrollContent.innerHTML = originalContent + originalContent + originalContent + originalContent;
            }
        }
    });
</script>

@stack('js')