@extends('layouts.website.master')
@section('content')
    <div class="holder mt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-3 aside aside--left">
                   @include('website.auth.partials.account-tabs')
                </div>
                <div class="col-md-9 aside">
                    <h2>Account Details</h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('model.update_profile', $model_no) }}" autocomplete="off">
                                        @csrf
                                            <div class="row mt-2">
                                                <div class="col-sm-4"><label class="text-uppercase">Name:</label>
                                                    <div class="form-group"><input type="text" name="name" value="{{ $model->name }}" readonly class="form-control"></div>
                                                </div>
                                                <div class="col-sm-4"><label class="text-uppercase">Email Address:</label>
                                                    <div class="form-group"><input type="email" name="email" value="{{ $model->email }}" readonly class="form-control"></div>
                                                </div>
                                                <div class="col-sm-4"><label class="text-uppercase">Phone Number:</label>
                                                    <div class="form-group"><input type="text" name="phone_no" value="{{ $model->phone_no }}" class="form-control"></div>
                                                </div>
                                                <div class="col-sm-4"><label class="text-uppercase">Real Phone Number:</label>
                                                    <div class="form-group"><input type="text" name="real_phone_no" value="{{ $model->real_phone_no }}" class="form-control"></div>
                                                </div>
                                                <div class="col-sm-4"><label class="text-uppercase">Gender:</label>
                                                    <div class="form-group"><input type="text" name="gender" value="{{ $model->gender }}" readonly class="form-control"></div>
                                                </div>
                                                <div class="col-sm-4"><label class="text-uppercase">Age:</label>
                                                    <div class="form-group"><input type="text" name="age" value="{{ $model->age }} Years" readonly class="form-control"></div>
                                                </div>
                                                <div class="col-sm-4"><label class="text-uppercase">Country:</label>
                                                    <div class="form-group"><input type="text" name="country_name" value="{{ $model->country_name }}" readonly class="form-control"></div>
                                                </div>
                                                <div class="col-sm-4"><label class="text-uppercase">Location/City:</label>
                                                    <div class="form-group"><input type="text" name="city_name" value="{{ $model->city_name }}" readonly class="form-control"></div>
                                                </div>
                                                <div class="col-sm-4"><label class="text-uppercase">Ethnicity:</label>
                                                    <div class="form-group"><input type="text" name="ethnicity_name" value="{{ $model->ethnicity }}" readonly class="form-control"></div>
                                                </div>
                                                <div class="col-sm-6"><label class="text-uppercase">Build:</label>
                                                    <div class="form-group"><input type="text" readonly name="ethnicity_name" value="{{ $model->build }}" class="form-control"></div>
                                                </div>
                                                <div class="col-sm-12"><label class="text-uppercase">About Me:</label>
                                                   <div class="form-group">
                                                       <textarea cols="50" rows="10" class="form-control" name="about">{{ $model->about }}</textarea>
                                                   </div>
                                                </div>
                                                <div class="col-sm-12"><label class="text-uppercase">About Me:</label>
                                                    <div class="form-group">
                                                        <div class="mt-2"><button type="submit" class="btn btn-lg ml-0">Update Profile</button></div>
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
