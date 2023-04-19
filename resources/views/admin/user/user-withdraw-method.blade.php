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
            <div class="content">

                <!-- Striped Table -->
                <div class="block block-rounded">
                <table class="table table-striped table-vcenter">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>Label</th>
                        <th>Type</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Created At</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->withdrawal as $index => $item)
                        <tr>
                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                            <td class="fw-semibold">
                                {{ $item->label }}
                            </td>
                            <td class="fw-semibold">
                                {{ $item->payment_type() }}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{ date('Y-m-d', strtotime($item->created_at)) }}
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('admin.viewUser', $item->id) }}" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <form method="POST" action="{!! route('admin.deleteUser', $item->id) !!}" accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                        <div class="btn-group btn-group-xs pull-right" role="group">
                                            <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="" data-bs-original-title="Delete" onclick="return confirm(&quot;Delete Package?&quot;)">
                                                <i class="fa fa-times"></i>
                                            </button>

                                        </div>

                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
@endsection
