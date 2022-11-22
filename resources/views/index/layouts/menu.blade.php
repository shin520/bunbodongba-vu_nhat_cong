<div class="header-area bg-white header-sticky only-mobile-sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header position-relative">
                    <div class="header-right flexible-image-slider-wrap">
                        <div class="header-right-inner" id="hidden-icon-wrapper">
                            <!-- Header Search Form -->
                            <div class="header-search-form d-md-none d-block">
                                <form action="#" class="search-form-top">
                                    <input class="search-field" type="text" placeholder="Search…">
                                    <button class="search-submit">
                                        <i class="search-btn-icon fa fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- mobile menu -->
                        <div class="mobile-navigation-icon d-block d-xl-none" id="mobile-menu-trigger">
                            <i></i>
                        </div>
                        <!-- hidden icons menu -->
                        <div class="hidden-icons-menu d-block d-md-none" id="hidden-icon-trigger">
                            <a href="javascript:void(0)">
                                <i class="far fa-ellipsis-h-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom-wrap border-top d-md-block d-none header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-bottom-inner">
                        <div class="header-bottom-left-wrap">
                            <!-- navigation menu -->
                            <div class="header__navigation d-none d-xl-block">
                                <nav class="navigation-menu">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="logo d-flex align-items-center">
                                                <a href="{{ url('/') }}"><img class="img_cover" src="https://w.ladicdn.com/s450x450/5b4d9ec1ae9547417f88a9ea/bun-bo-20221031100740-swft3.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="d-flex flex-column">
                                                <div class="row align-items-center justify-content-around special_border_bottom">
                                                    
                                                    @foreach ($share['branch'] as $item) 
                                                        <div class="col-lg-4 menu_top__chi_nhanh--item">
                                                            <div class="row align-items-center justify-content-center gg-10">
                                                                <div class="menu_top__chi_nhanh--icon">♫</div>
                                                                <div class="d-flex flex-column">
                                                                    <div class="menu_top__chi_nhanh--title">{{$item->name}}</div>
                                                                    <div class="menu_top__chi_nhanh--address">{{$item->address}}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                
                                                </div>
                                                <ul class="row align-items-center justify-content-around pb-2">
                                                    <li class="menu_top__menu--item">
                                                        <a href="{{ route('page', $share["about_menu"]->slug) }}">Giới thiệu</a>
                                                    </li>
                                                    <li class="menu_top__menu--item">
                                                        <a href="">Hệ thống cửa hàng</a> {{-- Tạm thời chưa có --}}
                                                    </li>
                                                    <li class="menu_top__menu--item">
                                                        <a href="{{ route('page', $share["all_product_menu"]->slug) }}">Menu</a>
                                                    </li>
                                                    <li class="menu_top__menu--item">
                                                        <a href="">Tuyển dụng</a>       {{-- Tạm thời chưa có --}}
                                                    </li>
                                                    <li class="menu_top__menu--item">
                                                        <a href="{{ route('page', $share["all_post_menu"]->slug) }}">tin tức</a>
                                                    </li>
                                                    <li class="menu_top__menu--item">
                                                        <a href="{{ route('page', $share["contact_menu"]->slug) }}">Liên hệ</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 d-flex align-items-center justify-content-center">
                                            <div class="branch_btn--open">tìm cửa hàng</div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-wrapper-reveal">
    <div class="mobile-menu-overlay" id="mobile-menu-overlay">
        <div class="mobile-menu-overlay__inner">
            <div class="mobile-menu-overlay__header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-8">
                            <!-- logo -->
                            <div class="logo">
                                <a href="index.html">
                                    <img width="60px" src="https://w.ladicdn.com/s450x450/5b4d9ec1ae9547417f88a9ea/bun-bo-20221031100740-swft3.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-4">
                            <!-- mobile menu content -->
                            <div class="mobile-menu-content text-right">
                                <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-overlay__body">
                <nav class="offcanvas-navigation">
                    <ul>
                        <li class="">
                            <a href="index.html">Giới thiệu</a>
                        </li>
                        <li class="has-children">
                            <a href="#">Hệ thống cửa hàng</a>
                            <ul class="sub-menu">
                                <li class="">
                                    <a href="about-us-01.html"><span>Chi nhánh 1</span></a>
                                </li>
                                <li class="">
                                    <a href="about-us-01.html"><span>Chi nhánh 2</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#">IT solutions</a>
                            <ul class="sub-menu">
                                <li><a href="it-services.html"><span>IT Services</span></a></li>
                                <li><a href="managed-it-services.html"><span>Managed IT Services</span></a></li>
                                <li><a href="industries.html"><span>Industries</span></a></li>
                                <li><a href="business-solution.html"><span>Business solution</span></a></li>
                                <li><a href="it-services-details.html"><span>IT Services Details</span></a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#">Elements</a>
                            <ul class="sub-menu">
                                <li class="has-children">
                                    <a href="#">Element Group 01</a>
                                    <ul class="sub-menu">
                                        <li><a href="element-accordion.html"><span>Accordions & Toggles</span></a>
                                        </li>
                                        <li><a href="element-box-icon.html"><span>Box Icon</span></a></li>
                                        <li><a href="element-box-image.html"><span>Box Image</span></a></li>
                                        <li><a href="element-box-large-image.html"><span>Box Large Image</span></a>
                                        </li>
                                        <li><a href="element-buttons.html"><span>Buttons</span></a></li>
                                        <li><a href="element-cta.html"><span>Call to action</span></a></li>
                                        <li><a href="element-client-logo.html"><span>Client Logo</span></a></li>
                                        <li><a href="element-countdown.html"><span>Countdown</span></a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#">Element Group 02</a>
                                    <ul class="sub-menu">
                                        <li><a href="element-counters.html"><span>Counters</span></a></li>
                                        <li><a href="element-dividers.html"><span>Dividers</span></a></li>
                                        <li><a href="element-flexible-image-slider.html"><span>Flexible image
                                                    slider</span></a></li>
                                        <li><a href="element-google-map.html"><span>Google Map</span></a></li>
                                        <li><a href="element-gradation.html"><span>Gradation</span></a></li>
                                        <li><a href="element-instagram.html"><span>Instagram</span></a></li>
                                        <li><a href="element-lists.html"><span>Lists</span></a></li>
                                        <li><a href="element-message-box.html"><span>Message box</span></a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#">Element Group 03</a>
                                    <ul class="sub-menu">
                                        <li><a href="element-popup-video.html"><span>Popup Video</span></a></li>
                                        <li><a href="element-pricing-box.html"><span>Pricing Box</span></a></li>
                                        <li><a href="element-progress-bar.html"><span>Progress Bar</span></a></li>
                                        <li><a href="element-progress-circle.html"><span>Progress Circle</span></a>
                                        </li>
                                        <li><a href="element-rows-columns.html"><span>Rows & Columns</span></a></li>
                                        <li><a href="element-social-networks.html"><span>Social Networks</span></a>
                                        </li>
                                        <li><a href="element-tabs.html"><span>Tabs</span></a></li>
                                        <li><a href="element-team-member.html"><span>Team member</span></a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#">Element Group 04</a>
                                    <ul class="sub-menu">
                                        <li><a href="element-testimonials.html"><span>Testimonials</span></a></li>
                                        <li><a href="element-timeline.html"><span>Timeline</span></a></li>
                                        <li><a href="element-carousel-sliders.html"><span>Carousel
                                                    Sliders</span></a></li>
                                        <li><a href="element-typed-text.html"><span>Typed Text</span></a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="javascript:void(0)">Case Studies</a>
                            <ul class="sub-menu">
                                <li><a href="case-studies.html"><span>Case Studies 01</span></a></li>
                                <li><a href="case-studies-02.html"><span>Case Studies 02</span></a></li>
                                <li><a href="single-smart-vision.html"><span>Single Layout</span></a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="javascript:void(0)">Blogs</a>
                            <ul class="sub-menu">
                                <li><a href="blog-list-large-image.html"><span>List Large Image</span></a></li>
                                <li><a href="blog-list-left-large-image.html"><span>Left Large Image</span></a></li>
                                <li><a href="blog-grid-classic.html"><span>Grid Classic</span></a></li>
                                <li><a href="blog-grid-masonry.html"><span>Grid Masonry</span></a></li>
                                <li class="has-children">
                                    <a href="blog-post-layout-one.html"><span>Single Layouts</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-post-layout-one.html"><span>Left Sidebar</span></a></li>
                                        <li><a href="blog-post-right-sidebar.html"><span>Right Sidebar</span></a>
                                        </li>
                                        <li><a href="blog-post-no-sidebar.html"><span>No Sidebar</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>