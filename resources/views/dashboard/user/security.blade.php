@extends('dashboard.layout.app')
@section('content')

    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><span>Account Setting</span></div>
                        <h2 class="nk-block-title fw-normal">Security</h2>
                        <div class="nk-block-des">
                            <p>You have full control to manage your own account setting. <span class="text-primary"><em class="icon ni ni-info" data-toggle="tooltip" data-placement="right" title="" data-original-title="Tooltip on right"></em></span></p>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item current-page">
                        <a class="nav-link" href="{{ route('user.profile') }}">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.account') }}">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('user.security') }}">Security</a>
                    </li>
                </ul><!-- .nk-menu -->
                <!-- NK-Block @s -->
                <div class="nk-block">

                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Change Password</h5>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-data data-list">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <form action="{{ route('user.updateSecurity') }}" method="POST" class="form">
                            @csrf
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label" for="acccount-name">Current Password <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input name="current_password" type="text" class="form-control form-control-lg" id="acccount-name"  value="" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label" for="account-number">New Password <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input name="new_password" type="text" class="form-control form-control-lg" id="account-number"  value="" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label" for="account-number">Confirm New Password <span class="text-danger">*</span></label>
                                    <div class="form-control-wrap">
                                        <input name="new_confirm_password" type="text" class="form-control form-control-lg" id="account-number"  value="" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>

                        </form>

                    </div><!-- .nk-data -->

                </div>
                <!-- NK-Block @e -->
                <!-- //  Content End -->
            </div>
        </div>
    </div>


@endsection
