<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Affluent CoinFX| Register</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/dashlite.css?ver=2.4.0') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('client/assets/css/theme.css?ver=2.4.0') }}">
</head>

<body class="nk-body bg-dark npc-general pg-auth">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content ">
                <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                    <div class="brand-logo pb-4 text-center">
                        <a href="/" class="logo-link">
                            <h3 class="text-white">Affluent CoinFX</h3>
                            {{--                            <img class="logo-light logo-img logo-img-lg" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">--}}
                            {{--                            <img class="logo-dark logo-img logo-img-lg" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">--}}
                            {{--                       --}}
                        </a>
                    </div>
                    <div class="card card-bordered">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Register</h4>
                                    <div class="nk-block-des">
                                        <p>Create New Affluent CoinFX Account
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <input type="hidden" name="referred_by" value="{{ request()->id}}" />
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">First Name</label>
                                    </div>
                                    <input type="text" name="firstname" class="form-control form-control-lg" id="default-01" placeholder="Enter your firstname">
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Last Name</label>
                                    </div>
                                    <input type="text" name="lastname" class="form-control form-control-lg" id="default-01" placeholder="Enter your lastname">
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Email</label>
                                    </div>
                                    <input type="email" name="email" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address">
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Username</label>
                                    </div>
                                    <input type="text" name="username" class="form-control form-control-lg" id="default-01" placeholder="Enter your username">
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="password">Passcode</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Enter your passcode">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="password">Confirm Passcode</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" name="password_confirmation" class="form-control form-control-lg" id="password" placeholder="Enter your passcode">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                                </div>
                            </form>
                            <div class="form-note-s2 text-center pt-4"> Already have an account? <a href="{{ route('login') }}">Sign in instead</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="nk-footer nk-auth-footer-full">
                    <div class="container wide-lg">
                        <div class="row g-3">
                            <div class="col-lg-6 order-lg-last">
                                <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Terms & Condition</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Privacy Policy</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Help</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <div class="nk-block-content text-center text-lg-left">
                                    <p class="text-soft">&copy; 2022 Affluent CoinFX. All Rights Reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{ asset('client/assets/js/bundle.js?ver=2.4.0') }}"></script>
<script src="{{ asset('client/assets/js/scripts.js?ver=2.4.0') }}"></script>

</html>
