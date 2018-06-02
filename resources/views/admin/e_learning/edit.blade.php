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
                        <span class="caption-subject font-dark bold uppercase">e_learning</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn dark btn-outline btn-circle btn-sm" href="{{url('/admin/e_learning')}}">
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

                            <form role="form" method="post" action="{{url("/admin/e_learning/$item->id")}}"
                                  enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="form-body">

                                    <div class="form-group form-md-line-input">
                                        <input required type="text" name="title_ar" class="form-control"
                                               id="form_control_1" value="{{$item->title_ar}}"
                                               placeholder="name_en ">
                                        <label for="form_control_1 input-lg"> Title arabic</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required type="text" name="title_en" class="form-control"
                                               id="form_control_1" value="{{$item->title_en}}"
                                               placeholder="name_en ">
                                        <label for="form_control_1 input-lg"> Title english</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <textarea required id="desc_en" name="desc_en"
                                                  class="form-control">{{$item->desc_en}}</textarea>
                                        <label for="desc_en"> Text english</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <textarea required id="desc_ar" name="desc_ar"
                                                  class="form-control"> {{$item->desc_ar}}</textarea>
                                        <label for="desc_ar"> Text english</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required id="media" name="video" type="file" class="form-control">
                                        <label for="media"> Video </label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required id="thumb" name="thumb" type="file" class="form-control">
                                        <label for="thumb"> Thumb </label>
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
        $(".e_learning").addClass("open active").css("display", "block");
    </script>
@endsection
