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
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-11 col-xs-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <ul class="nav panel-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab">Login</a></li>
                                    <li><a href="#tab2" data-toggle="tab">Register</a></li>

                                </ul>
                            </div>
                            <div class="panel-body" style="max-height: 600px;overflow-y: scroll">
                                <h4 id="auth_message" class="color_danger text-center"></h4>
                                <div class="tab-content">

                                    <div class="tab-pane active" id="tab1">

                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">

                                                <input value="{{ old('user_name') }}" name="user_name" type="text"
                                                       class="form-control" placeholder="User Name">
                                            </div>
                                            <div class="form-group">

                                                <input name="password" type="password" class="form-control"
                                                       placeholder="Password">

                                            </div>

                                            <div class="checkbox">
                                                <label class="chk">
                                                    <input name="remember"
                                                           {{ old('remember') ? 'checked' : '' }} type="checkbox">
                                                    Remember Me
                                                </label>
                                            </div>
                                            <div class="form-group">
                                            </div>
                                            <button type="submit" class="btn nwbtn">Sign in</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tab2">

                                        <form id="register_form" method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="form-group col-sm-6 lft">

                                                <input required id="parent_id" value="{{ old('parent_id') }}"
                                                       name="parent_id"
                                                       type="text"
                                                       class="form-control" placeholder="Upline ID">
                                            </div>

                                            <div class="form-group col-sm-6 lft">
                                                <div class="form-control" style="height: 35px;">
                                                    <div class="pull-left">
                                                        <label for="position">Left</label>
                                                        <input checked required value="1" name="position"
                                                               type="radio">

                                                    </div>
                                                    <div class="pull-right">
                                                        <label for="position">Right</label>
                                                        <input required value="2" id="position" name="position"
                                                               type="radio">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group col-md-4  lft">

                                                <input required id="name" value="{{ old('name') }}" name="name"
                                                       type="text"
                                                       class="form-control" placeholder="First Name">
                                            </div>
                                            <div class="form-group col-md-4 rght1">

                                                <input required id="middle_name" value="{{ old('mid_name') }}"
                                                       name="middle_name"
                                                       type="text"
                                                       class="form-control" placeholder="Middle Name">
                                            </div>
                                            <div class="form-group col-md-4  rght">

                                                <input required id="last_name" value="{{ old('last_name') }}"
                                                       name="last_name"
                                                       type="text"
                                                       class="form-control" placeholder="Last Name">
                                            </div>

                                            <div class="form-group col-md-4  lft">

                                                <select required id="country" class="form-control selecty"
                                                        name="country">
                                                    <option value="0" disabled selected>Country</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 rght1">

                                                <select required id="state" class="form-control selecty"
                                                        name="state_id">

                                                    <option value="0" disabled selected>State</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4  rght">

                                                <input required id="city" name="city" type="text" class="form-control"
                                                       placeholder="city">
                                            </div>

                                            <div class="form-group nw-pd">

                                                <input required id="address" name="address" type="text"
                                                       class="form-control"
                                                       placeholder="Address">
                                            </div>

                                            <div class="form-group col-md-6  lft">

                                                <input required id="national_id" name="national_id" type="text"
                                                       class="form-control"
                                                       placeholder="National ID">
                                            </div>
                                            <div class="form-group col-md-6 rght">

                                                <input required style="line-height: 1" name="birth_date" type="date"
                                                       class="form-control"
                                                       id="datepicker"
                                                       placeholder="Date of birth">
                                            </div>

                                            <div class="form-group col-md-6  lft">

                                                <input required id="phone" name="phone" type="text" class="form-control"
                                                       placeholder="Phone">
                                            </div>
                                            <div class="form-group col-md-6 rght">

                                                <input required id="email" name="email" type="email"
                                                       class="form-control"
                                                       placeholder="E-mail">
                                            </div>

                                            <div class="form-group col-md-6  lft">

                                                <input required id="user_name" name="user_name" type="text"
                                                       class="form-control"
                                                       placeholder="Username">
                                            </div>
                                            <div class="form-group col-md-6 rght">

                                                <input required id="beneficiary" name="beneficiary" type="text"
                                                       class="form-control"
                                                       placeholder="Beneficiary">
                                            </div>

                                            <div class="form-group col-md-6  lft">

                                                <input required id="password" name="password" type="password"
                                                       class="form-control"
                                                       placeholder="Password">
                                            </div>
                                            <div class="form-group col-md-6 rght">

                                                <input required id="password_confirmation" name="password_confirmation"
                                                       type="password" class="form-control"
                                                       placeholder="Re-Password">
                                            </div>

                                            <div class="form-group col-md-6  lft">

                                                <input required id="inside_password" name="inside_password"
                                                       type="password" class="form-control"
                                                       placeholder="Inside Password">
                                            </div>
                                            <div class="form-group col-md-6 rght">

                                                <input required id="inside_password_confirmation"
                                                       name="inside_password_confirmation" type="password"
                                                       class="form-control"
                                                       placeholder="Re-Inside Password">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="checkbox">
                                                <label class="chk">
                                                    <input id="terms" type="checkbox"> I accept the <a href="#"
                                                                                                       target="_self">Terms
                                                        of Use.</a>
                                                </label>
                                            </div>
                                            <button id="submit_btn" type="submit" class="btn nwbtn">Sign up</button>
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


