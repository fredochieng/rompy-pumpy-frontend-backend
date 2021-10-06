@include('layouts.website.head')
<body class="home-page is-dropdn-click has-slider">
   @include('layouts.website.preloader')

    {{-- Header --}}
    @include('layouts.website.header')
    <div class="page-content">
        @yield('content')
    </div>
    {{-- Footer --}}
    @include('layouts.website.footer')
{{-- Modals --}}
@include('layouts.website.scripts')
</body>

</html>
