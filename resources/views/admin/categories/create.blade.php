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
                        <span class="caption-subject font-dark bold uppercase">categories</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn dark btn-outline btn-circle btn-sm" href="{{url('admin/categories')}}">
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

                            <form role="form" method="post" action="{{url("/admin/categories")}}"
                                  enctype="multipart/form-data">
                                @csrf


                                <div class="form-body">

                                    <div class="form-group form-md-line-input">
                                        <input required type="text" name="name" class="form-control"
                                               id="form_control_1"
                                               placeholder="name ">
                                        <label for="form_control_1 input-lg"> name</label>
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
        $(".categories").addClass("open active").css("display", "block");
    </script>
@endsection
