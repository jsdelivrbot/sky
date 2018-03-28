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
                        <span class="caption-subject font-dark bold uppercase">الخدمات</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn dark btn-outline btn-circle btn-sm" href="{{url('/services')}}">
                                رجوع
                            </a>
                        </div>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-user font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> تعديل </span>
                            </div>

                        </div>
                        <div class="portlet-body form">

                            <form role="form" method="post" action="{{url("/services/$item->id")}}"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                {{ method_field('PUT') }}

                                <div class="form-body">

                                    <div class="form-group form-md-line-input">
                                        <select id="city" required name="city_id" class="form-control">
                                            @foreach($types as $type)
                                                <option @if($item->service_type_id == $type->id) selected
                                                        @endif value="{{$type->id}}">
                                                    {{$type->type_ar}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="city">نوع الخدمة </label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input id="name_ar" value="{{$item->name_ar}}" type="text" name="name_ar"
                                               class="form-control">
                                        <label for="name_ar">الاسم عربى </label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input id="name_en" value="{{$item->name_en}}" type="text" name="name_en"
                                               class="form-control">
                                        <label for="name_en">الاسم إنجليزى </label>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <textarea id="description_ar" required name="description_ar"
                                                  class="form-control">{{$item->description_ar}}</textarea>
                                        <label for="description_ar"> الوصف عربى</label>
                                        <span class="help-block">تتم الكتابة...</span>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <textarea id="description_en" required name="description_en"
                                                  class="form-control">{{$item->description_en}}</textarea>
                                        <label for="description_en"> الوصف إنجليزى</label>
                                        <span class="help-block">تتم الكتابة...</span>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <textarea id="address" required name="address"
                                                  class="form-control">{{$item->address}}</textarea>
                                        <label for="address"> العنوان</label>
                                        <span class="help-block">تتم الكتابة...</span>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <input required type="number" step="0.01" name="price" class="form-control"
                                               id="form_control_1" value="{{$item->price}}"
                                               placeholder="السعر ">
                                        <label for="form_control_1 input-lg"> السعر</label>
                                        <span class="help-block">تتم الكتابة...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input required type="number" name="mobile" class="input-lg form-control"
                                               id="form_control_1" value="{{$item->mobile}}"
                                               placeholder="الهاتف ">
                                        <label for="form_control_1 input-lg"> الهاتف</label>
                                        <span class="help-block">تتم الكتابة...</span>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input id="exp_years" required type="number" name="exp_years"  value="{{$item->exp_years}}"
                                               class="form-control input-lg" placeholder="سنوات الخبرة ">
                                        <label for="exp_years"> سنوات الخبرة</label>
                                        <span class="help-block">تتم الكتابة...</span>
                                    </div>

                                    <button type="submit" class="btn blue">تعديل</button>
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
        $(".services_list").addClass("open active").css("display", "block");
        $(".services").addClass("open active").css("display", "block");
    </script>
@endsection
