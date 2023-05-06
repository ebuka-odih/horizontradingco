@extends('admin.layout.app')
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
                        <h1 class="fw-bold my-2 text-white">{{ $user->fullname() }}</h1>
                        <h2 class="h4 fw-bold text-white-75">
                            <a class="text-primary-lighter" href="javascript:void(0)">{{ $user->email }}</a>
                        </h2>
                        <h2 class="h4 fw-bold text-white-75">
                            Account Balance <a class="text-primary-lighter" href="javascript:void(0)">${{ $user->balance ? : "0.0" }}</a>
                        </h2>

                        <a href="{{ route('admin.userDetails', $user->id) }}" class="btn btn-secondary m-1">
                            <i class="fa fa-fw fa-user opacity-50 me-1"></i> Personal Details
                        </a>
                        <a href="" class="btn btn-info m-1">
                            <i class="fa fa-fw fa-dollar-sign opacity-50 me-1"></i> Fund Account
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <div class="bg-sidebar-dark p-3 rounded push">
            <!-- Toggle Navigation -->
            <div class="d-lg-none">
                <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
                <button type="button" class="btn w-100 btn-dark d-flex justify-content-between align-items-center" data-toggle="class-toggle" data-target="#horizontal-navigation-hover-centered-dark" data-class="d-none">
                    Menu -
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <!-- END Toggle Navigation -->

            <!-- Navigation -->
            <div id="horizontal-navigation-hover-centered-dark" class="d-none d-lg-block mt-2 mt-lg-0">
                <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center nav-main-dark">
                    <li class="nav-main-item">
                        <a class="nav-main-link active" href="be_ui_navigation_horizontal.html">
                            <i class="nav-main-link-icon fa fa-home"></i>
                            <span class="nav-main-link-name">Overview</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link active" href="be_ui_navigation_horizontal.html">
                            <i class="nav-main-link-icon fa fa-arrow-down"></i>
                            <span class="nav-main-link-name">Deposits</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link active" href="be_ui_navigation_horizontal.html">
                            <i class="nav-main-link-icon fa fa-arrow-up"></i>
                            <span class="nav-main-link-name">Withdrawal</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link active" href="be_ui_navigation_horizontal.html">
                            <i class="nav-main-link-icon fa fa-rocket"></i>
                            <span class="nav-main-link-name">Investment</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link active" href="be_ui_navigation_horizontal.html">
                            <i class="nav-main-link-icon fa fa-money-bill"></i>
                            <span class="nav-main-link-name">Fundings</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- END Navigation -->
        </div>

        <!-- Page Content -->
        <div class="content content-full content-boxed">
            <!-- Latest Friends -->
            <h2 class="content-heading">
                <i class="si si-users me-1"></i> User Details
            </h2>
            <table class="table table-striped">
                <tr>
                    <th>Deposits:</th>
                    <td>${{ $deposits ? : '0.00' }}</td>
                </tr>
                <tr>
                    <th>Withdrawal:</th>
                    <td>${{ $withdraw ? : '0.00' }}</td>
                </tr>
                <tr>
                    <th>Investments:</th>
                    <td>${{ $investment ? : '0.00' }}</td>
                </tr>
                <tr>
                    <th>Fundings:</th>
                    <td>${{ $fundings ? : '0.00' }}</td>
                </tr>


            </table>
            <table class="table table-striped" style="width:100%">
                <tr>
                    <th>Name:</th>
                    <td>{{ $user->fullname() }}</td>
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
                <tr>
                    <th>Password:</th>
                    <td>{{ $user->pass ? : "N/A" }}</td>
                </tr>
            </table>
            @if(session()->has('defund'))
                <div class="alert alert-success">
                    {{ session()->get('defund') }}
                </div>
            @endif
            <form action="{{ route('admin.defund') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $user->id }}" name="user_id">

                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" name="amount" class="form-control" >
                    </div>
                    <div class="col-lg-6">
                        <button class="btn btn-primary">Defund Account</button>
                    </div>
                </div>
            </form>

            <!-- END Latest Friends -->


            <!-- END Latest Projects -->


        </div>
        <!-- END Page Content -->
    </main>
@endsection
