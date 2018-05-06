<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- saved from url=(0032)https://www.babymoov.com/en_us/# -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" style="" class="js no-touch localstorage no-ios gr__babymoov_com">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="INDEX,FOLLOW">
    <link rel="icon" href="https://www.babymoov.com/media/favicon/default/Babymoov_Favicon_fond_blanc_1.png" type="image/x-icon">
    <link rel="shortcut icon" href="https://www.babymoov.com/media/favicon/default/Babymoov_Favicon_fond_blanc_1.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/css.css">
    <!--[if  (lte IE 8) & (!IEMobile)]>
<link rel="stylesheet" type="text/css" href="https://www.babymoov.com/media/css_secure/557e6b0e0a154d95efcd0947068a3a1b.css" media="all" />
<![endif]-->
    <!--[if (gte IE 9) | (IEMobile)]><!-->
    <link rel="stylesheet" type="text/css" href="/css/c7c6c91c74f3ba91f96a8871632cf877.css" media="all">
    <!--<![endif]-->
  
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <!-- OG META Data -->
    <meta property="og:title" content="Babymoov® USA | Baby equipment and nursery products in United State">
    <meta property="og:site_name" content="Babymoov">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.babymoov.com/en_us/">
    <meta property="og:image" content="https://www.babymoov.com/media/wysiwyg/CMS/lien-site.PNG">
    <meta property="og:description" content="">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.10.1/lodash.min.js"></script>
    <script src="/js/responsiveslides.min.js"></script>
    <script type="text/javascript" src="/js/jquery.flexisel.js"></script>
    <script type="text/javascript" src="/js/apps.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/search.js"></script>
    @yield('script')
</head>

<body class=" cms-index-index cms-home-us" data-gr-c-s-loaded="true">
    <div class="wrapper">
        <div class="page">
            <header id="header" class="page-header">
                <div class="page-header-container">
                    <div class="page-header-top-content">
                        <!-- Logo -->
                        <a class="logo" href="https://www.babymoov.com/en_us/">
                            <img src="/images/logo_bbm-large.png" alt="Babymoov" class="large">
                            <img src="/images/logo_bbm-small.png" alt="Babymoov" class="small">
                        </a>
                        <!-- Search -->
                        <div id="header-search" class="skip-content">
                            <form id="search_mini_form" action="{{ route('search') }}" method="get">
                                <div class="input-box">
                                    <!--<label for="search">Search:</label>-->
                                    <img src="/images/picto_search-red.png" alt="" class="search-input-picto">
                                    <input id="search" type="search" name="search" value="" class="input-text required-entry" maxlength="128" placeholder="Search" autocomplete="off">
                                    {{ csrf_field() }}
                                    <button type="submit" title="Search" class="button search-button">
                                        <span>►<!--<span>Search</span>--></span>
                                    </button>
                                </div>
                                <div id="search_autocomplete" class="search-autocomplete" style="display: none;"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            <div id="header-nav" class="skip-content nav-box_wrapper">
                <div class="nav-box">
                    <nav class="nav-container">
                        <ul class="nav">
                            <li class="nav-link_first-lvl{{ Request::is('/') ? ' active-menu' : '' }}">
                                <a href="{{ route('home') }}">Trang chủ</a>
                            </li>
                            <li class="nav-link_first-lvl{{ Request::is('products') ? ' active-menu' : '' }}">
                                <a href="{{ route('all-pro') }}">Sản phẩm</a>
                            </li>
                            <li class="nav-link_first-lvl{{ Request::is('new-products') ? ' active-menu' : '' }}">
                                <a href="{{ route('new-pro') }}">Sản phẩm mới</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            @yield('content')
            <div class="main-container col1-layout">
                <div class="box box-store-locator">
                    <div class="box box-store-search">
                        <p class="store-search-title">Map Store</p>
                        <p class="store-search-txt">Find our products around you!</p>
                    </div>
                    <img alt="" class="store-locator-map" src="/images/bg_store-map.png"></div>
                </div>
                <div class="footer-box">
                    <h4 class="footer-section-title">© Copyright 2018 SH team.</h3>
                </div>
            </div>
</body>

</html>