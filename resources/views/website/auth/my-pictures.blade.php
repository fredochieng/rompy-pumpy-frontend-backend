@extends('layouts.website.master')
@section('content')
    <div class="holder mt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-3 aside aside--left">
                    @include('website.auth.partials.account-tabs')
                </div>
                <div class="col-md-9 aside">
                    <h2 class="text-capitalize">My Pictures</h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-order-history">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col" class="text-capitalize">Creation Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($model_pics as $key => $pic)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $pic->created_at }}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                @if($pic_upload == "Y")
                                                <div class="mt-2 clearfix"><a href="#" class="link-icn js-show-form" data-form="#uploadPicture">
                                                        <i class="icon-upload"></i>Upload Picture</a>
                                                    @else
                                                        <p style="color: red">You are only allowed to upload a maximum of 4 pictures</p>
                                                        @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3 d-none" id="uploadPicture">
                                        <div class="card-body">
                                            <h3 class="text-capitalize">Upload New Picture</h3>
                                            <form method="POST" action="{{ route('model.add_picture') }}" autocomplete="off"
                                                  enctype='multipart/form-data'>
                                                @csrf
                                            <div class="row mt-2">
                                                <div class="col-sm-6"><label class="text-uppercase">:</label>
                                                    <div class="form-group"><input type="file" required name="picture" class="form-control" ></div>
                                                </div>
                                            </div>
                                            <div class="mt-2"><button type="reset" class="btn btn--alt js-close-form text-capitalize" data-form="#uploadPicture">Cancel</button>
                                                <button type="submit" class="btn ml-1 text-capitalize">Upload Picture</button></div>
                                            </form>
                                        </div>
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
