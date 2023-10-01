@extends('layouts.site')

@section('slider')
    <div id="displayTop" class="displaytopthree">
        <div class="container">
            <div class="row">
                <div class="nov-row  col-lg-12 col-xs-12">
                    <div class="nov-row-wrap row">
                        <div class="nov-html col-xl-3 col-lg-3 col-md-3">
                            <div class="block">
                                <div class="block_content">

                                </div>
                            </div>
                        </div>
                        <div id="nov-slider" class="slider-wrapper theme-default col-xl-9 col-lg-9 col-md-9 col-md-12"
                             data-effect="random" data-slices="15" data-animspeed="500" data-pausetime="10000"
                             data-startslide="0" data-directionnav="false" data-controlnav="true"
                             data-controlnavthumbs="false" data-pauseonhover="true" data-manualadvance="false"
                             data-randomstart="false">
                            <div class="nov_preload">
                                <div class="process-loading active">
                                    <div class="loader">



                                    </div>
                                </div>
                            </div>
                            <div class="nivoSlider">






                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop


    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
    @endif

@section('content')

    <div id="categories-product">
        <div id="js-product-list">
            <div class="products product_list grid row" data-default-view="grid">
                @isset($products)
                    @foreach($products as $product)
                        <div class="item  col-lg-4 col-md-6 col-xs-12 text-center no-padding">
                            <div class="product-miniature js-product-miniature item-one"
                                 data-id-product="22" data-id-product-attribute="408" itemscope=""
                                 itemtype="http://schema.org/Product">
                                <div class="thumbnail-container">

                                    @if(isset($product->images) && $product->images->count() > 0)
                                        <a href="{{route('product.details',$product -> id)}}"class="thumbnail product-thumbnail two-image">
                                            <img class="img-fluid image-cover"
                                                 src="{{ asset('back/assets/imag/product/' . $product->images[0]->filename) ?? '' }}"
                                                 alt=""
                                                 data-full-size-image-url="{{ asset('back/assets/imag/product/' . $product->images[0]->filename) }}"                                                 width="600" height="600">
                                            <img class="img-fluid image-secondary"
                                                 src="{{ asset('back/assets/imag/product/' . $product->images[0]->filename) ?? '' }}"
                                                 alt=""
                                                 data-full-size-image-url="{{ asset('back/assets/imag/product/' . $product->images[0]->filename ?? '') }}"                                                 width="600" height="600">
                                        </a>
                                    @endif


                                    <div class="product-flags new">New</div>
                                </div>
                                <div class="product-description">
                                    <div class="product-groups">

                                        <div class="category-title"><a
                                                href="">Audio</a>
                                        </div>

                                        <div class="group-reviews">
                                            <div class="product-comments">
                                                <div class="star_content">
                                                    <div class="star"></div>
                                                    <div class="star"></div>
                                                    <div class="star"></div>
                                                    <div class="star"></div>
                                                    <div class="star"></div>
                                                </div>
                                                <span>0 review</span>
                                            </div>



                                        </div>

                                        <div class="product-title" itemprop="name"><a
                                                href="{{route('product.details',$product -> id)}}"> pro :{{$product -> name}}</a></div>

                                        <div class="product-group-price">
                                            <div class="product-price-and-shipping">
                                                                    <span itemprop="price"
                                                                          class="price">{{$product -> selling_price }}</span>


                                            </div>
                                        </div>

                                        <div class="product-desc" itemprop="desciption">
                                            {{ $product->description }}
                                        </div>
                                    </div>
                                    <div class="product-buttons d-flex justify-content-center"
                                         itemprop="offers" itemscope=""
                                         itemtype="http://schema.org/Offer">
                                        <form action="{{ route('cart.store', $product->id) }}" method="POST">
                                            @csrf

                                            <button type="submit"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Add to Cart
                                        </button>

                                        <a class="addToWishlist  wishlistProd_22" href="#"
                                           data-product-id="{{$product -> id}}">
                                            <i class="fa fa-heart"></i>
                                            <span>Add to Wishlist</span>
                                        </a>
                                        <a href="#" class="quick-view hidden-sm-down"
                                           data-product-id="{{$product -> id}}">
                                            <i class="fa fa-search"></i><span> Quick view</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @include('front.includes.product-details',$product)
                    @endforeach
                @endisset
            </div>
        </div>

    </div>

    @include('front.includes.not-logged')
    @include('front.includes.alert')   <!-- we can use only one with dynamic text -->
    @include('front.includes.alert2')



@stop
@section('scripts')
    <script>
        $(document).on('click', '.quick-view', function () {
            $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "block");
        });
        $(document).on('click', '.close', function () {
            $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "none");

            $('.not-loggedin-modal').css("display", "none");
            $('.alert-modal').css("display", "none");
            $('.alert-modal2').css("display", "none");
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.addToWishlist', function (e) {
            e.preventDefault();

            @guest()
            $('.not-loggedin-modal').css('display','block');
            @endguest
            $.ajax({
                type: 'post',
                url: "{{Route('wishlist.store')}}",
                data: {
                    'productId': $(this).attr('data-product-id'),
                },
                success: function (data) {
                    if(data.wished )
                        $('.alert-modal').css('display','block');
                    else
                        $('.alert-modal2').css('display','block');
                }
            });
        });

        $(document).on('click', '.cart-addition', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: "{{Route('cart.store', isset($product->id) ? intval($product->id) : 0)}}",
                data: {
                    'product_id': $(this).attr('data-product-id'),
                    'product_slug' : $(this).attr('data-product-id'),
                },
                success: function (data) {

                }
            });
        });
    </script>

@stop

