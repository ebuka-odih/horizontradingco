@extends('admin.layouts.app')
@section('content')

    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">All Withdrawal</h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Full Table -->
            <div class="block block-rounded">

                <div class="block-content">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th class="text-center" >
                                    <i class="far fa-user"></i>
                                </th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($withdrawal as $item)
                                <tr>
                                    <td class="text-center">
                                        <a href="be_pages_generic_profile.html"> {{ $item->user->name }}</a>
                                    </td>
                                    <td class="fw-semibold">
                                        ${{ $item->amount }}
                                    </td>
                                    <td>
                                        {{ $item->wallet_name }}
                                    </td>
                                    <td>
                                        {!! $item->adminStatus() !!}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.approveDeposit', $item->id) }}" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" >
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <form method="POST" action="{!! route('admin.deleteDeposit', $item->id) !!}" accept-charset="UTF-8">
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
            <!-- END Full Table -->

        </div>
        <!-- END Page Content -->
    </main>


@endsection
