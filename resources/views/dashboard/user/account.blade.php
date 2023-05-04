@extends('dashboard.layout.app')
@section('content')

    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><span>Account Setting</span></div>
                        <h2 class="nk-block-title fw-normal">Withdrawal Account</h2>
                    </div>
                </div>
                <!-- .nk-block-head -->
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item current-page">
                        <a class="nav-link" href="{{ route('user.profile') }}">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('user.account') }}">Payout Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.security') }}">Security</a>
                    </li>
                </ul><!-- .nk-menu -->
                <!-- NK-Block @s -->
                <div class="nk-block">

                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Enter Wallet</h5>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-data data-list">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <form action="{{ route('user.account.store') }}" method="POST" class="form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="acccount-name">Wallet Name <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <select name="name" id="">

                                            </select>
                                            <input name="name" type="text" class="form-control form-control-lg" id="acccount-name"  value="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="account-number">Wallet Address <span class="text-danger">*</span></label>
                                        <div class="form-control-wrap">
                                            <input name="value" type="text" class="form-control form-control-lg" id="account-number"  value="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 mt-4">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                            <br>

                        </form>

                    </div><!-- .nk-data -->

                    <hr>
                   <div class="table-responsive">
                       <table class="table table-striped">
                          <thead>
                          <tr>
                              <th>Date</th>
                              <th>Wallet Name</th>
                              <th>Wallet Address</th>
                          </tr>
                          </thead>
                           @foreach($wallets as $item)
                           <tr>
                               <td>{{ date('M d, Y', strtotime($item->created_at)) }}</td>
                               <td>{{ $item->name }}</td>
                               <td>{{ $item->value }}</td>
                           </tr>
                           @endforeach
                       </table>


                   </div>

                </div>
                <!-- NK-Block @e -->
                <!-- //  Content End -->
            </div>
        </div>
    </div>


@endsection
