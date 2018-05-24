@extends('layouts.container')
@section('title')SkyMax @endsection
@section('content')
    <div id="page-inside6" class="insd">
        <div class="top-bg"></div>
        <div class="logo">
            <a href="{{asset("assets/")}}/" target="_self">
                <img src="{{asset("assets/")}}/img/logo.png" alt="SkyMax"></a>
        </div>

        <div class="container">
            <div class="event-title">
                <h1>Processes &amp; Procedures</h1>
                <p>If there's a particular spot in your website where you can win people over, it's your About Us page.
                    Here's how to make it look good.
                </p>
            </div>

        </div>

    </div>
    <div class="contents">
        @php $i = 0; @endphp
        @foreach($items as $item)
            @if($i %2 == 0)
                <div class="container">
                    <div class="col-sm-12 col-md-12 col-lg-12 no-pd">
                        <div class="padd-all-30">
                            <div class="col-md-7 col-sm-6 col-xs-12">
                                <h2>{{$item->title_en}}</h2>
                                <p>{{$item->title_ar}}</p>
                            </div>
                            @if($item->media_type_id == 1)
                                <div class="col-md-5 col-sm-6 col-xs-12">
                                    <img src="{{$item->media}}" class="img-responsive img-thumbnail">
                                </div>
                            @else
                                <div class="col-md-6 col-xs-12 col-sm-6">
                                    <video class="abt-vid" controls autoplay name="media">
                                        <source src="{{$item->media}}" type="video/mp4">
                                    </video>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="orang-bg">
                    <div class="container">
                        <div class="col-sm-12 col-md-12 col-lg-12 no-pd">
                            <div class="padd-all-30">
                                <div class="col-md-7 col-sm-6 col-xs-12">
                                    <h2>{{$item->title_en}}</h2>
                                    <p>{{$item->title_ar}}</p>
                                </div>
                                @if($item->media_type_id == 1)
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                        <img src="{{$item->media}}" class="img-responsive img-thumbnail">
                                    </div>
                                @else
                                    <div class="col-md-6 col-xs-12 col-sm-6">
                                        <video class="abt-vid" controls autoplay name="media">
                                            <source src="{{$item->media}}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @php $i++ @endphp
        @endforeach
    </div>

@endsection