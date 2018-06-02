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

                <div class="col-xs-12 no-pd">
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


                            @foreach($items as $item)
                                <div class="element element-in">
                                    <h3><a href="{{url("products/$item->id")}}">{{$item->name_en}}</a></h3>
                                    <video width="240" height="180" class="abt-vid" controls controlsList="nodownload"  autoplay >
                                        <source src="{{$item->video}}" type="video/mp4">
                                    </video>

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
