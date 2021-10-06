@extends('layouts.website.master')
@section('content')
    <div class="holder mt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-3 aside aside--left">
                    @include('website.auth.partials.account-tabs')
                </div>
                <div class="col-md-9 aside">
                    <h2>Change password</h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('model.change_password') }}">
                                        @csrf
                                    <div class="row mt-2">
                                        <div class="col-sm-4"><label class="text-uppercase">Current Password:</label>
                                            <div class="form-group"><input type="password" name="current_pass" required placeholder="Enter current password" class="form-control"></div>
                                        </div>
                                        <div class="col-sm-4"><label class="text-uppercase">New Password:</label>
                                            <div class="form-group"><input type="password" name="new_pass" required placeholder="Enter new password" class="form-control"></div>
                                        </div>
                                        <div class="col-sm-4"><label class="text-uppercase">Confirm Password:</label>
                                            <div class="form-group"><input type="password" name="confirm_pass" required placeholder="Re-enter new password" class="form-control"></div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="mt-2"><button type="submit" class="btn btn-lg ml-0">Change Password</button></div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
