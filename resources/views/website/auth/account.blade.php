@extends('layouts.website.master')
@section('content')
    <div class="holder mt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-3 aside aside--left">
                   @include('website.auth.partials.account-tabs')
                </div>
                <div class="col-md-9 aside">
                    <h2 class="text-capitalize">Account Details</h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('model.update_profile', $model_no) }}" autocomplete="off">
                                        @csrf
                                            <div class="row mt-2">
                                                <div class="col-sm-4"><label class="text-capitalize">Name</label>
                                                    <div class="form-group"><input type="text" name="name" value="{{ $model->name }}" readonly class="form-control"></div>
                                                </div>
                                                <div class="col-sm-4"><label class="text-capitalize">Email Address</label>
                                                    <div class="form-group"><input type="email" name="email" value="{{ $model->email }}" readonly class="form-control"></div>
                                                </div>
                                                <div class="col-sm-4"><label class="text-capitalize">Phone Number</label>
                                                    <div class="form-group"><input type="text" name="phone_no" value="{{ $model->phone_no }}" class="form-control"></div>
                                                </div>
                                                <div class="col-sm-4"><label class="text-capitalize">Real Phone Number</label>
                                                    <div class="form-group"><input type="text" name="real_phone_no" value="{{ $model->real_phone_no }}" class="form-control"></div>
                                                </div>
                                                <div class="col-sm-4"><label class="text-capitalize">Gender</label>
                                                    <div class="form-group"><input type="text" name="gender" value="{{ $model->gender }}" readonly class="form-control"></div>
                                                </div>
                                                <div class="col-sm-4"><label class="text-capitalize">Age</label>
                                                    <div class="form-group"><input type="text" name="age" value="{{ $model->age }} Years" readonly class="form-control"></div>
                                                </div>
                                                <div class="col-sm-4"><label class="text-capitalize">Country</label>
                                                    <div class="form-group"><input type="text" name="country_name" value="{{ $model->country_name }}" readonly class="form-control"></div>
                                                </div>
                                                <div class="col-sm-4"><label class="text-capitalize">City</label>
                                                    <div class="form-group"><input type="text" name="city_name" value="{{ $model->city_name }}" readonly class="form-control"></div>
                                                </div>
                                                <div class="col-sm-4"><label class="text-capitalize">Town</label>
                                                    <div class="form-group"><input type="text" name="town_name" value="{{ $model->town_name }}" readonly class="form-control"></div>
                                                </div>
                                                <div class="col-sm-6"><label class="text-capitalize">Ethnicity</label>
                                                    <div class="form-group"><input type="text" name="ethnicity_name" value="{{ $model->ethnicity }}" readonly class="form-control"></div>
                                                </div>
                                                <div class="col-sm-6"><label class="text-capitalize">Build</label>
                                                    <div class="form-group"><input type="text" readonly name="ethnicity_name" value="{{ $model->build }}" class="form-control"></div>
                                                </div>
                                                <div class="col-sm-12"><label class="text-capitalize">About Me</label>
                                                   <div class="form-group">
                                                       <textarea cols="50" rows="10" style="height: 150px" class="form-control" name="about">{{ $model->about }}</textarea>
                                                   </div>
                                                </div>
                                                <div class="col-sm-12"><label class="text-uppercase"></label>
                                                    <div class="form-group">
                                                        <div class="mt-2"><button type="submit" class="btn btn-lg ml-0 text-capitalize">Update Profile</button></div>
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
