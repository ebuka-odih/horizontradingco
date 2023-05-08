@extends('admin.layout.app')
@section('content')


    <main id="main-container">

        <!-- Hero -->
        <div class="content">
            <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
                <div>
                    <h1 class="h3 mb-1">
                         Deposit Details
                    </h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                            <div class="row">
                                <div class="col-sm-12">

                                    <table style="width:100%" class="table table-striped">
                                        <tr>
                                            <th>Name:</th>
                                            <td>{{ optional($deposit->user)->fullname() }}</td>
                                        </tr>
                                        <tr>
                                            <th>Amount:</th>
                                            <td>${{ $deposit->amount }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status:</th>
                                            <td>{!! $deposit->adminStatus() !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Reference:</th>
                                            <td>{{ $deposit->reference ? : "Null" }}</td>
                                        </tr>
                                    </table>
                                    <form action="{{ route('admin.approve_deposit', $deposit->id)}}" method="POST">
                                        @csrf
                                        @if(session()->has('success'))
                                            <div class="alert alert-success">
                                                {{ session()->get('success') }}
                                            </div>
                                        @endif
                                        @if(session()->has('declined'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('declined') }}
                                            </div>
                                        @endif
                                        <input type="hidden" name="deposit_id" value="{{ $deposit->id }}">
                                        <div class="col-lg-6 col-xl-6">
                                            <h4 class="text-danger text-center">Select which wallet the deposit should be sent to</h4>
                                            <div class="mb-4">
                                                <label class="form-label"  for="example-email-input">Wallet</label>
                                                <select name="type" id="" class="form-control ">
                                                    <option disabled selected>Select Wallet</option>
                                                    <option value="btc_balance">BTC Bal</option>
                                                    <option value="usdt_balance">USDT Bal</option>
                                                    <option value="eth_balance">ETH Bal</option>
                                                    <option value="doge_balance">Doge Bal</option>
                                                    <option value="profit">Profit Bal</option>
                                                    <option value="ref_bonus">Referral Bal</option>
                                                    {{--                                        <option value="Profit">Profit</option>--}}
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <button type="submit" class="btn btn-success">Approve <i class="fa fa-check"></i></button>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
    </main>

@endsection
