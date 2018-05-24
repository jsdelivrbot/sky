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
                                <select required class="multipleSelect " multiple name="language">
                                   @php $i =0; @endphp
                                    @foreach($users as $user)
                                        <option @if($i==0) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                                        @php $i++; @endphp
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group form-md-line-input">
                                <input type="number" name="e_pin" class="form-control"
                                       id="form_control_1"
                                       placeholder="E-PIN">
                                <span class="help-block">Writing...</span>
                            </div>

                            <div class="form-group form-md-line-input">
                                <input type="radio" name="e_pin_statement" value="2"
                                       id="form_control_1">
                                <label for="form_control_1 input-lg">Depit</label>

                                <input type="radio" name="e_pin_statement" value="1"
                                       id="form_control_1">
                                <label for="form_control_1 input-lg">Credit</label>
                            </div>


                            <div class="form-group form-md-line-input">
                                <input type="number" name="e_money" class="form-control"
                                       id="form_control_1"
                                       placeholder="E-MONEY">
                                <span class="help-block">Writing...</span>
                            </div>

                            <div class="form-group form-md-line-input">
                                <input type="radio" name="e_money_statement" value="2"
                                       id="form_control_1">
                                <label for="form_control_1 input-lg">Depit</label>

                                <input type="radio" name="e_money_statement" value="1"
                                       id="form_control_1">
                                <label for="form_control_1 input-lg">Credit</label>
                            </div>


                            <button class="btn btn-success" type="submit">Transfer</button>

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
                                <th>Balance</th>

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
