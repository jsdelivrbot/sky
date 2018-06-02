<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset("assets/")}}/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="{{asset("assets/")}}/css/aslider.min.css">
    <link rel="stylesheet" href="{{asset("assets/")}}/css/style.css" type="text/css"/>
    <link rel="stylesheet" href="{{asset("assets/")}}/css/font-awesome.css">
    <link rel="shortcut icon" href="{{asset("assets/img/logo.png")}}">

    @yield('css')


</head>

<body>
<input type="hidden" id="csrf_token" value="{{csrf_token()}}">
<div id="site-wrapper">

    <header class="home">
        <div class="top-bar">

            <div class="container">

                <div class="col-md-8 col-sm-9 col-xs-12 no-pd">
                    <button id="primary-nav-button" type="button">Menu</button>
                    <nav id="primary-nav" class="dropdown cf">
                        <ul class="dropdown menu clearfix">
                            <li class="active"><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('/about')}}">About us</a></li>
                            <li><a href="{{url('/processes')}}">Processes &amp; Procedures</a></li>

                            <li><a href="#">Infinity</a>
                                <ul class="sub-menu">
                                    <li><a href="{{url('/infinity')}}">What’s Infinity</a></li>
                                    <li><a href="{{url('/founders')}}">Infinity Founders</a></li>
                                    <li><a href="{{url('/events')}}">Our Events</a></li>
                                </ul>
                            </li>
                            @auth
                                <li><a href="{{url('/e_learning')}}">E-Learning</a></li>
                            @endauth
                            <li><a href="{{url('/contact')}}">Contact us</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-md-4 col-sm-3 col-xs-12 no-pd text-right">
                    <ul class="toplist">
                        @guest
                            <li><a href="#squarespaceModal" data-toggle="modal"><i class="fa fa-user"></i> Login</a>
                            </li>
                        @endguest
                        @auth
                            <li>
                                <p class="white"><i class="fa fa-user"></i> Welcome, {{auth()->user()->name}}
                                    <span class="brs"><a href="#squarespaceModal-4" data-toggle="modal"><i
                                                    class="fa fa-bars"></i></a></span>
                                </p>
                            </li>
                        @endauth

                    </ul>
                </div>
            </div>
        </div>

    </header>

    <div id="app">
        @yield("content")
    </div>


    <footer>
        <div class="text-center">

            <div class="social_icons">
                <a class="btn_facebook"><i class="fa fa-facebook"></i><i class="fa fa-facebook"></i></a>
                <a class="btn_twitter"><i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a>
                <a class="btn_linkedin"><i class="fa fa-linkedin"></i><i class="fa fa-linkedin"></i></a>
                <a class="btn_odnoklassniki"><i class="fa fa-odnoklassniki"></i><i class="fa fa-odnoklassniki"></i></a>
                <a class="btn_google"><i class="fa fa-google"></i><i class="fa fa-google"></i></a>
            </div>

        </div>

        <div class="footer-area">

            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">

                        <p>Copyrights@SKYMAX.2018. <span>All Rights Reserved.</span> Powered By <a
                                    href="{{asset("assets/")}}/http://paladox.com" target="_blank">PALADOX</a></p>

                    </div>

                </div>
            </div>
        </div>

    </footer>

</div>


<!--modals-->
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
                            <div class="panel-body">
                                <h4 id="auth_message" class="color_danger text-center"></h4>
                                <div class="tab-content">

                                    <div class="tab-pane active" id="tab1">

                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">

                                                <input value="{{ old('email') }}" name="email" type="text"
                                                       class="form-control" placeholder="Email">
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

                                                <input required id="parent_id"
                                                       value="{{ old('parent_id') }}"
                                                       name="parent_id"
                                                       type="text"
                                                       class="form-control" placeholder="Upline ID">
                                            </div>

                                            <div class="form-group col-sm-6 lft">
                                                <div class="form-control" style="height: 35px;">

                                                    <label style="margin-right: 25px" class="radio-inline">
                                                        <input style="margin-top:7px" checked type="radio" value="1"
                                                               name="position">Left
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input style="margin-top:7px" type="radio" value="2"
                                                               name="position">Right
                                                    </label>

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
                                                    @foreach(\App\Country::all() as $country)
                                                        <option value="{{$country->id}}">{{$country->name_en}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 rght1">

                                                <select required id="state" class="form-control selecty"
                                                        name="state_id">

                                                    <option value="0" disabled selected>State</option>
                                                    @foreach(\App\State::all() as $state)
                                                        <option value="{{$state->id}}">{{$state->name_en}}</option>
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

                                                <input required id="national_id" maxlength="10" name="national_id"
                                                       type="text"
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

                                                <input required id="phone" maxlength="10" name="phone" type="text"
                                                       class="form-control"
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

                                                <input required id="password" maxlength="20" name="password"
                                                       type="password"
                                                       class="form-control"
                                                       placeholder="Password">
                                            </div>
                                            <div class="form-group col-md-6 rght">

                                                <input required id="password_confirmation" maxlength="20"
                                                       name="password_confirmation"
                                                       type="password" class="form-control"
                                                       placeholder="Re-Password">
                                            </div>

                                            <div class="form-group col-md-6  lft">

                                                <input required id="inside_password" maxlength="20"
                                                       name="inside_password"
                                                       type="password" class="form-control"
                                                       placeholder="Inside Password">
                                            </div>
                                            <div class="form-group col-md-6 rght">

                                                <input required id="inside_password_confirmation"
                                                       name="inside_password_confirmation" maxlength="20"
                                                       type="password"
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
<div class="modal fade" id="squarespaceModal-4" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="my-menu clearfix">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="col-md-12 col-xs-12">
                        <h3 class="menu-title">My Menu</h3>
                        <div class="clearfix"></div>
                        <div class="col-md-6 col-xs-12">
                            <ul>
                                <li><a href="#squarespaceModal-6" data-toggle="modal">Profile</a></li>
                                <li><a href="{{url("team")}}" target="_self">Team</a></li>
                                <li><a href="{{url("wallet")}}" target="_self">Wallet</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{asset("assets/")}}/{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="menu-img">
                                <img src="{{asset("assets/")}}/img/menu.jpg" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@auth
    <div class="modal fade" id="squarespaceModal-6" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="my-menu my-profile clearfix">
                        <button type="button" class="close back" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">Back</span>
                        </button>
                        <div class="col-md-12 col-xs-12">
                            <h3 class="menu-title">My Profile</h3>
                            <div class="clearfix"></div>
                            @auth
                                <div class="col-md-12 col-xs-12">
                                    <h3 class="ylw">Account Information:</h3>
                                    <p><strong>Username:</strong> <span>{{auth()->user()->user_name_en}}</span></p>
                                    <p><strong>Account ID:</strong> <span>{{auth()->user()->unique_id}}</span></p>
                                    <p><strong>E-Mail:</strong> <span>{{auth()->user()->email}}</span></p>
                                    <table class="tbl">
                                        <tr>
                                            <td><strong>Password:</strong></td>
                                            <td><p class="meterReadings"><span id="meter01" contenteditable="false"
                                                                               class="meterEdit">******</span></p></td>
                                            <td><p class="unionPencil" data-edit-target="meter01"><span
                                                            class="fa fa-pencil"></span></p></td>
                                        </tr>
                                    </table>
                                    <table class="tbl">
                                        <tr>
                                            <td><strong>Inside Password:</strong></td>
                                            <td><p class="meterReadings"><span id="meter02" contenteditable="false"
                                                                               class="meterEdit">******</span></p></td>
                                            <td><p class="unionPencil" data-edit-target="meter02"><span
                                                            class="fa fa-pencil"></span></p></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <h3 class="ylw">Account Information:</h3>
                                    <p><strong>Name:</strong> <span>{{auth()->user()->name}}</span></p>
                                    <p><strong>Address:</strong>
                                        <span>@if(auth()->user()->addresses){{auth()->user()->addresses->first()->address}}@endif</span>
                                    </p>
                                    <p><strong>Phone:</strong> <span>{{auth()->user()->phone}}</span></p>
                                    <p><strong>Date of Birth:</strong>
                                        <span>{{date('Y-m-d',auth()->user()->birth_date)}}</span>
                                    </p>
                                    <p><strong>National ID:</strong> <span>{{auth()->user()->national_id}}</span></p>

                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endauth
<div class="modal fade" id="squarespaceModal-3" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="panel panel-primary">

                            <div class="panel-body">
                                <div class="event">
                                    <h3>Event Name</h3>
                                    <div id="myCarousel" class="carousel slide nwcarsl " data-interval="6500"
                                         data-ride="carousel">

                                        <!-- Carousel indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#myCarousel" data-slide-to="1"></li>
                                            <li data-target="#myCarousel" data-slide-to="2"></li>
                                        </ol>
                                        <!-- Carousel items -->
                                        <div class="carousel-inner">
                                            <div class="active item carousel-fade">
                                                <img src="{{asset("assets/")}}/img/event.jpg" class="img-responsive">
                                            </div>
                                            <div class="item carousel-fade">
                                                <img src="{{asset("assets/")}}/img/event.jpg" class="img-responsive">
                                            </div>
                                            <div class="item carousel-fade">
                                                <img src="{{asset("assets/")}}/img/event.jpg" class="img-responsive">
                                            </div>
                                        </div>
                                        <!-- Carousel nav -->
                                        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                                            <span class="fa fa-chevron-left"></span>
                                        </a>
                                        <a class="carousel-control right" href="#myCarousel" data-slide="next">
                                            <span class="fa fa-chevron-right"></span>
                                        </a>
                                    </div>
                                    <div class="descrp">
                                        <p><strong>01/01/2018</strong></p>
                                        <p><strong>03:00 PM - 04:00 PM</strong></p>
                                        <p><strong>Sheraton, Cairo, Egypt</strong></p>
                                        <p>Selection are all the exclusive content designed by our team ilont
                                            Additionally, if you are subscribed to our Premium account, when if you are
                                            subscribed to our Premium account, when if you are if u subscribed to our
                                            Premium account subscribed to our Premium account.</p>
                                        <form>
                                            <div class="form-group">

                                                <input type="text" class="form-control" placeholder="Name">
                                            </div>
                                            <div class="form-group col-md-6  lft">

                                                <input type="text" class="form-control" placeholder="Mobile">
                                            </div>
                                            <div class="form-group col-md-6 rght">

                                                <input type="email" class="form-control" placeholder="E-mail">
                                            </div>
                                            <button class="btn nwbtn2" href="#">Request</button>
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

<div id="url" data-url="{{url('')}}"></div>
@auth
    <div id="user_id" data-user_id="{{auth()->user()->id}}"></div>
@endauth
<!--modals-->
<script src="{{asset("assets/")}}/js/jquery-3.1.0.min.js"></script>
<script src="{{asset("assets/")}}/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="{{asset("assets/")}}/js/jquery.noconflict.js" type="text/javascript"></script>
<script src="{{asset("assets/")}}/js/bootstrap.js" type="text/jscript"></script>
<script src="{{asset("assets/")}}/js/menu.js"></script>
<script src="{{asset("assets/")}}/js/edit.js"></script>
<script src="{{asset("assets/")}}/js/aslider.min.js"></script>
<script src="{{asset("assets/")}}/js/jquery.nicescroll.min.js"></script>
<script src="{{asset("assets/")}}/js/scroll.js"></script>
<script src="{{asset("assets/")}}/js/register.js"></script>
<script src="{{asset("assets/")}}/js/ajax.js"></script>
<script src="{{asset("assets/")}}/js/style.js"></script>
<script src="https://rawgit.com/notifyjs/notifyjs/master/dist/notify.js"></script>


<script>

    function submit() {
        $(this).closest('form').submit();
    }

    jQuery(document).ready(function ($) {

        $('#myCarousel').carousel({
            interval: 5000
        });

        $('#carousel-text').html($('#slide-content-0').html());

        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
            var id = this.id.substr(this.id.lastIndexOf("-") + 1);
            var id = parseInt(id);
            $('#myCarousel').carousel(id);
        });


        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
            var id = $('.item.active').data('slide-number');
            $('#carousel-text').html($('#slide-content-' + id).html());
        });
    });


</script>

<!--tabs-->
<script>

    $('.tabgroup > div').hide();
    $('.tabgroup > div:first-of-type').show();
    $('.tabs a').click(function (e) {
        e.preventDefault();
        var $this = $(this),
            tabgroup = '#' + $this.parents('.tabs').data('tabgroup'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
        others.removeClass('active');
        $this.addClass('active');
        $(tabgroup).children('div').hide();
        $(target).show();

    })

    $('.tabgroup1 > div').hide();
    $('.tabgroup1 > div:first-of-type').show();
    $('.tabs a').click(function (e) {
        e.preventDefault();
        var $this = $(this),
            tabgroup = '#' + $this.parents('.tabs').data('tabgroup1'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
        others.removeClass('active');
        $this.addClass('active');
        $(tabgroup).children('div').hide();
        $(target).show();

    })

    $('.tabgroup2 > div').hide();
    $('.tabgroup2 > div:first-of-type').show();
    $('.tabs a').click(function (e) {
        e.preventDefault();
        var $this = $(this),
            tabgroup = '#' + $this.parents('.tabs').data('tabgroup2'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
        others.removeClass('active');
        $this.addClass('active');
        $(tabgroup).children('div').hide();
        $(target).show();

    })

</script>
<!--tabs-->
<!--accordion-->
<script>
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('fa-minus-circle fa-plus-circle');
    }

    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>
<!--accordion-->

@yield('js')

</body>
</html>
