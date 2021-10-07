@extends('layouts.website.master')
@section('content')
    <div class="holder mt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-3 aside aside--left">
                    @include('website.auth.partials.account-tabs')
                </div>
                <div class="col-md-9 aside">
                    <h2 class="text-capitalize">My Services</h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-order-history">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col" class="text-capitalize">Service Name</th>
                                                <th scope="col" class="text-capitalize">Creation Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($model_services as $key => $model_service)
                                                    <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $model_service->service }}</td>
                                                    <td>{{ $model_service->created_at }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="mt-2 clearfix"><a href="#" class="link-icn js-show-form" data-form="#addService">
                                                    <i class="icon-upload"></i>Add New Service</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 card mt-6 d-none" id="adddddService">
                                        <div class="card-body">
                                            <h3>Add New Service</h3>
                                            <form method="POST" action="{{ route('model.add_service') }}" autocomplete="off"
                                                  enctype='multipart/form-data'>
                                                @csrf
                                                    <div class="col-md-12"><label class="text-uppercase">Select Service</label>
                                                        <select class="form-control js-example-basic-single" name="service_id" required>
                                                            <option>Select service</option>
                                                            @foreach ($services as $service)
                                                                <option value="{{ $service->service_id }}">{{ $service->service }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                </div>
                                                <div class="mt-2"><button type="reset" class="btn btn--alt js-close-form text-capitalize" data-form="#addService">Cancel</button>
                                                    <button type="submit" class="btn ml-1 text-capitalize">Add Service</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 d-none" id="addService">
                        <div class="card-body">
                            <h3>New Service</h3>
                            <form method="POST" action="{{ route('model.add_service') }}" autocomplete="off"
                                  enctype='multipart/form-data'>
                                @csrf
                            <div class="row mt-2">
                                <div class="col-sm-6"><label class="text-uppercase">Service</label>
                                    <div class="form-group"> <select class="form-control js-example-basidc-single" multiple="multiple" name="service_id[]" required>
                                            <option value="">Select service</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->service_id }}">{{ $service->service }}
                                                </option>
                                            @endforeach
                                        </select></div>
                                </div>
                            </div>
                            <div class="mt-2"><button type="reset" class="btn btn--alt js-close-form text-capitalize" data-form="#updateDetails">Cancel</button>
                                <button type="submit" class="btn ml-3 text-capitalize">Add New Service</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <script src="/website/js/seletct.js"></script>--}}
@stop
{{--<script src="/website/js/selectt.js"></script>--}}


