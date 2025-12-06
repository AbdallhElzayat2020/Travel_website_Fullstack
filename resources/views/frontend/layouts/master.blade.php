<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

@include('frontend.layouts.head')

<body class="antialiased font-urbanist">

    @include('frontend.layouts.navbar')

    @yield('content')

    @include('frontend.layouts.footer')

    @include('frontend.layouts.scripts')

</body>

</html>
