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
                            <a class="btn dark btn-outline btn-circle btn-sm" href="{{url('/admin/processes/create')}}">
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
                                <th>title</th>
                                <th>text</th>
                                <th>media</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->title_en}} </td>
                                    <td>{{$item->text_en}} </td>
                                    <td>
                                        @if($item->media_type_id == 1)
                                            <div class="col-xs-12">
                                                <img src="{{$item->media}}" class="img-responsive img-thumbnail">
                                            </div>
                                        @else
                                            <div class="col-xs-12">
                                                <video class="abt-vid" controls autoplay name="media">
                                                    <source src="{{$item->media}}" type="video/mp4">
                                                </video>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="col-sm-12">
                                            <a href="{{url("admin/processes/$item->id/edit")}}"
                                               class="edit-modal btn btn-warning label-sm">
                                                <span class="glyphicon glyphicon-edit"></span> Edit
                                            </a>
                                        </div>
                                        <div class="col-sm-12">

                                            <form onsubmit='return ConfirmDelete()' method="post"
                                                  action="{{url("admin/processes/$item->id")}}">
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
                </div>
                <div class="text-center page-full-width">
                    {{$items->links()}}
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->

    </div>
    <!-- END CONTENT -->
    <script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>

    <script>
        $("#dash").removeClass("active");
        $(".processes").addClass("open active").css("display", "block");
    </script>

@endsection
