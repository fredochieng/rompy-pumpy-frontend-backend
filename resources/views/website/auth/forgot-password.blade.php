@extends('layouts.website.master')
@section('content')
    <div class="holder mt-0">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-sm-6 col-md-4">
                    <div id="loginForm">
                        <h2 class="text-center">RESET YOUR PASSWORD</h2>
                        <div class="form-wrapper">
                            <p>Enter your registered email address to reset your password.</p>
                            <form method="POST" action="{{ route('reset.mypassword') }}">
                                @csrf
                                <div class="form-group"><input type="email" name="email" class="form-control" placeholder="Email Address"></div>
                                <p class="text-uppercase"><a href="#" class="js-toggle-forms">Back to Login</a></p>
                                <button type="submit" class="btn btn-block">Reset My Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

