@extends('layouts.website.master')
@section('content')
    <div class="holder mt-0">
        <div class="container">
    <div class="row justify-content-around">
        <div class="col-sm-6 col-md-4">
            <div id="loginForm">
                <h2 class="text-center">SIGN IN</h2>
                <div class="form-wrapper">
                    <p>If you have an account with us, please log in.</p>
                    <form method="POST" action="{{ route('model.process_login') }}">
                        @csrf
                        <div class="form-group"><input type="email" name="email" class="form-control" placeholder="Email Address"></div>
                        <div class="form-group"><input type="password" name="password" class="form-control" placeholder="Password"></div>
                        <p class="text-uppercase"><a href="/forgot-password" class="js-toggle-forms">Forgot Your Password?</a></p>
                        <div class="clearfix"><input id="checkbox1" name="checkbox1" type="checkbox" checked="checked"> <label for="checkbox1">Remember me</label></div><button type="submit" class="btn btn-block">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-divider"></div>
        <div class="col-sm-6 col-md-4 mt-3 mt-sm-0">
            <h2 class="text-center">Account Creation</h2>
            <div class="form-wrapper">
                <p>If you don't have an account with us, please contact us on <a href="tel:+254716434878">+254716434878</a> by calling, sending a text or WhatsApp messagefor account creation. Only profile details
                will be required plus a subscription fee of KES 500 for VIP membership and KES 300 for Regular membership</p><a href="tel:+254716434878" class="btn btn-block">Call Admin Now On +254708823158</a>
            </div>
        </div>
    </div>
        </div>
    </div>
@stop

