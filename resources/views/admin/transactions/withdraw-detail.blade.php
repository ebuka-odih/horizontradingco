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
                                            <td>{{ optional($withdraw->user)->fullname() }}</td>
                                        </tr>
                                        <tr>
                                            <th>Amount:</th>
                                            <td>${{ $withdraw->amount }}</td>
                                        </tr>
                                        <tr>
                                            <th>Withdrawal Wallet:</th>
                                            <td>{{ optional($withdraw->withdraw_method)->name ? : "Null" }}</td>
                                        </tr>
                                        <tr>
                                            <th>Withdrawal Address:</th>
                                            <td>{{ optional($withdraw->withdraw_method)->value ? : "Null" }}</td>
                                        </tr>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
    </main>

@endsection
