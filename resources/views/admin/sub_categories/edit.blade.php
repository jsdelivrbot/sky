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
                        <span class="caption-subject font-dark bold uppercase">sub_categories</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn dark btn-outline btn-circle btn-sm" href="{{url('/admin/sub_categories')}}">
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

                            <form role="form" method="post" action="{{url("/admin/sub_categories/$item->id")}}"
                                  enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="form-body">

                                    <div class="form-group form-md-line-input">
                                        <select required id="category_id" name="category_id" class="form-control">
                                            @foreach($categories as $category)
                                                <option @if($item->category_id == $category->id) selected @endif
                                                value="{{$category->id}}">{{$category->name_en}}</option>
                                            @endforeach
                                        </select>
                                        <label for="category_id"> Category </label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required type="text" name="name_en" class="form-control"
                                               id="name_en" placeholder="English name " value="{{$item->name_en}}">
                                        <label for="name_en"> English name</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required type="text" name="name_ar" class="form-control"
                                               id="name_ar" placeholder="Arabic name" value="{{$item->name_ar}}">
                                        <label for="name_ar"> Arabic name</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required id="image" name="image" type="file" class="form-control">
                                        <label for="image">Image</label>
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
        $(".sub_categories").addClass("open active").css("display", "block");
    </script>
@endsection
