
<div class="holder">
    <div class="container">
        <div class="title-with-right">
            <h2 class="h1-style text-capitalize">{{ $city_name }} VIP Models</h2>
            <div class="prd-carousel-tabs js-filters-prd d-none d-md-flex" data-grid="tabCarousel-01">
                {{ Form::open(['route'=>['models.city_search'],'method'=>'get', 'target'=>'_blank']) }}
                            @csrf
                            <div class="row">
                                    <div class="form-group"> <div class="col-xl-12"> <select class="form-control js-example-basic-single" name="city_id" required>
                                            <option value="">Select service</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->c_city_id }}">{{ $city->city_name }}
                                                </option>
                                            @endforeach
                                        </select></div>
                                </div> <div class="col-sm-6">
                                    <button type="submit" class="btn ml-3">Search Models</button></div>
                            </div>
                            </div>
                    </form>
            <div class="prd-carousel-tabs js-filters-prd-sm d-md-none">
                <span class="filters-label active" data-filter=".prd"></span>
                <span class="filters-label" data-filter=".prd-popular"></span>
                <span class="filters-label" data-filter=".prd-sale"></span>
                <span class="filters-label" data-filter=".prd-new"></span></div>
        </div>
           <div class="row">
               @foreach($vip_models as $model)
               <div class="col-sm-3">
                   <div class="prd-grid prd-carousel js-prd-carousel-tab slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2 js-product-isotope-sm" data-slick='{"slidesToShow": 1, "slidesToScroll": 2}'>
                       <div class="prd prd-has-loader prd-new prd-popular">
                           <div class="prd-inside">
                               <div class="prd-img-area"><a href="/profile/{{ $model->model_no }}" class="prd-img"><img src="{{ asset($model->preview_image) }}" data-srcset="{{ asset($model->preview_image) }}" class="js-prd-img lazyload"></a>
                                   <div class="gdw-loader"></div>
                               </div>
                               <div class="prd-info">
                                   <h2 class="prd-title"><a href="/profile/{{ $model->model_no }}"><p style="font-weight: normal" class="text-capitalize">Name: {{ $model->name }}</p></a></h2>
                                   <h2 class="prd-title"><a href="tel:{{ $model->phone_no }}"><p style="font-weight: normal" class="text-capitalize">Phone No: {{ $model->phone_no }}</p></a></h2>
                                   <h2 class="prd-title"><a href="/profile/{{ $model->model_no }}"><p style="font-weight: normal" class="text-capitalize">Age: {{ $model->age }} Years</p></a></h2>
                                   <h2 class="prd-title"><a href="/profile/{{ $model->model_no }}"><p style="font-weight: normal" class="text-capitalize">Location: {{ $model->country_name }}/{{ $model->city_name  }}</p></a></h2>
                               </div>
                               <div class="prd-action">
                                   <a href="tel:{{ $model->phone_no }}" class="btn" ><i class="icon icon-phone"></i> Call Me Now On {{ $model->phone_no }}</a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               @endforeach
           </div>
    </div>
</div>


<div class="holder">
    <div class="container">
        <div class="title-with-right">
            <h2 class="h1-style text-capitalize">{{ $city_name }} Regular Models</h2>
            <div class="prd-carousel-tabs js-filters-prd d-none d-md-flex" data-grid="tabCarousel-01">
                <span class="active" data-filter="prd"></span> <span data-filter="prd-popular"></span>
                <span data-filter="prd-sale"></span> <span data-filter="prd-new"></span></div>
            <div class="prd-carousel-tabs js-filters-prd-sm d-md-none">
                <span class="filters-label active" data-filter=".prd"></span>
                <span class="filters-label" data-filter=".prd-popular"></span>
                <span class="filters-label" data-filter=".prd-sale"></span>
                <span class="filters-label" data-filter=".prd-new"></span></div>
        </div>
        <div class="row">
            @foreach($reg_models as $model)
                <div class="col-sm-3">
                    <div class="js-prd-carousel-tab" data-slick='{"slidesToShow": 1, "slidesToScroll": 2}'>
                        <div class="prd prd-has-loader prd-new prd-popular">
                            <div class="prd-inside">
                                <div class="prd-img-area"><a href="/profile/{{ $model->model_no }}" class="prd-img"><img src="{{ asset($model->preview_image) }}" data-srcset="{{ asset($model->preview_image) }}" class="js-prd-img lazyload"></a>
                                    <div class="gdw-loader"></div>
                                </div>
                                <div class="prd-info">
                                    <h2 class="prd-title"><a href="/profile/{{ $model->model_no }}"><p style="font-weight: normal" class="text-capitalize">Name: {{ $model->name }}</p></a></h2>
                                    <h2 class="prd-title"><a href="tel:{{ $model->phone_no }}"><p style="font-weight: normal" class="text-capitalize">Phone No: {{ $model->phone_no }}</p></a></h2>
                                    <h2 class="prd-title"><a href="/profile/{{ $model->model_no }}"><p style="font-weight: normal" class="text-capitalize">Age: {{ $model->age }} Years</p></a></h2>
                                    <h2 class="prd-title"><a href="/profile/{{ $model->model_no }}"><p style="font-weight: normal" class="text-capitalize">Location: {{ $model->country_name }}/{{ $model->city_name  }}</p></a></h2>
                                </div>
                                <div class="prd-action">
                                    <a href="tel:{{ $model->phone_no }}" class="btn" ><i class="icon icon-phone"></i> Call Me Now On {{ $model->phone_no }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

