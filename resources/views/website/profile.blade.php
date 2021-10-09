@extends('layouts.website.master')
@section('content')
    <div class="holder mt-0">
        <div class="container">
            <div class="row prd-block prd-block--mobile-image-first js-prd-gallery" id="prdGallery100">
                <div class="col-md-6 col-xl-5">
                    <div class="prd-block_info js-prd-m-holder mb-2 mb-md-0"></div>
                    <div class="prd-block_main-image main-image--slide js-main-image--slide">
                        <div class="prd-block_main-image-holder js-main-image-zoom" data-zoomtype="inner">
                            <div class="prd-block_main-image-video js-main-image-video"><video loop muted preload="metadata" controls="controls">
                                    <source src="#"></video>
                                <div class="gdw-loader"></div>
                            </div>
                            <div class="prd-has-loader">
                                <div class="gdw-loader"></div><img src="{{ asset($model->preview_image) }}" class="zoom" alt="" data-zoom-image="{{ asset($model->preview_image) }}">
                            </div>
                            <div class="prd-block_main-image-next slick-next js-main-image-next">NEXT</div>
                            <div class="prd-block_main-image-prev slick-prev js-main-image-prev">PREV</div>
                        </div>
                    </div>
                        <div class="product-previews-wrapper">
                            <div class="product-previews-carousel" id="previewsGallery100">
                                @foreach($model_other_pics as $m_pic)
                                <div class="col-md-3">
                                    <a href="#" data-value="Silver" data-image="{{asset($m_pic->model_pic_url)}}" data-zoom-image="{{asset($m_pic->model_pic_url)}}">
                                        <img src="{{asset($m_pic->model_pic_url)}}" alt=""></a>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    <!-- /Product Gallery -->
                </div>
                <div class="col-md">
                    <div class="prd-block_info">
                        <div class="js-prd-d-holder prd-holder">
                            <div class="prd-block_title-wrap">
                                <h1 class="prd-block_title text-capitalize">{{ $model->name }}</h1>
                                <div class="prd-block__labels label-new"><span class="prd-label--new">{{ $model_subs->sub_pkg_name }}</span></div>
                            </div>
                            <div class="prd-block_info-top">
                                <div class="product-sku text-capitalize">Phone No: <span>{{ $model->phone_no }}</span></div>
                                <div class="prd-availability text-capitalize">Age: <span>{{ $model->age }}</span></div>
                                <div class="prd-availability text-capitalize">Country: <span>{{ $model->country_name }}</span></div>
                                <div class="prd-availability text-capitalize">Location/Area: <span>{{ $model->city_name }} | {{ $model->town_name }}</span></div>
                                <div class="prd-availability text-capitalize">Ethnicity: <span>{{ $model->ethnicity }}</span></div>
                            </div>
                            <div class="prd-block_description topline">
    {{--                                <h4>Age: <span class="prd-availability" style="color: red">{{ $model->age }}</h4>--}}
    {{--                                <h4>Phone No: <span class="prd-availability">{{ $model->phone_no }}</h4>--}}
    {{--                                <h4>Country: <span class="prd-availability">{{ $model->country_name }}</h4>--}}
    {{--                                <h4>Location: <span class="prd-availability">{{ $model->city_name }}</h4>--}}
                                <p>{{ $model->about }}</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless h-font text-uppercase">
                                    <tbody>
                                    <tr>
                                        <td class="text-capitalize">SERVICES</td>
                                        <td><b>@foreach ($model_services as $model_service)
                                                    {{ $model_service->service }},
                                                @endforeach</b></td>
                                    </tr>
                                    <tr>
                                        <td class="text-capitalize">Availability</td>
                                        <td><b>@foreach ($model_availabilities as $model_availability)
                                                    {{ $model_availability->availability }},
                                                @endforeach</b></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="prd-block_actions topline">
                            <div class="btn-wrap">
                                <a href="tel:{{ $model->phone_no }}" class="btn btn--add-to-cart text-capitalize"><i class="icon icon-phone"></i> Call Me Now {{ $model->phone_no }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
