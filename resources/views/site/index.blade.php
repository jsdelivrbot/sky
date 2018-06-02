@extends('layouts.container')
@section('title')SkyMax @endsection
@section('content')

    <div class="slider-container">
        <div class="logo">
            <a href="{{asset("assets/")}}" target="_self"><img src="{{asset("assets/")}}/img/logo.png" width="216"
                                                               height="70"></a>
        </div>
        <div class="aslider" data-slide="aslider" data-speed="1000" data-wait="4000" data-preview="true"
             data-dots="true">


            <div id="s1" class="slide1">
                <img src="{{asset("assets/")}}/img/slide1-full.jpg">
                <div class="caption">

                    <h1> Best Shopping Place</h1>
                    <p>If you are a visitor and do not have a membership in our site
                        a registered member must register for you to use our services.
                    </p>

                </div>

            </div>
            <div id="s2" class="slide1">
                <img src="{{asset("assets/")}}/img/slide2-full.jpg">
                <div class="caption">

                    <h1> Best Shopping Place</h1>
                    <p>If you are a visitor and do not have a membership in our site
                        a registered member must register for you to use our services.
                    </p>


                </div>
            </div>
            <div id="s3" class="slide1">
                <img src="{{asset("assets/")}}/img/slide3-full.jpg">
                <div class="caption">

                    <h1> Best Shopping Place</h1>
                    <p>If you are a visitor and do not have a membership in our site
                        a registered member must register for you to use our services.
                    </p>


                </div>

            </div>


        </div>
    </div>
    <div class="contents">
        <div class="container-fluid">

            <form method="post" action="{{url("products/filter")}}" class="buttons">
                @csrf
                <div class="col-md-2 col-sm-3 col-xs-12 ">
                    <div class="side-bar">


                        <div class="types">
                            <h2>Type</h2>

                            <label>
                                <input onchange="submit()" value="3" type="radio" name="product_type_id"
                                       @if(session('product_type_id') == '0') checked @endif >
                                <span class="label-text">All</span>
                            </label>
                            <br/>
                            <label>
                                <input value="1" onchange="submit()" type="radio" name="product_type_id"
                                       @if(session('product_type_id') == '1') checked @endif >
                                <span class="label-text">Qualified Products</span>

                            </label>
                            <br/>
                            <label>
                                <input value="2" onchange="submit()" type="radio" name="product_type_id"
                                       @if(session('product_type_id') == '2') checked @endif >
                                <span class="label-text">Premium Products</span>

                            </label>
                            <br/>
                            <label>
                                <input value="3" onchange="submit()" type="radio" name="product_type_id"
                                       @if(session('product_type_id') == '3') checked @endif >
                                <span class="label-text">E-Learning</span>

                            </label>

                        </div>


                        <div class="categs">
                            <h2>Categories</h2>

                            <div id="categories_form" class="buttons">
                                @foreach($categories as $category)
                                    <label>
                                        <input name="category_id[]" class="category" onchange="submit()"
                                               type="checkbox" value="{{$category->id}}"
                                               @if(session('category_id'))
                                               @if(in_array($category->id,session('category_id'))) checked @endif
                                                @endif>
                                        <span class="label-text">{{$category->name_en}}</span>
                                    </label>
                                    <br/>
                                @endforeach

                            </div>
                        </div>

                        <div class="sub_categs">

                            <h2>Sub Categories</h2>


                            <div id="sub_categories_container">
                                @if(isset($sub_categories))
                                    @foreach($sub_categories as $sub_category)
                                        <label>
                                            <input name="sub_category_id[]" class="category" onchange="submit()"
                                                   type="checkbox" value="{{$sub_category->id}}"
                                                   @if(session('sub_category_id'))
                                                   @if(in_array($sub_category->id,session('sub_category_id'))) checked @endif
                                                    @endif>
                                            <span class="label-text">{{$sub_category->name_en}}</span>
                                        </label>
                                        <br/>
                                    @endforeach
                                @endif
                            </div>


                        </div>


                    </div>

                </div>

                <div class="col-md-10 col-sm-9 col-xs-12 no-pd">
                    <div class="prdct-box clearfix">
                        <div id="filter" class="clearfix ">

                            <div class="col-md-7 col-sm-6 col-xs-12 no-pd1">
                                <div class="filter-container">

                                    <input type="text" name="key" required placeholder="What Do You Want?"
                                           @if(session('key'))
                                           value="{{session('key')}}"@endif>
                                    <button type="submit" class="btn btn-custom-3">Search</button>

                                </div>
                            </div>

                            <div class="col-md-5 col-sm-6 col-xs-12 no-pd1">
                                <div class="myform">
                                    <label>Price:</label>
                                    <input name="from" type="text" placeholder="From"
                                           @if(session('from'))
                                           value="{{session('from')}}"@endif>

                                    <input name="to" type="text" placeholder="To"
                                           @if(session('to'))
                                           value="{{session('to')}}"@endif>
                                    <button type="submit" class="btn btn-custom-3">Filter</button>
                                </div>
                            </div>

                        </div>

                        <div id="products_container" class="list clearfix">


                            @foreach($products as $product)
                                <div class="element element-in">
                                    <h3 style="height: 50px; overflow-y: hidden"><a
                                                href="{{url("products/$product->id")}}">{{$product->name_en}}</a></h3>
                                    <a href="{{url("products/$product->id")}}">
                                        <img width="240" height="180"
                                             src="{{url('/storage/app/public/images/products/').'/'.$product->main_image}}"
                                             class="img-responsive"/>
                                    </a>
                                    <div style="word-break: break-word;height: 50px;overflow-y: hidden">
                                        {!! $product->desc_en !!}
                                    </div>
                                    <a href="{{url("products/$product->id")}}"><strong>More..</strong></a>
                                    <h5 class="price">
                                        @if($product->offer)
                                            <span>{{$product->price}}LE</span>
                                            {{$product->offer->new_price}} LE
                                        @else {{$product->price}} LE
                                        @endif
                                    </h5>
                                    @guest
                                        <a href="#squarespaceModal" data-toggle="modal"
                                           class="btn btn-form nwbtn add "><span class="cart"></span> Order</a>
                                    @endguest
                                    @auth
                                        @if(auth()->user()->qualified ==1)

                                            @if($product->product_type_id == 1)
                                                <label class="btn btn-form nwbtn add gray_btn"><span
                                                            class="cart"></span>
                                                    Order</label>
                                            @else
                                                <a href="#squarespaceModal-order" data-toggle="modal"
                                                   data-product_id="{{$product->id}}"
                                                   class="btn btn-form nwbtn add"><span class="cart"></span> Order</a>
                                            @endif

                                        @else
                                            @if($product->product_type_id == 1 or $product->product_type_id == 3)
                                                <a href="#squarespaceModal-order" data-toggle="modal"
                                                   data-product_id="{{$product->id}}"
                                                   class="btn btn-form nwbtn add"><span class="cart"></span> Order</a>
                                            @else
                                                <label class="btn btn-form nwbtn add gray_btn"><span
                                                            class="cart"></span>
                                                    Order</label>
                                            @endif
                                        @endif
                                    @endauth
                                </div>
                            @endforeach

                        </div>


                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
@section('js')
    <script>
        $('.add').click(function () {
            id = $(this).data('product_id');
            $("#product_id_input").val(id);
        });
        @if(session('order_insufficient_money'))

        $.notify("home");

        @php
            session()->forget('order_insufficient_money');
        @endphp

        @endif

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
                                <button type="submit" class="btn nwbtn">Order</button>

                            </form>


                        </section>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endauth
