@extends('admin.layout.app')
@section('content')


    <main id="main-container">

        <!-- Hero -->
        <div class="content">
            <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
                <div>
                    <h1 class="h3 mb-1">
                        All Investments
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
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">User</th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Amount</th>
                                                {{--                                            <th class="d-none d-sm-table-cell sorting"  tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Payment Detail</th>--}}
                                                <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Registered: activate to sort column ascending">Earned</th>
                                                <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Registered: activate to sort column ascending">Status</th>
                                                <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Registered: activate to sort column ascending">Ending</th>
                                                <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Registered: activate to sort column ascending">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($investments as $item)
                                                <tr class="odd">
                                                    <td class="fw-semibold"> {{ date('d-M-y', strtotime($item->updated_at)) }}</td>
                                                    <td class="fw-semibold">{{ optional($item->user)->fullname() }} ({{ optional($item->user)->balance }})</td>
                                                    <td class="fw-semibold">$ {{ $item->amount }}</td>
                                                    {{--                                                <td class="d-none d-sm-table-cell"> {{ $item->withdraw_method->acctLabel() }}</td>--}}
                                                    <td class="fw-semibold"> ${{ $item->earning }}</td>
                                                    <td class="fw-semibold"> {!! $item->adminStatus() !!}</td>
                                                    <td class="fw-semibold"> {{ date('d-M-y', strtotime($item->ending_date() )) }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.investmentDetails', $item->id) }}"><i class="fa fa-eye"></i></a>
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
                </div>
            </div>
            <!-- END Page Content -->
    </main>

@endsection
