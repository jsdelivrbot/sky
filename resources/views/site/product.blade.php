@extends('layouts.container')
@section('title')SkyMax @endsection
@section('content')

    <div id="page-inside" class="insd">
        <div class="top-bg"></div>
        <div class="logo">
            <a href="{{url("/")}}" target="_self"><img src="{{asset("assets/")}}/img/logo.png" alt="SkyMax"></a>
        </div>

        <div class="container">

            <ol class="breadcrumb bread-primary ">
                <a href="#" class="btn btn-primary">Path</a>
                @if($product->category)
                    <li><a href="#">{{$product->category->name}}</a></li>
                @endif
                @if($product->sub_category)
                    <li><a href="#">{{$product->sub_category->name}}</a></li>
                @endif
                <li class="active">{{$product->name}}</li>

            </ol>
        </div>

    </div>
    <div class="contents">
        <div class="container">


            <div class="col-sm-12 col-md-12 col-lg-12 content-center">
                <div class="product-details" id="prdct">
                    <div id="main_area">

                        <div class="row">

                            <div class="col-xs-12 col-md-5" id="slider">
                                @if(count($images->all()))
                                    <div class="row">
                                        <div class="col-md-12" id="carousel-bounding-box">
                                            <div class="carousel slide" id="myCarousel">
                                                <!-- Carousel items -->
                                                <div class="carousel-inner" data-lightbox="gallery">
                                                    @php $i =0 @endphp
                                                    @foreach($images as $image)
                                                        <div class="@if($i ==0) active @endif item slide"
                                                             data-slide-number="{{$i}}"
                                                             data-thumb="img/product1.jpg">
                                                            <a href="{{$image->image}}"
                                                               title="Pink Printed Dress - Front View"
                                                               data-lightbox="gallery-item"><img
                                                                        src="{{$image->image}}">
                                                            </a>

                                                        </div>
                                                        @php $i++ @endphp
                                                    @endforeach
                                                </div><!-- Carousel nav -->
                                                <a class="left carousel-control" href="#myCarousel"
                                                   role="button"
                                                   data-slide="prev">
                                                </a>
                                                <a class="right carousel-control"
                                                   href="#myCarousel"
                                                   role="button"
                                                   data-slide="next">
                                                </a>
                                            </div>
                                            <div class="row hidden-xs" id="slider-thumbs">
                                                <ul class="hide-bullets">
                                                    @php $i =0 @endphp
                                                    @foreach($images as $image)
                                                        <li class="col-sm-2 no-pd">
                                                            <a class="thumbnail" id="carousel-selector-{{$i}}"><img
                                                                        src="{{$image->image}}"></a>
                                                        </li>
                                                        @php $i++ @endphp
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                @endif
                            </div>

                            <div class="col-md-7 col-xs-12 details">
                                <h3>{{$product->name}}</h3>
                                <div class="prc1 col-md-7 no-pd col-xs-12">
                                    @if($product->offer)
                                        <div class="col-md-6 col-sm-6 no-pd col-xs-12 ">

                                            <h3 class="prch1">Price. <span class="prcno strikethrough">{{$product->price}}
                                                    EGP</span></h3>
                                        </div>
                                        <div class="col-md-6 col-sm-6 no-pd col-xs-12 ">
                                            <h3 class="prch2">Offer. <span class="prcno1">{{$product->offer->new_price}}
                                                    EGP</span></h3>
                                        </div>
                                    @else
                                        <div class="col-md-6 col-sm-6 no-pd col-xs-12 ">
                                            <h3 class="prch1">Price. {{$product->price}}EGP</h3>
                                        </div>
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                                @if($product->product_type_id == 1)
                                    <div class="col-md-6 col-xs-12 modq no-pd">
                                        <h4>Shipping Fees: <span>{{$product->shipping_fees}} EGP </span></h4>
                                    </div>
                                @endif
                                <div class="col-md-6 col-xs-12 modq no-pd ">
                                    <h4>Quantity: <span>{{$product->quantity}}</span></h4>
                                </div>
                                <div class="clearfix"></div>
                                @if($product->product_type_id == 2)
                                    <div class="col-md-6 col-xs-12 modq no-pd">
                                        <h4>Commission: <span>{{$product->commission}} EGP </span></h4>
                                    </div>
                                @endif
                                <div class="col-md-6 col-xs-12 modq no-pd ">
                                    <h4>Type: <span>{{$product->product_type->name}}</span></h4>
                                </div>
                                <div class="clearfix"></div>
                                <div class='rating-stars'>

                                </div>
                                <div class="desc">
                                    <h4>Description:</h4>
                                    <p>{{$product->desc}}</p>
                                </div>

                                @guest
                                <a href="#squarespaceModal" data-toggle="modal"
                                   class="btn btn-form nwbtn1  add "><span class="cart"></span> Buy</a>
                                @endguest
                                @auth
                                @if(auth()->user()->qualified ==1)


                                    @if($product->product_type_id == 1)
                                        <label class="btn btn-form nwbtn1 add gray_btn"><span
                                                    class="cart"></span>
                                            Order</label>
                                    @else
                                        <a href="#squarespaceModal-order" data-toggle="modal"
                                           data-product_id="{{$product->id}}"
                                           class="btn btn-form nwbtn1  add"><span class="cart"></span> Buy</a>
                                    @endif

                                @else
                                    @if($product->product_type_id == 1)
                                        <a href="#squarespaceModal-order" data-toggle="modal"
                                           data-product_id="{{$product->id}}"
                                           class="btn btn-form nwbtn1  add"><span class="cart"></span> Buy</a>
                                    @else
                                        <label class="btn btn-form nwbtn1 add gray_btn"><span
                                                    class="cart"></span>
                                            Order</label>
                                    @endif
                                @endif
                                @endauth


                            </div>
                        </div>


                    </div>


                </div>

            </div>

        </div>

    </div>

@endsection
@section('js')
    <script>
        $('.add').click(function () {
            id = $(this).data('product_id');
            $("#product_id_input").val(id);
        })
    </script>
@endsection
@auth
<div class="modal fade" id="squarespaceModal-order" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mymodal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body ">
                <div class="wrapper">

                    <section id="first-tab-group2" class="tabgroup2">


                        <form method="post" action="{{url("order")}}">
                            @csrf
                            <input id="product_id_input" type="hidden" name="product_id" value="">
                            <div class="clearfix"></div>
                            <div class="form-group nw-pd">
                                @if(auth()->user()->addresses)
                                    <select class="form-control" name="address_select">
                                        @foreach(auth()->user()->addresses as $address)
                                            <option value="{{$address->address}}">{{$address->address}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                            <div class="clearfix"></div>

                            <div class="form-group nw-pd">
                                OR
                                <input name="address_input" type="text" class="form-control"
                                       placeholder="address">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group nw-pd">
                                <input required name="mobile" type="text" class="form-control"
                                       placeholder="mobile">
                            </div>
                            <div class="clearfix"></div>
                            <button type="submit" class="btn btn-form nwbtn1">Buy</button>

                        </form>


                    </section>
                </div>


            </div>
        </div>
    </div>
</div>
@endauth