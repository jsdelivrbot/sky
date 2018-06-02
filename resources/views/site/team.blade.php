@extends('layouts.container')
@section('title')SkyMax @endsection
@section('css')
    <link rel="stylesheet" href="{{asset("assets/")}}/css/tree.css">
    <link rel="stylesheet" href="{{asset("assets/")}}/css/main.css">
@endsection
@section('content')
    <div id="page-inside4" class="insd ">
        <div class="top-bg"></div>

        <div class="logo">
            <a href="{{url('/')}}" target="_self">
                <img src="{{asset("assets/")}}/img/logo.png" alt="SkyMax"></a>
        </div>

        <div class="team-bg"></div>


    </div>
    <div class="contents">
        <div class="tm-tp-br">
            <div class="container-fluid">
                <div class="col-sm-12 col-md-12 no-pd ">

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <ul class="cl-map">
                            <li class="gry"><i class="fa fa-circle"></i> Not Qualified</li>
                            <li class="blck"><i class="fa fa-circle"></i> Qualified</li>

                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-5 col-xs-12 pull-right">
                        <div id="srch">
                            <div class="search-bar">
                                <form action="{{url("search_user_id")}}" method="post" class="icon">
                                    @csrf
                                    <input name="unique_id" type="text" placeholder="Search for user by ID">
                                    <input type="submit" value="Search">

                                </form>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="orgchrt">
            <div class="container">
                <div class="col-md-10 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                    <div class="col-md-5 col-xs-12 col-sm-6 text-center no-pd">
                        <h3>Total Left = <span>{{$left}} IR’s</span></h3>
                        <h3>Qualified = <span>{{$left_qualified}} IR’s</span></h3>
                    </div>

                    <div class="col-md-5 col-xs-12 col-sm-6 text-center no-pd">
                        <h3>Total Right = <span>{{$right}} IR’s</span></h3>
                        <h3>Qualified = <span>{{$right_qualified}} IR’s</span></h3>
                    </div>

                </div>
                <div class="col-xs-12 ">

                    <section class="management-hierarchy">

                        <div class="hv-container">
                            <div class="hv-wrapper">

                                <!-- Key component -->
                                <div class="hv-item">

                                    <div class="hv-item-parent">
                                        <div class="person">
                                            <img src="https://pbs.twimg.com/profile_images/762654833455366144/QqQhkuK5.jpg"
                                                 alt="">
                                            <p class="name">
                                                {{$user->name_en}}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="hv-item-children">
                                        @if($user->LeftDownLine and  $user->RightDownLine)
                                            <div class="hv-item-child">
                                                <!-- Key component -->
                                                <div class="hv-item">

                                                    <div class="hv-item-parent">
                                                        <div class="person"
                                                             data-unique_id="{{$user->LeftDownLine->unique_id}}">
                                                            <img src="https://randomuser.me/api/portraits/men/3.jpg"
                                                                 alt="">
                                                            <p class="name">
                                                                {{$user->LeftDownLine->name_en}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="hv-item-children">

                                                        <div class="hv-item-child">
                                                            <!-- Key component -->
                                                            <div class="hv-item">

                                                                <div class="hv-item-parent">

                                                                    <div class="circle">
                                                                        <h4><a class="add" href="#squarespaceModal-7"
                                                                               data-toggle="modal"
                                                                               data-unique_id="{{$user->unique_id}}"
                                                                               data-position="1"><i
                                                                                        class="fa fa-plus"></i></a>
                                                                        </h4>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="hv-item-child">
                                                            <!-- Key component -->
                                                            <div class="hv-item">

                                                                <div class="hv-item-parent">

                                                                    <div class="circle">
                                                                        <h4><a class="add" href="#squarespaceModal-7"
                                                                               data-toggle="modal"
                                                                               data-unique_id="{{$user->unique_id}}"
                                                                               data-position="2"><i
                                                                                        class="fa fa-plus"></i>
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hv-item-child">
                                                <!-- Key component -->
                                                <div class="hv-item">

                                                    <div class="hv-item-parent">
                                                        <div class="person"
                                                             data-unique_id="{{$user->RightDownLine->unique_id}}">
                                                            <img src="https://randomuser.me/api/portraits/men/3.jpg"
                                                                 alt="">
                                                            <p class="name">
                                                                {{$user->RightDownLine->name_en}}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="hv-item-children">

                                                        <div class="hv-item-child">
                                                            <!-- Key component -->
                                                            <div class="hv-item">

                                                                <div class="hv-item-parent">

                                                                    <div class="circle">
                                                                        <h4><a class="add" href="#squarespaceModal-7"
                                                                               data-toggle="modal"
                                                                               data-unique_id="{{$user->unique_id}}"
                                                                               data-position="1"><i
                                                                                        class="fa fa-plus"></i></a>
                                                                        </h4>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="hv-item-child">
                                                            <!-- Key component -->
                                                            <div class="hv-item">

                                                                <div class="hv-item-parent">

                                                                    <div class="circle">
                                                                        <h4><a class="add" href="#squarespaceModal-7"
                                                                               data-toggle="modal"
                                                                               data-unique_id="{{$user->unique_id}}"
                                                                               data-position="2"><i
                                                                                        class="fa fa-plus"></i>
                                                                            </a>
                                                                        </h4>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        @elseif($user->LeftDownLine)
                                            <div class="hv-item-child">
                                                <!-- Key component -->
                                                <div class="hv-item">

                                                    <div class="hv-item-parent">
                                                        <div class="person">
                                                            <img src="https://randomuser.me/api/portraits/men/3.jpg"
                                                                 alt="">
                                                            <p class="name">
                                                                {{$user->LeftDownLine->name_en}}
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="hv-item-child">
                                                <!-- Key component -->
                                                <div class="hv-item">

                                                    <div class="hv-item-parent">
                                                        <div class="circle">
                                                            <h4><a class="add" href="#squarespaceModal-7"
                                                                   data-toggle="modal"
                                                                   data-unique_id="{{$user->LeftDownLine->unique_id}}"
                                                                   data-position="2"><i
                                                                            class="fa fa-plus"></i>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @elseif($user->RightDownLine)
                                            <div class="hv-item-child">
                                                <!-- Key component -->
                                                <div class="hv-item">

                                                    <div class="hv-item-parent">
                                                        <div class="circle">
                                                            <h4><a class="add" href="#squarespaceModal-7"
                                                                   data-toggle="modal"
                                                                   data-unique_id="{{$user->RightDownLine->unique_id}}"
                                                                   data-position="1"><i
                                                                            class="fa fa-plus"></i>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="hv-item-child">
                                                <!-- Key component -->
                                                <div class="hv-item">

                                                    <div class="hv-item-parent">
                                                        <div class="person">
                                                            <img src="https://randomuser.me/api/portraits/men/3.jpg"
                                                                 alt="">
                                                            <p class="name">
                                                                {{$user->RightDownLine->name_en}}
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endif

                                    </div>

                                </div>

                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>

    </div>

@endsection
<div class="modal fade" id="squarespaceModal-7" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mymodal mdl">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body ">
                <div class="wrapper">


                    <section id="first-tab-group" class="tabgroup">
                        <div id="tab1">
                            <form class="register_form" method="POST" action="{{ url('addDownLine') }}">
                                @csrf

                                <input id="position_input" type="hidden" name="position_input" value="">
                                <input id="parent_id_input" type="hidden" name="parent_id_input" value="">

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
                                            <option value="{{$country->id}}">{{$country->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4 rght1">

                                    <select required id="state" class="form-control selecty"
                                            name="state_id">

                                        <option value="0" disabled selected>State</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name_en}}</option>
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
                                <button type="submit" class="btn nwbtn4">Sign up</button>
                            </form>

                        </div>


                    </section>
                </div>


            </div>
        </div>
    </div>
</div>
@section('js')
    <script>
        $(document).on('click', '.person', function (event) {

            unique_id = $(this).data('unique_id');
            obj = $(this);
            $.post("ajax/getDownLines",
                {
                    unique_id: unique_id
                },
                function (data, status) {
                    if (data.RightDownLine && data.LeftDownLine) {
                        obj.parent().parent().append(
                            '<div class="hv-item-children"></div> '
                        ).find('.hv-item-children')
                            .append(
                                '<div class="hv-item-child">' +
                                '<div class="hv-item">' +
                                '<div class="hv-item-parent">' +
                                '<div class="person" data-unique_id="' + data.LeftDownLine.unique_id + '" >' +
                                '<img src="https://randomuser.me/api/portraits/men/3.jpg">' +
                                '<p class="name">' + data.LeftDownLine.name_en + '</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                            ).append(
                            '<div class="hv-item-child">' +
                            '<div class="hv-item">' +
                            '<div class="hv-item-parent">' +
                            '<div class="person"  data-unique_id="' + data.RightDownLine.unique_id + '" >' +
                            '<img src="https://randomuser.me/api/portraits/men/3.jpg">' +
                            '<p class="name">' + data.RightDownLine.name_en + '</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                        );

                    }
                    else {
                        if (data.RightDownLine) {
                            obj.parent().parent().append(
                                '<div class="hv-item-children"></div> '
                            ).find('.hv-item-children')
                                .append(
                                    '<div class="hv-item-child">' +
                                    '<div class="hv-item">' +
                                    '<div class="hv-item-parent">' +
                                    '<div class="person" >' +
                                    '<img src="https://randomuser.me/api/portraits/men/3.jpg">' +
                                    '<p class="name">+</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>'
                                ).append(
                                '<div class="hv-item-child">' +
                                '<div class="hv-item">' +
                                '<div class="hv-item-parent">' +
                                '<div class="person"  data-unique_id="' + data.RightDownLine.unique_id + '" >' +
                                '<img src="https://randomuser.me/api/portraits/men/3.jpg">' +
                                '<p class="name">' + data.RightDownLine.name_en + '</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                        else if (data.LeftDownLine) {
                            obj.parent().parent().append(
                                '<div class="hv-item-children"></div> '
                            ).find('.hv-item-children')
                                .append(
                                    '<div class="hv-item-child">' +
                                    '<div class="hv-item">' +
                                    '<div class="hv-item-parent">' +
                                    '<div class="person" data-unique_id="' + data.LeftDownLine.unique_id + '" >' +
                                    '<img src="https://randomuser.me/api/portraits/men/3.jpg">' +
                                    '<p class="name">' + data.LeftDownLine.name_en + '</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>'
                                ).append(
                                '<div class="hv-item-child">' +
                                '<div class="hv-item">' +
                                '<div class="hv-item-parent">' +
                                '<div class="person" >' +
                                '<img src="https://randomuser.me/api/portraits/men/3.jpg">' +
                                '<p class="name">+</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                        else {
                            obj.parent().parent().append(
                                '<div class="hv-item-children"></div> '
                            ).find('.hv-item-children')
                                .append(
                                    '<div class="hv-item-child">' +
                                    '<div class="hv-item">' +
                                    '<div class="hv-item-parent">' +
                                    '<div class="person" >' +
                                    '<img src="https://randomuser.me/api/portraits/men/3.jpg">' +
                                    '<p class="name">+</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>'
                                ).append(
                                '<div class="hv-item-child">' +
                                '<div class="hv-item">' +
                                '<div class="hv-item-parent">' +
                                '<div class="person" >' +
                                '<img src="https://randomuser.me/api/portraits/men/3.jpg">' +
                                '<p class="name">+</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                    }
                });

        });
    </script>

    <script>
        $('#squarespaceModal').empty();
        $('.add').click(function () {

            unique_id = $(this).data('unique_id');
            position = $(this).data('position');

            $("#parent_id_input").val(unique_id);
            $("#position_input").val(position);
        })

    </script>
@endsection