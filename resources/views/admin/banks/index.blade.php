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
                        <span class="caption-subject font-dark bold uppercase">Banks</span>
                    </div>

                </div>


                <div class="portlet-body">


                    <form class="attireCodeToggleBlock" method="post" action="{{url("admin/banks_transfer")}}">
                        @csrf
                        <div class="form-body">

                            <div class="form-group form-md-line-input">
                                <select class="multipleSelect " multiple name="language">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group form-md-line-input">
                                <div class="col-xs-6">
                                    <label>E-PIN</label>
                                    <input class="form-control" type="number" name="e_pin">
                                    <div class="form-group form-md-line-input">
                                        <div class="col-xs-12">
                                            <label class="radio-inline pull-right">
                                                <input checked type="radio" value="2"
                                                       name="e_pin_statement">Depit
                                            </label>
                                            <label class="radio-inline pull-left">
                                                <input type="radio" value="1"
                                                       name="e_pin_statement">Credit
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <label>E-MONEY</label>
                                    <input class="form-control" type="number" name="e_money">
                                    <div class="form-group form-md-line-input">
                                        <div class="col-xs-12">
                                            <label class="radio-inline pull-right">
                                                <input checked type="radio" value="2"
                                                       name="e_money_statement">Depit
                                            </label>
                                            <label class="radio-inline pull-left">
                                                <input type="radio" value="1"
                                                       name="e_money_statment">Credit
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input text-center">

                                    <button class="btn btn-success" type="submit">Transfer</button>

                            </div>
                        </div>

                    </form>


                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Type</th>
                                <th>From / To</th>
                                <th>Value</th>
                                <th>Date / Time</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->transaction_id}}</td>
                                    <td>{{$item->wallet_type->name}}</td>
                                    <td>
                                        @if($item->wallet_type_id == 2)
                                            {{$item->transfer->from_user->name}}
                                            / {{$item->transfer->to_user->name}}
                                        @else
                                            {{$item->wallet_type->name}}
                                        @endif
                                    </td>
                                    @if($item->statement ==1)
                                        <td class="bl">
                                            +{{$item->value}}
                                        </td>
                                    @else
                                        <td class="rd">
                                            -{{$item->value}}
                                        </td>
                                    @endif
                                    <td>{{$item->created_at}}</td>
                                    <td class="blnc">{{$item->e_pin_balance}} EG</td>

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


@endsection
@section('css')
    <link rel="stylesheet" href="{{asset("assets/")}}/fastselect/dist/fastselect.min.css">
    <style>
        .fstMultipleMode .fstControls, .fstElement {
            width: 100%;
        }
    </style>
@endsection

@section('js')
    <script src="{{asset("assets/")}}/fastselect/dist/fastselect.standalone.js"></script>


    <script>
        $("#dash").removeClass("active");
        $(".banks").addClass("open active").css("display", "block");
        $('.multipleSelect').fastselect();
    </script>

@endsection
