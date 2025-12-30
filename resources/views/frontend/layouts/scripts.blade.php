<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.8.1/nouislider.min.js"></script>
<script src="{{ asset('assets/frontend/assets/js/main.min.js') }}"></script>

<script>
    // Announcement scrolling effect
    document.addEventListener('DOMContentLoaded', function () {
        const announcementBar = document.getElementById('announcement-bar');
        if (announcementBar) {
            const scrollContent = announcementBar.querySelector('.announcement-scroll');
            if (scrollContent) {
                // Duplicate content once for seamless loop (original + one copy)
                const originalContent = scrollContent.innerHTML;
                // Duplicate only once to ensure content finishes before repeating
                scrollContent.innerHTML = originalContent + originalContent;
            }
        }
    });
</script>

@stack('js')
