@extends('admin.layouts.app')
@section('content')

<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">All Deposits</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Full Table -->
        <div class="block block-rounded">

            <div class="block-content">
                <button type="button" class="btn btn-primary push" data-bs-toggle="modal" data-bs-target="#modal-block-normal">Add Deposit</button>

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
                        @foreach($deposits as $item)
                        <tr>
                            <td class="text-center">
                                <a href="be_pages_generic_profile.html"> {{ $item->user->name }}</a>
                            </td>
                            <td class="fw-semibold">
                                ${{ $item->amount }}
                            </td>
                            <td>
                                {{ $item->payment_wallet->name }}
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

<!-- Normal Block Modal -->
<div class="modal" id="modal-block-normal" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="block block-rounded block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Add Deposit</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <form action="{{ route('admin.storeDeposit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" name="amount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Wallet</label>
                            <select name="payment_wallet_id" id="" class="form-control">
                                @foreach($wallets as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>User</label>
                            <select name="user_id" id="" class="form-control">
                                @foreach($users as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3 mt-3" data-bs-dismiss="modal">Submit</button>
                    </form>
                </div>
                <div class="block-content block-content-full text-end bg-body">
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Normal Block Modal -->

@endsection
