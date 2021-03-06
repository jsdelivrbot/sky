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
                            <a class="btn dark btn-outline btn-circle btn-sm" href="{{url('/admin/sub_categories/create')}}">
                                Add
                            </a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">

                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Arabic Name</th>
                                <th>English Name</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td><img src="{{$item->image}}" width="100px" height="100px"></td>
                                    <td>{{$item->name_ar}}</td>
                                    <td>{{$item->name_en}}</td>

                                    <td>
                                        <div class="col-sm-12">
                                            <a href="{{url("admin/sub_categories/$item->id/edit")}}"
                                               class="edit-modal btn btn-warning label-sm">
                                                <span class="glyphicon glyphicon-edit"></span> Edit
                                            </a>
                                        </div>
                                        <div class="col-sm-12">

                                            <form onsubmit='return ConfirmDelete()' method="post"
                                                  action="{{url("admin/sub_categories/$item->id")}}">
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
        $(".sub_categories").addClass("open active").css("display", "block");
    </script>

@endsection
