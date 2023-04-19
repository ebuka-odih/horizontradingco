@extends('admin.layouts.app')
@section('content')

    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Payment Wallets</h1>

                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Full Table -->
            <div class="block block-rounded">

                <div class="block-content">
                    <button type="button" class="btn btn-primary push" data-bs-toggle="modal" data-bs-target="#modal-block-normal">Add Wallet</button>
                    @if(session()->has('success'))
                        <div class="alert alert-success m-3">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->has('deleted'))
                        <div class="alert alert-danger m-3">
                            {{ session()->get('deleted') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th >Value</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wallets as $item)
                            <tr>

                                <td >
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->address }}
                                </td>

                                <td class="text-center">
                                    <div class="btn-group">
                                        <form method="POST" action="{!! route('admin.payment-wallet.destroy', $item->id) !!}" accept-charset="UTF-8">
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
                        <h3 class="block-title">Add Payment Wallet</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form action="{{ route('admin.payment-wallet.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Wallet Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Wallet Address</label>
                                <input type="text" name="address" class="form-control">
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
