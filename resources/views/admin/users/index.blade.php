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
                        <span class="caption-subject font-dark bold uppercase">users</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <form method="post" action="{{url("admin/users_filter")}}">
                        @csrf
                        <div class="form-group form-md-line-input col-xs-3">
                            <select name="status" class="form-control">
                                <option value="0">select</option>
                                <option value="1">Qualified</option>
                                <option value="2">Pending</option>
                                <option value="3">Blocked</option>
                                <option value="4">Freezed</option>
                                <option value="5">Terminated</option>
                            </select>
                        </div>
                        <div class="form-group form-md-line-input col-xs-3">
                            <select name="date" class="form-control">
                                <option value="0">select</option>
                                <option value="1">New</option>
                                <option value="2">Old</option>
                            </select>
                        </div>

                        <div class="form-group form-md-line-input col-xs-3">
                            <select name="money" class="form-control">
                                <option value="0">select</option>
                                <option value="1">E-PIN</option>
                                <option value="2">E-Moner</option>
                                <option value="2">Both</option>
                            </select>
                        </div>
                        <div class="form-group form-md-line-input col-xs-2">
                            <button type="submit" class="btn btn-primary label-sm">
                                <span class="glyphicon glyphicon-search"></span>Filter
                            </button>
                        </div>
                    </form>
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Registered at</th>
                                <th>E-PIN</th>
                                <th>E-Money</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td><a href="{{url("admin/users/$item->id")}}"> {{$item->unique_id}}</a></td>
                                    <td>
                                        <a href="{{url("admin/users/$item->id")}}">{{$item->name}} {{$item->last_name}}</a>
                                    </td>
                                    <td>
                                        <a href="{{url("admin/users/$item->id")}}">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)}}</a>
                                    </td>
                                    <td><a href="{{url("admin/users/$item->id")}}">{{$item->e_pin_balance}}</a></td>
                                    <td><a href="{{url("admin/users/$item->id")}}">{{$item->e_money_balance}}</a></td>
                                    <td>

                                        <form method="post"
                                              action="{{url("admin/users/$item->id/qualified")}}">
                                            @csrf
                                            @if($item->qualified == 1)
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

                                            <form onsubmit='return ConfirmDelete()' method="post"
                                                  action="{{url("admin/users/$item->id")}}">
                                                {{ method_field('DELETE') }}
                                                @csrf
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
        $(".users").addClass("open active").css("display", "block");

        function submit() {
            $(this).closest('form').submit();
        }
    </script>

@endsection
