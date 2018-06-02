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
                            <a class="btn dark btn-outline btn-circle btn-sm" href="{{url('/admin/events')}}">
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
                                <span class="caption-subject bold uppercase"> Edit </span>
                            </div>

                        </div>
                        <div class="portlet-body form">

                            <form role="form" method="post" action="{{url("/admin/events/$item->id")}}"
                                  enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="form-body">

                                    <div class="form-group form-md-line-input">
                                        <input required type="text" name="name_ar" class="form-control"
                                               id="form_control_1" value="{{$item->name_ar}}"
                                               placeholder="name_en ">
                                        <label for="form_control_1 input-lg"> name_en arabic</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required type="text" name="name_en" class="form-control"
                                               id="form_control_1" value="{{$item->name_en}}"
                                               placeholder="name_en ">
                                        <label for="form_control_1 input-lg"> name_en english</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required id="image" name="image" type="file" class="form-control">
                                        <label for="image">image </label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required type="date" name="launch_date" class="form-control"
                                               id="form_control_1" value="{{date('Y-m-d',$item->launch_date)}}"
                                               placeholder="name_en ">
                                        <label for="form_control_1 input-lg">launch date</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required type="time" name="time_from" class="form-control"
                                               id="form_control_1" value="{{date('h:i A',$item->time_from)}}"
                                               placeholder="name_en ">
                                        <label for="form_control_1 input-lg">time from</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required type="time" name="time_to" class="form-control"
                                               id="form_control_1" value="{{date('h:i A',$item->time_to)}}"
                                               placeholder="name_en ">
                                        <label for="form_control_1 input-lg">time to</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <button type="submit" class="btn blue">Edit</button>
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
