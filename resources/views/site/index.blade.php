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
            <div class="col-md-2 col-sm-3 col-xs-12 ">
                <div class="side-bar">
                    <form method="post" action="{{url("products")}}" id="sub_categories_form" class="buttons">

                        <div class="types">
                            <h2>Type</h2>


                            <label>
                                <input value="3" type="checkbox" name="product_type_id">
                                <span class="label-text">All</span>
                                </input>
                            </label>
                            <br/>
                            <label>
                                <input value="1" type="checkbox" name="product_type_id"> <span class="label-text">Qualified Products</span>
                                </input>
                            </label>
                            <br/>
                            <label>
                                <input value="2" type="checkbox" name="product_type_id"> <span class="label-text">Premium Products</span>
                                </input>
                            </label>

                        </div>
                        {{csrf_field()}}
                        <div class="categs">
                            <h2>Categories</h2>

                            <div id="categories_form" class="buttons">
                                @foreach($categories as $category)
                                    <label>
                                        <input name="category_id[]" class="category" onchange="getSubCategories()"
                                               type="checkbox" value="{{$category->id}}">
                                        <span class="label-text">{{$category->name}}</span>
                                    </label>
                                    <br/>
                                @endforeach

                            </div>
                        </div>

                        <div class="sub_categs">

                            <h2>Sub Categories</h2>


                            <div id="sub_categories_container">
                                <label>

                                </label>
                                <br/>
                            </div>


                        </div>
                        @if(count($categories->all())>0)
                            <button type="submit" class="btn btn-custom-3">Search</button>
                        @endif
                    </form>

                </div>


            </div>

            <div class="col-md-10 col-sm-9 col-xs-12 no-pd">
                <div class="prdct-box clearfix">
                    <div id="filter" class="clearfix ">

                        <div class="col-md-7 col-sm-6 col-xs-12 no-pd1">
                            <div class="filter-container">
                                <form method="post" action="{{url("products/search")}}" id="register-newsletter">
                                    @csrf
                                    <input type="text" name="key" required placeholder="What Do You Want?">
                                    <button type="submit" class="btn btn-custom-3">Search</button>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-5 col-sm-6 col-xs-12 no-pd1">

                            <form method="post" action="{{url("products/filter")}}" class="myform">
                                @csrf
                                <label>Price:</label>
                                <input name="from" type="text" placeholder="From">

                                <input name="to" type="text" placeholder="To">
                                <button type="submit" class="btn btn-custom-3">Filter</button>

                            </form>

                        </div>

                    </div>

                    <div id="products_container" class="list clearfix">


                        @foreach($products as $product)
                            <div class="element element-in">
                                <h3><a href="{{url("products/$product->id")}}">{{$product->name}}</a></h3>
                                <a href="{{url("products/$product->id")}}"><img
                                            src="{{$product->main_image}}" class="img-responsive"/></a>
                                <p style="word-break: break-word">
                                    {{substr($product->desc,0,120)}}
                                </p>
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
                                        <a class="btn btn-form nwbtn add"><span class="cart"></span> Order</a>
                                    @else

                                        @if($product->product_type_id == 1)
                                            <form method="post" action="{{url('order')}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <button type="submit" class="btn btn-form nwbtn add"><span
                                                            class="cart"></span> Order
                                                </button>
                                            </form>
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

        </div>
    </div>

@endsection


