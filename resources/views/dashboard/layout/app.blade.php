<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content=" {{ env('APP_NAME') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Investment |  {{ env('APP_NAME') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/dashlite.css?ver=2.4.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('client/assets/css/theme.css?ver=2.4.0') }}">
    <script src="//code.jivosite.com/widget/5tCCVWktyu" async></script>

</head>

<body class="nk-body npc-crypto bg-white has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
        <div class="nk-sidebar nk-sidebar-fixed is-dark" data-content="sidebarMenu">
            <div class="nk-sidebar-element nk-sidebar-head">
                <div class="nk-sidebar-brand">
                    <a href="{{ route('user.dashboard') }}" class="logo-link nk-sidebar-logo">
                        <h4 class="text-white"> {{ env('APP_NAME') }}</h4>
                        <span class="nio-version">Invest</span>
                    </a>
                </div>
                <div class="nk-menu-trigger mr-n2">
                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                </div>
            </div><!-- .nk-sidebar-element -->
            <div class="nk-sidebar-element">
                <div class="nk-sidebar-body" data-simplebar>
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-widget d-none d-xl-block">
                            <div class="user-account-info between-center">
                                <div class="user-account-main">
                                    <h6 class="overline-title-alt">Available Balance</h6>
                                    <div class="user-balance">@convert(auth()->user()->balance) <small class="currency currency-btc">Bal</small></div>
                                </div>
                                <a href="#" class="btn btn-white btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a>
                            </div>

                            <div class="user-account-actions">
                                <ul class="g-3">
                                    <li><a href="{{ route('user.deposit') }}" class="btn btn-lg btn-primary"><span>Deposit</span></a></li>
                                    <li><a href="{{ route('user.withdraw') }}" class="btn btn-lg btn-warning"><span>Withdraw</span></a></li>
                                </ul>
                            </div>
                        </div><!-- .nk-sidebar-widget -->
                        <div class="nk-sidebar-widget nk-sidebar-widget-full d-xl-none pt-0">
                            <a class="nk-profile-toggle toggle-expand" data-target="sidebarProfile" href="#">
                                <div class="user-card-wrap">
                                    <div class="user-card">
                                        <div class="user-avatar">
                                            <span>AB</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="lead-text">{{ auth()->user()->fullname() }}</span>
                                            <span class="sub-text">{{ auth()->user()->email }}</span>
                                        </div>
                                        <div class="user-action">
                                            <em class="icon ni ni-chevron-down"></em>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="nk-profile-content toggle-expand-content" data-content="sidebarProfile">
                                <div class="user-account-info between-center">
                                    <div class="user-account-main">
                                        <h6 class="overline-title-alt">Available Balance</h6>
                                        <div class="user-balance">@convert(auth()->user()->balance) <small class="currency currency-btc">USD</small></div>
                                    </div>
                                    <a href="#" class="btn btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a>
                                </div>

                                <ul class="user-account-links">
                                    <li><a href="{{ route('user.withdraw') }}" class="link"><span>Withdraw Funds</span> <em class="icon ni ni-wallet-out"></em></a></li>
                                    <li><a href="{{ route('user.deposit') }}" class="link"><span>Deposit Funds</span> <em class="icon ni ni-wallet-in"></em></a></li>
                                </ul>
                                <ul class="link-list">
                                    <li><a href="{{ route('user.profile') }}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    <li><a href="{{ route('user.security') }}"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                </ul>
                                <ul class="link-list">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <em class="icon ni ni-signout"></em><span>Sign out</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>

                                        </li>
                                </ul>
                            </div>
                        </div><!-- .nk-sidebar-widget -->
                        <div class="nk-sidebar-menu">
                            <!-- Menu -->
                            <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title">Menu</h6>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('user.dashboard') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('user.deposit') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-arrow-down"></em></span>
                                        <span class="nk-menu-text">Deposit</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('user.withdraw') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-arrow-up"></em></span>
                                        <span class="nk-menu-text">Withdraw</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('user.transactions') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class=" icon ni ni-repeat"></em></span>
                                        <span class="nk-menu-text">Transactions</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('user.plans') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                        <span class="nk-menu-text">Invest</span>
                                    </a>
                                </li>

                                <li class="nk-menu-item">
                                    <a href="{{ route('user.investments') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-wallet-fill"></em></span>
                                        <span class="nk-menu-text">Investments</span>
                                    </a>
                                </li>
{{--                                <li class="nk-menu-item">--}}
{{--                                    <a href="html/crypto/chats.html" class="nk-menu-link">--}}
{{--                                        <span class="nk-menu-icon"><em class="icon ni ni-chat-circle"></em></span>--}}
{{--                                        <span class="nk-menu-text">Message</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                                <li class="nk-menu-item">
                                    <a href="{{ route('user.profile') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                                        <span class="nk-menu-text">My Profile</span>
                                    </a>
                                </li>
                                <li class="nk-menu-heading">
                                    <a href="e67">
                                        <span class="nk-menu-icon"><em class="icon ni ni-help-alt"></em></span>
                                        <span class="nk-menu-text">Support</span>
                                    </a>
                                </li>
                                <li class="nk-menu-heading">
                                    <div id="google_translate_element"></div>
                                    <script>
                                        function googleTranslateElementInit() {
                                            new google.translate.TranslateElement({
                                                pageLanguage: 'en'
                                            }, 'google_translate_element');
                                        }
                                    </script>
                                </li>

                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-body -->
            </div><!-- .nk-sidebar-element -->
        </div>
        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <div class="nk-header nk-header-fluid nk-header-fixed is-dark">
                <div class="container-fluid">
                    <div class="nk-header-wrap">
                        <div class="nk-menu-trigger d-xl-none ml-n1">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                        </div>
                        <div class="nk-header-brand d-xl-none">
                            <a href="{{ route('user.dashboard') }}" class="logo-link">
                                <h3 class="text-white"> {{ env('APP_NAME') }}</h3>
{{--                                <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">--}}
{{--                                <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">--}}
                                <span class="nio-version">Crypto</span>
                            </a>
                            <div id="google_translate_element"></div>
                            <script type="text/javascript">
                                function googleTranslateElementInit() {
                                    new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                                }
                            </script>

                            <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

                        </div>
                        <div class="nk-header-news d-none d-xl-block">
                            <div class="nk-news-list">
                                <a class="nk-news-item" href="{{ route('user.plans') }}">
                                    <div class="nk-news-icon">
                                        <em class="icon ni ni-card-view"></em>
                                    </div>
                                    <div class="nk-news-text">
                                        <p>Do you know you can earn upto 3000% annually? <span> with our investment plan, you can never go wrong</span></p>
                                        <em class="icon ni ni-external"></em>
                                    </div>
                                </a>



                            </div>

                        </div>

                        <div class="nk-header-tools">
{{--                            <div id="google_translate_element"></div>--}}
                            <ul class="nk-quick-nav">
                                <li class="dropdown user-dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <div class="user-toggle">
                                            <div class="user-avatar sm">
                                                <em class="icon ni ni-user-alt"></em>
                                            </div>
                                            <div class="user-info d-none d-md-block">
                                                <div >{!! auth()->user()->status() !!}</div>
                                                <div class="user-name dropdown-indicator">{{ auth()->user()->fullname() }}</div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                            <div class="user-card">
                                                <div class="user-avatar">
                                                    <span>AB</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">{{ auth()->user()->fullname() }}</span>
                                                    <span class="sub-text">{{ auth()->user()->email }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li><a href="{{ route('user.profile') }}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
{{--                                                <li><a href="html/crypto/profile-security.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>--}}
                                                <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        <em class="icon ni ni-signout"></em><span>Sign out</span>
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>



            <!-- main header @e -->

            <!-- content @s -->
            @yield('content')
            <!-- content @e -->

            <!-- footer @s -->
            <div class="nk-footer nk-footer-fluid bg-lighter">
                <div class="container-xl wide-lg">
                    <div class="nk-footer-wrap">
                        <div class="nk-footer-copyright"> &copy; 2023  {{ env('APP_NAME') }}
                        </div>
                        <div class="nk-footer-links">
                            <ul class="nav nav-sm">
                                {{--                            <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>--}}
                                {{--                            <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>--}}
                                {{--                            <li class="nav-item"><a class="nav-link" href="#">Help</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{ asset('client/assets/js/bundle.js?ver=2.4.0') }}"></script>
<script src="{{ asset('client/assets/js/scripts.js?ver=2.4.0') }}"></script>
<script src="{{ asset('client/assets/js/charts/chart-crypto.js?ver=2.4.0') }}"></script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>
