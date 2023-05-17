@extends('dashboard.layout.app')
@section('content')

    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title fw-normal">My Referrals</h2>
                        <div class="nk-block-des">
                            <p>You have full control to manage your own account setting. <span class="text-primary"><em class="icon ni ni-info" data-toggle="tooltip" data-placement="right" title="" data-original-title="Tooltip on right"></em></span></p>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->

                <!-- NK-Block @s -->
                <div class="nk-block">

                    <table class="nk-plan-tnx table">
                        <thead class="thead-light">
                        <tr>
                            <th class="tb-col-type w-50"><span class="overline-title">Details</span></th>
                            <th class="tb-col-status tb-col-sm"><span class="overline-title">Username</span></th>
                            <th class="tb-col-date tb-col-md"><span class="overline-title">Date</span></th>
                            <th class="tb-col-amount tb-col-end"><span class="overline-title">Earning</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(auth()->user()->all_referrals() as $ref)
                            <tr>
                                <td>{{ $ref->fullname()}}</td>
                                <td>{{ $ref->username}}</td>
                                <td>{{ date('M Y d', strtotime($ref->created_at ))  }}</td>
                                <td>$ @convert($ref->ref_bonus)</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- NK-Block @e -->
                <!-- //  Content End -->
            </div>
        </div>
    </div>

@endsection
