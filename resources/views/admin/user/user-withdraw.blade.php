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
                        <a class="nav-main-link active" href="{{ route('admin.userDetails', $user->id) }}">
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
        <br><br>
        <h4 class="text-center">{{ $user->fullname() }} Withdrawal</h4>


        <div class="content content-full content-boxed">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                <div class="row">
                    <div class="col-sm-12">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                <tr>
                                    <th class="text-center sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending">Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Amount</th>
                                    {{--                                            <th class="d-none d-sm-table-cell sorting"  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Payment Detail</th>--}}
                                    <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Registered: activate to sort column ascending">Status</th>
                                    <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Registered: activate to sort column ascending">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($withdrawal as $item)
                                    <tr class="odd">
                                        <td class="fw-semibold"> {{ date('d-M-y', strtotime($item->created_at)) }}</td>
                                        <td class="fw-semibold">$ {{ $item->amount }}</td>
                                        {{--                                                <td class="d-none d-sm-table-cell"> {{ $item->withdraw_method->acctLabel() }}</td>--}}
                                        <td class="d-none d-sm-table-cell"> {!! $item->adminStatus() !!}</td>
                                        <td>
                                            <a href="{{ route('admin.withdrawDetails', $item->id) }}"><i class="fa fa-eye"></i></a>
                                            @if($item->status == 0)
                                                <a href="{{ route('admin.approve_withdrawal', $item->id) }}" class="btn btn-sm btn-success mb-1"><i class="fa fa-check"></i></a>
                                            @else
                                            @endif
                                            <form method="POST" action="{!! route('admin.delete_withdrawal', $item->id) !!}" accept-charset="UTF-8">
                                                <input name="_method" value="DELETE" type="hidden">
                                                {{ csrf_field() }}

                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                    <button data-toggle="tooltip" data-placement="top" type="submit" class="btn  btn-sm btn-danger" onclick="return confirm(&quot;Delete Withdrawl?&quot;)">
                                                        <span class="fa flaticon-delete" aria-hidden="true"></span>Delete
                                                    </button>
                                                </div>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>
@endsection
