@extends('admin.layouts.app')
@section('content')


    <main id="main-container">

        <!-- Hero -->
        <div class="bg-image" style="background-image: url(https://images.unsplash.com/photo-1583752028088-91e3e9880b46?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80);">
            <div class="bg-black-25">
                <div class="content content-full">
                    <div class="py-5 text-center">
                        <a class="img-link" >
                            <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ asset('admin/assets/media/avatars/avatar10.jpg') }}" alt="">
                        </a>
                        <h1 class="fw-bold my-2 text-white">{{ $user->name }}</h1>
                        <h2 class="h4 fw-bold text-white-75">
                            <a class="text-primary-lighter" href="javascript:void(0)">{{ $user->email }}</a>
                        </h2>
                        <h2 class="h4 fw-bold text-white-75">
                            Account Balance <a class="text-primary-lighter" href="javascript:void(0)">${{ $user->balance ? : "0.0" }}</a>
                        </h2>

                        <a href="{{ route('admin.viewUser', $user->id) }}" class="btn btn-secondary m-1">
                            <i class="fa fa-fw fa-user opacity-50 me-1"></i> Personal Details
                        </a>
                        <a href="{{ route('admin.userWithdrawMethod', $user->id) }}" class="btn btn-info m-1">
                            <i class="fa fa-fw fa-dollar-sign opacity-50 me-1"></i> Withdrawal Method Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content content-full content-boxed">
            <!-- Latest Friends -->
            <h2 class="content-heading">
                <i class="si si-users me-1"></i> Withdrawal Method Details
            </h2>
            @if($user_withdraw_method->payment_type == 1)
            <table class="table table-striped" style="width:100%">
                <tr>
                    <th>Name:</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td>{!! $user->status() !!}</td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td>{{ $user->phone ? : "N/A" }}</td>
                </tr>
                <tr>
                    <th>Telegram:</th>
                    <td>{{ $user->phone ? : "N/A" }}</td>
                </tr>
                <tr>
                    <th>Country:</th>
                    <td>{{ $user->country ? : "N/A" }}</td>
                </tr>
                <tr>
                    <th>State:</th>
                    <td>{{ $user->state ? : "N/A" }}</td>
                </tr>
                <tr>
                    <th>City:</th>
                    <td>{{ $user->city ? : "N/A" }}</td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td>{{ $user->address ? : "N/A" }}</td>
                </tr>
            </table>
            @else
                <table class="table table-striped" style="width:100%">
                    <tr>
                        <th>Wallet Name:</th>
                        <td>{{ $user->wallet_name }}</td>
                    </tr>
                    <tr>
                        <th>Wallet Address:</th>
                        <td>{{ $user->wallet_address }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td>{!! $user->status() !!}</td>
                    </tr>
                </table>
            @endif

            <!-- END Latest Friends -->


            <!-- END Latest Projects -->


        </div>
        <!-- END Page Content -->
    </main>
@endsection
