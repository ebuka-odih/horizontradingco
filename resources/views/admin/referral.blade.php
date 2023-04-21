@extends('admin.layout.app')
@section('content')


        <main id="main-container">

            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">All Referrals</h1>

                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">

                <!-- Striped Table -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h4>Referrals</h4>
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Referred</th>
                                            <th>Referred By</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($refs as $ref)
                                            <tr>
                                                {{--                                    <td>{{ optional($ref->referredBy)->id }}</td>--}}
                                                <td><strong>{{ $ref->lastname." ".$ref->firstname }} | {{ $ref->email }} | {{ $ref->username }}</strong></td>
                                                <td><strong>{{ optional($ref->referredBy)->last_name. " ".optional($ref->referredBy)->first_name }} | {{ optional($ref->referredBy)->email  }} | {{ optional($ref->referredBy)->username }}</strong></td>
                                                <td><strong>{{ date('m/d/Y h:i A', strtotime($ref->created_at)) }}</strong></td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- END Striped Table -->

            </div>
            <!-- END Page Content -->
        </main>



@endsection
