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
                        <span class="caption-subject font-dark bold uppercase">banks</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <form method="post" action="{{url("admin/banks_filter")}}">
                        @csrf
                        <div class="form-group form-md-line-input col-xs-4">
                            <input name="key" placeholder="name , ID , mobile" class="form-control">

                        </div>
                        <div class="form-group form-md-line-input col-xs-3">
                            <div class="col-xs-6">
                                <div class="checkbox ">
                                    <label><input name="all" type="checkbox" value="1" >All</label>
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
                                <th>from</th>
                                <th>to</th>
                                <th>type</th>
                                <th>value</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->from_user->name}} </td>
                                    <td>{{$item->to_user->name}} </td>
                                    <td>
                                        @if($item->wallet_type_id == 1)
                                            E-PIN
                                        @else
                                            E-MONEY
                                        @endif
                                    </td>
                                    <td>{{$item->value}} </td>

                                    <td>
                                        <div class="col-sm-12">
                                            <a href="#"
                                               class="edit-modal btn btn-warning label-sm">
                                                History
                                            </a>
                                        </div>
                                    </td>
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
        $(".banks").addClass("open active").css("display", "block");
    </script>

@endsection
