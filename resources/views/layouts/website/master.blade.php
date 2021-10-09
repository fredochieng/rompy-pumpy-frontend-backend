@include('layouts.website.head')
<body class="home-page is-dropdn-click has-slider">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TVXZ627"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
   @include('layouts.website.preloader')

    {{-- Header --}}
   @include('website.partials.ads-area')
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
