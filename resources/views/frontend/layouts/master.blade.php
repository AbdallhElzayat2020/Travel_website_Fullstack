<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

@include('frontend.layouts.head')

<body class="antialiased font-urbanist">

    @php
        $activeAnnouncements = \App\Models\Announcement::active()->orderBy('sort_order')->get();
    @endphp
    @if($activeAnnouncements->count() > 0)
        <div id="announcement-bar"
            class="bg-[#F51D35] text-white py-2 relative overflow-hidden border-b-2 border-dark-grey">
            <div class="announcement-scroll whitespace-nowrap">
                @foreach($activeAnnouncements as $announcement)
                    <span class="inline-block mx-8 font-bold text-base md:text-lg">{{ $announcement->content }}</span>
                @endforeach
            </div>
        </div>
    @endif

    @include('frontend.layouts.navbar')

    @yield('content')

    @include('frontend.layouts.footer')

    @include('frontend.layouts.scripts')

</body>

</html>
