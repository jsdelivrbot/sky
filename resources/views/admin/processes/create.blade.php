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
                        <span class="caption-subject font-dark bold uppercase">processes</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn dark btn-outline btn-circle btn-sm" href="{{url('admin/processes')}}">
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

                            <form role="form" method="post" action="{{url("/admin/processes")}}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="form-body">

                                    <div class="form-group form-md-line-input">
                                        <input required type="text" name="title_ar" class="form-control"
                                               id="form_control_1"
                                               placeholder="name ">
                                        <label for="form_control_1 input-lg"> Title arabic</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required type="text" name="title_en" class="form-control"
                                               id="form_control_1"
                                               placeholder="name ">
                                        <label for="form_control_1 input-lg"> Title english</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <textarea required id="text_en" name="text_en" class="form-control"></textarea>
                                        <label for="text_en"> Text english</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <textarea required id="text_ar" name="text_ar" class="form-control"></textarea>
                                        <label for="text_ar"> Text english</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <label for="media_type">Image</label>
                                        <input required id="media_type" name="media_type_id" type="radio" checked value="1" >

                                        <input required id="media_type" name="media_type_id" type="radio"  value="2" >
                                        <label for="media_type">Video</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required id="media" name="media" type="file" class="form-control">
                                        <label for="media">Media File</label>
                                        <span class="help-block">Writing...</span>
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
        $(".processes").addClass("open active").css("display", "block");
    </script>
@endsection
