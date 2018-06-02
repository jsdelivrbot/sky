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
                        <span class="caption-subject font-dark bold uppercase">orders</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <form method="post" action="{{url("admin/products_filter")}}">
                        @csrf


                        <div class="form-group form-md-line-input col-xs-4">
                            <select name="status" class="form-control">
                                <option disabled selected value="0">select</option>
                                <option value="1">Ordered</option>
                                <option value="2">shipped</option>
                                <option value="2">dliverd</option>
                            </select>
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
                                <th>product</th>
                                <th>user</th>
                                <th>phone</th>
                                <th>address</th>
                                <th>order_status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->product->name_en}} </td>
                                    <td>{{$item->user->name}} </td>
                                    <td>{{$item->phone}} </td>
                                    <td>{{$item->address}} </td>
                                    <td>{{$item->status->name_en}} </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="text-center page-full-width">
                            {{$items->links()}}
                        </div>

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
        $(".orders").addClass("open active").css("display", "block");
    </script>

@endsection
