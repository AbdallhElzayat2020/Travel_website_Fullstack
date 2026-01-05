<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.8.1/nouislider.min.js"></script>
<script src="{{ asset('assets/frontend/assets/js/main.min.js') }}"></script>

<script>
    // Announcement scrolling effect (single run, no inline repetition)
    document.addEventListener('DOMContentLoaded', function () {
        const announcementBar = document.getElementById('announcement-bar');
        if (!announcementBar) return;

        const scrollContent = announcementBar.querySelector('.announcement-scroll');
        if (!scrollContent) return;

        // We keep the original content only.
        // CSS animation in head.blade.php handles the infinite loop,
        // so the text appears once and repeats only after it fully leaves the screen.
    });
</script>

@stack('js')
