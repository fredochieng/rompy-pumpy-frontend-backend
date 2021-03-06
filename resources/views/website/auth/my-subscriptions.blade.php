@extends('layouts.website.master')
@section('content')
    <div class="holder mt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-3 aside aside--left">
                    @include('website.auth.partials.account-tabs')
                </div>
                <div class="col-md-9 aside">
                    <h2 class="text-capitalize">My Subscription Package</h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-borderless h-font text-uppercase">
                                            <tbody>
                                            <tr>
                                                <td class="text-capitalize">Sub Package</td>
                                                <td><b>{{ $model_subs->sub_pkg_name }}</b></td>
                                                <td class="text-capitalize">Sub Number</td>
                                                <td><b>{{ $model_subs->sub_no }}</b></td>
                                            </tr>
                                            <tr>
                                                <td class="text-capitalize">Amount</td>
                                                <td><b>KES {{ $model_subs->sub_pkg_amount }}</b></td>
                                                <td class="text-capitalize">Start Date</td>
                                                <td><b>{{ $model_subs->sub_start_date }}</b></td>
                                            </tr>
                                            <tr>
                                                <td class="text-capitalize">Duration</td>
                                                <td><b>{{ $model_subs->sub_duration }} Months</b></td>
                                                <td class="text-capitalize">End Date</td>
                                                <td><b>{{ $model_subs->sub_end_date }}</b></td>
                                            </tr>
                                            <tr>
                                                <td class="text-capitalize">Status</td>
                                                <td><b>
                                                        @if($model_subs->sub_status == 1)

                                                        <span class="menu-label menu-label--color4"> Active </span>
                                                            @else
                                                            <span class="menu-label menu-label--color4"> Active </span>
                                                            @endif
                                                    </b></td>
                                                <td class="text-capitalize">Created</td>
                                                <td><b>{{ $model_subs->created_at }}</b></td>
                                            </tr>
                                            <tr>
                                                <td class="text-capitalize">Total Paid Amount</td>
                                                <td><b>KES {{ $model_subs->paid_amount }}</b></td>
                                                <td class="text-capitalize">Balance Due</td>
                                                <td><b>KES {{ $model_subs->balance }}</b></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
