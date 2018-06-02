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
                            <a class="btn dark btn-outline btn-circle btn-sm" href="{{url('admin/e_learning')}}">
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

                            <form role="form" method="post" action="{{url("/admin/e_learning")}}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="form-body">
                                    <div class="form-group form-md-line-input">
                                        <select required id="product_type_id" name="product_type_id"
                                                class="form-control">
                                            @foreach($product_types as $type)
                                                <option value="{{$type->id}}">{{$type->name_en}}</option>
                                            @endforeach
                                        </select>
                                        <label for="product_type_id">Product Type</label>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <select required id="category_id" name="category_id" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name_en}}</option>
                                            @endforeach
                                        </select>
                                        <label for="category_id">Category</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select required id="sub_category_id" name="sub_category_id"
                                                class="form-control">
                                            @foreach($sub_categories as $sub_category)
                                                <option value="{{$sub_category->id}}">{{$sub_category->name_en}}</option>
                                            @endforeach
                                        </select>
                                        <label for="sub_category_id">Sub Category</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required id="name_ar" type="text" name="name_ar"
                                               class="form-control" placeholder="name_en ">
                                        <label for="name_ar">Arabic name</label>
                                        <span class="help-block">Writing...</span>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <input required id="name_en" type="text" name="name_en"
                                               class="form-control" placeholder="name">
                                        <label for="name_en">English name</label>
                                        <span class="help-block">Writing...</span>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <textarea required id="text_ar" name="desc_ar" class="form-control"></textarea>
                                        <label for="text_ar">Arabic Description</label>
                                        <span class="help-block">Writing...</span>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <textarea required id="text_en" name="desc_en" class="form-control"></textarea>
                                        <label for="text_en">English Description</label>
                                        <span class="help-block">Writing...</span>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <input required id="price" type="number" name="price"
                                               class="form-control" placeholder="name">
                                        <label for="price">Price</label>
                                        <span class="help-block">Writing...</span>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <input required id="shipping_fees" type="number" name="shipping_fees"
                                               class="form-control" placeholder="commission">
                                        <label for="shipping_fees">Shipping fees</label>
                                        <span class="help-block">Writing...</span>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <input required id="commission" type="number" name="commission"
                                               class="form-control" placeholder="commission">
                                        <label for="commission">Commission</label>
                                        <span class="help-block">Writing...</span>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <input required id="quantity" type="number" name="quantity"
                                               class="form-control" placeholder="commission">
                                        <label for="quantity">Quantity</label>
                                        <span class="help-block">Writing...</span>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <input required id="published" type="checkbox" value="1"
                                               name="published" class="form-control">
                                        <label for="published">published</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required id="limit" type="number" name="limit"
                                               class="form-control" placeholder="limit">
                                        <label for="limit">limit</label>
                                        <span class="help-block">Writing...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required id="main_image" name="main_image" type="file" class="form-control">
                                        <label for="main_image">Main Image</label>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <input required id="video" name="video" type="file" class="form-control">
                                        <label for="main_image">Video</label>
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
        $(".e_learning").addClass("open active").css("display", "block");
    </script>
@endsection
