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
                        <span class="caption-subject font-dark bold uppercase">products</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group">
                            <a class="btn dark btn-outline btn-circle btn-sm" href="{{url('/admin/products/create')}}">
                                Add
                            </a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <form method="post" action="{{url("admin/products_filter")}}">
                        @csrf

                        <div class="form-group form-md-line-input col-xs-3">
                            <input type="text" name="key" class="form-control" placeholder="name">
                        </div>

                        <div class="form-group form-md-line-input col-xs-3">
                            <select name="type" class="form-control">
                                <option disabled selected value="0">select</option>
                                <option value="1">Qualified</option>
                                <option value="2">Premium</option>
                            </select>
                        </div>
                        <div class="form-group form-md-line-input col-xs-3">
                            <select name="status" class="form-control">
                                <option disabled selected value="0">select</option>
                                <option value="1">New</option>
                                <option value="2">Old</option>
                            </select>
                        </div>

                        <div class="form-group form-md-line-input col-xs-3">
                            <div class="col-xs-6">
                                <input type="number" name="from" class="form-control" placeholder="from">
                            </div>
                            <div class="col-xs-6">
                                <input type="number" name="to" class="form-control" placeholder="to">
                            </div>
                        </div>

                        <div class="form-group form-md-line-input col-xs-3">
                            <div class="col-xs-6">
                                <div class="checkbox ">
                                    <label><input name="limit" type="checkbox" value="1">reach Limit</label>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="checkbox ">
                                    <label><input name="published" type="checkbox" value="1">Published</label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group form-md-line-input col-xs-2">
                            <button type="submit" class="btn btn-primary label-sm">
                                <span class="glyphicon "></span>Filter
                            </button>
                        </div>
                    </form>
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Main Image</th>
                                <th>Video</th>
                                <th>category</th>
                                <th>Name</th>
                                <th>desc</th>
                                <th>price</th>
                                <th>shipping_fees</th>
                                <th>commission</th>
                                <th>quantity</th>
                                <th>product_type</th>
                                <th>published</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td><img src="{{$item->main_image}}" width="100px" height="100px"></td>
                                    <td>
                                        <video class="abt-vid" controls autoplay>
                                            <source src="{{$item->video}}" type="video/mp4">
                                        </video>
                                    </td>
                                    <td>
                                        @if($item->category)
                                            {{$item->category->name_en}} ->
                                            @if($item->sub_category)
                                                {{$item->sub_category->name_en}}
                                            @endif

                                        @endif
                                    </td>
                                    <td>{{$item->name_en}} </td>
                                    <td>{{str_limit($item->desc_en,100)}} </td>
                                    <td>{{$item->price}}  </td>
                                    <td>
                                        @if($item->product_type_id ==1)
                                            {{$item->shipping_fees}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->product_type_id ==2)
                                            {{$item->commission}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{$item->quantity}} </td>
                                    <td>{{$item->product_type->name_en}} </td>
                                    <td>
                                        <form method="post"
                                              action="{{url("admin/users/$item->id/qualified")}}">
                                            @csrf
                                            @if($item->published == 1)
                                                <input onclick="submit()" checked type="checkbox" class="glyphicon">
                                                <br/>
                                                <a href="{{url("admin/users/$item->id")}}">Qualified</a>
                                            @else
                                                <input onclick="submit()" type="checkbox" class="glyphicon"><br/>
                                                <a href="{{url("admin/users/$item->id")}}">Not Qualified</a>
                                            @endif

                                        </form>
                                    </td>
                                    <td>
                                        <div class="col-sm-12">
                                            <a href="{{url("admin/products/$item->id/images")}}"
                                               class="edit-modal btn btn-success label-sm">
                                                <span class="glyphicon glyphicon-img"></span> Images
                                            </a>
                                        </div>
                                        <div class="col-sm-12">
                                            <a href="{{url("admin/products/$item->id/edit")}}"
                                               class="edit-modal btn btn-warning label-sm">
                                                <span class="glyphicon glyphicon-edit"></span> Edit
                                            </a>
                                        </div>
                                        <div class="col-sm-12">

                                            <form onsubmit='return ConfirmDelete()' method="post"
                                                  action="{{url("admin/products/$item->id")}}">
                                                {{ method_field('DELETE') }}
                                                {{csrf_field()}}
                                                <button type="submit" class="delete-modal btn btn-danger label-sm">
                                                    <span class="glyphicon glyphicon-trash"></span>Delete
                                                </button>

                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="text-center page-full-width">
                        {{$items->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->

    </div>
    <!-- END CONTENT -->
    <script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>

    <script>
        $("#dash").removeClass("active");
        $(".products").addClass("open active").css("display", "block");
    </script>

@endsection
