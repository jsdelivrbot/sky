@extends('layouts.admin_container')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-bubble font-dark"></i>
                        <span class="caption-subject font-dark bold uppercase">events</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn dark btn-outline btn-circle btn-sm" href="{{url('admin/events')}}">
                                Back
                            </a>
                        </div>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-user font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> Add </span>
                            </div>

                        </div>
                        <div class="portlet-body form">

                            <form role="form" method="post" action="{{url("/admin/events")}}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="form-body">

                                    <div class="form-group form-md-line-input">
                                        <input required type="text" name="name_ar" class="form-control"
                                               id="form_control_1"
                                               placeholder="name_en ">
                                        <label for="form_control_1 input-lg"> name arabic</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required type="text" name="name_en" class="form-control"
                                               id="form_control_1"
                                               placeholder="name_en ">
                                        <label for="form_control_1 input-lg"> name english</label>
                                        <span class="help-block">Writing...</span>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <select required id="country_id" name="country_id" class="form-control">
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name_en}}</option>
                                            @endforeach
                                        </select>
                                        <label for="country_id"> Category </label>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <select id="city_id" name="city_id" class="form-control">
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name_en}}</option>
                                            @endforeach
                                        </select>
                                        <label for="city_id">city</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required type="text" name="address" class="form-control"
                                               id="address" placeholder="name_en ">
                                        <label for="address">address</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required type="date" name="launch_date" class="form-control"
                                               id="form_control_1"
                                               placeholder="name_en ">
                                        <label for="form_control_1 input-lg"> launch date</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required type="time" name="time_from" class="form-control"
                                               id="form_control_1"
                                               placeholder="name_en ">
                                        <label for="form_control_1 input-lg">time from</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required type="time" name="time_to" class="form-control"
                                               id="form_control_1"
                                               placeholder="name_en ">
                                        <label for="form_control_1 input-lg">time to</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required id="image" name="image" type="file" class="form-control">
                                        <label for="image">image </label>
                                    </div>
                                    <button type="submit" class="btn blue">Add</button>
                                </div>

                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
    <script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>

    <script>
        $("#dash").removeClass("active");
        $(".events").addClass("open active").css("display", "block");
    </script>
@endsection
