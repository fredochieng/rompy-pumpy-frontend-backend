
<header class="hdr global_width hdr_sticky hdr-mobile-style2">

    <!-- Promo TopLine -->
{{--    <div class="bgcolor" style="background-image: url('website/images/promo-topline-bg.png');">--}}
{{--        <div class="promo-topline" data-expires="1" style="display: none;">--}}
{{--            <div class="container">--}}
{{--                <div class="promo-topline-item"><b>GET 10% OFF YOUR FIRST SUBSCRIPTION WITH US&nbsp;<span class="hidden-xs">&nbsp</span></b></div>--}}
{{--            </div><a href="#" class="promo-topline-close js-promo-topline-close"><i class="icon-cross"></i></a>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- /Promo TopLine -->
    <!-- Mobile Menu -->
    <div class="mobilemenu js-push-mbmenu">
        <div class="mobilemenu-content">
            <div class="mobilemenu-close mobilemenu-toggle">CLOSE</div>
            <div class="mobilemenu-scroll">
                <div class="mobilemenu-search"></div>
                <div class="nav-wrapper show-menu">
                    <div class="nav-toggle"><span class="nav-back"><i class="icon-arrow-left"></i></span> <span class="nav-title"></span></div>
                    <ul class="nav nav-level-1">
                        <li class="mmenu-item--simple"><a href="/" title="">Home</a>
                        </li>
                        <li class="mmenu-item--simple"><a href="#" title="">About Us</a>
                        </li>
                        <li class="mmenu-item--simple"><a href="#" title="">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Mobile Menu -->
    <div class="hdr-mobile show-mobile">
        <div class="hdr-content">
            <div class="container">
                <!-- Menu Toggle -->
                <div class="menu-toggle"><a href="#" class="mobilemenu-toggle"><i class="icon icon-menu"></i></a></div>
                <!-- /Menu Toggle -->
                <div class="logo-holder"><a href="/" class="logo"><img src="{{ asset('website/images/logo.png') }}" srcset="{{ asset('website/images/logo.jpeg')}} 2x" alt=""></a></div>
                <div class="hdr-mobile-right">
                    <div class="hdr-topline-right links-holder"></div>
                    <div class="minicart-holder"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="hdr-desktop hide-mobile">
        <div class="hdr-topline">
            <div class="container">
                <div class="row">
                    <div class="col-auto hdr-topline-left">
                    </div>
                    <div class="col hdr-topline-center">
                        <div class="custom-text"><span class="text-capitalize">SUBSCRIBE TODAY AS LOW AS KES 2000</span></div>
                        <div class="custom-text"><i class="icon icon-mobile"></i><b>+254716434878</b></div>
                    </div>
                    <div class="col-auto hdr-topline-right links-holder">
                        <!-- Header Search -->

                        <!-- /Header Search -->

                        <!-- Header Account -->
                        @if($session_available == "Y")
                        <div class="dropdn dropdn_account @@classes"><a href="/account" class="dropdn-link"><i class="icon icon-person"></i>
                                <span class="text-capitalize">Welcome {{ $name }}</span>
                                @else
                                    <div class="dropdn dropdn_account @@classes"><a href="/auth/login" class="dropdn-link"><i class="icon icon-person"></i>
                                            <span class="text-capitalize">My Account</span>
                                @endif
                            </a>
                            <div class="dropdn-content">
                                <div class="container">
                                    <div class="dropdn-close text-capitalize">CLOSE</div>
                                    <ul>
                                        @if($session_available == "Y")
                                        <li><a href="/account/{{ $model_no }}"><i class="icon icon-person-fill"></i><span class="text-capitalize">My Account</span></a></li>
                                        <li><a href="{{ URL::route('sign_out') }}"><i class="icon icon-lock"></i><span class="text-capitalize">Log Out</span></a></li>
                                        @else
                                            <li><a href="/auth/login"><i class="icon icon-person-fill"></i><span class="text-capitalize">My Account</span></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /Header Account -->
                    </div>
                </div>
            </div>
        </div>
        <div class="hdr-content hide-mobile">
            <div class="container">
                <div class="row">
                    <div class="col-auto logo-holder"><a href="/" class="logo"><img src="{{ asset('website/images/logo.jpeg') }}" srcset="images/logo-retina.png') }} 2x" alt=""></a></div>
                    <!--navigation-->
                    <div class="prev-menu-scroll icon-angle-left prev-menu-js"></div>
                    <div class="nav-holder">
                        <div class="hdr-nav">
                            <!--mmenu-->
                            <ul class="mmenu mmenu-js">
                                <li class="mmenu-item--simple"><a href="/" title="">Home</a>
                                </li>
                                <li class="mmenu-item--simple"><a href="#" title="">About Us</a>
                                </li>
                                <li class="mmenu-item--simple"><a href="#" title="">Contact Us</a>
                                </li>
                            </ul>
                            <!--/mmenu-->
                        </div>
                    </div>
                    <div class="next-menu-scroll icon-angle-right next-menu-js"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-holder compensate-for-scrollbar">
        <div class="container">
            <div class="row"><a href="#" class="mobilemenu-toggle show-mobile"><i class="icon icon-menu"></i></a>
                <div class="col-auto logo-holder-s"><a href="/" class="logo"><img src="{{ asset('website/images/logo.jpeg') }}" srcset="images/logo.jpeg') }} 2x" alt=""></a></div>
                <!--navigation-->
                <div class="prev-menu-scroll icon-angle-left prev-menu-js"></div>
                <div class="nav-holder-s"></div>
                <div class="next-menu-scroll icon-angle-right next-menu-js"></div>
                <!--//navigation-->
                <div class="col-auto minicart-holder-s"></div>
            </div>
        </div>
    </div>
</header>
