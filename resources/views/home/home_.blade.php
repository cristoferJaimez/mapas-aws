@extends('layout.app')
@section('contenido')
    @include('home.navbar')
    @include('home.navbutton')
    @include('home.load')
    <!--msm -->
    <style>
        .socialIcon {
            display: none;
        }

    </style>
    <div class="container" style="">
        <div class="row mt-5 ">
            <div class="col-md-1">

                <div class="position-absolute top-50 start-50   ">
                    <div class="spinner-border text-danger" id="load_" style="display: none" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">

                <div class="card  mb-3 ">
                    <div class="text-center p-2">
                        <img src="https://www.close-upinternational.com/img/logo.svg" width="100px" height="100px"
                            alt="logo" class="p-1 border   rounded-circle" />
                    </div>
                    <div class="card-body text-center">
                        @foreach ($proveedor as $provee )
                            @if ($provee->id === auth()->user()->id)
                            <h4>{{$provee->description}}</h4>
                                <img src="{{$provee->url}}" alt="" width="200px">
                            @endif
                        @endforeach


                    </div>
                </div>
            </div>

            <div class="col-md-8 col-sm-12 ">



                @foreach ($posts as $post)
                    @if ($post->user_id === auth()->user()->id)
                        <div class=" card mb-3 ">
                            <div class="card-header no-border">
                                <h5 class="card-title">{{ $post->title }}</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="widget-49">
                                    <div class="widget-49-title-wrapper">

                                        @if ($post->title === 'Flash Farmacéutico')
                                                    <div class="widget-49-date-danger">
                                                        <span class="widget-49-date-day text-danger">
                                                            <i class="fa-solid fa-bolt-lightning"></i>
                                                        </span>
                                                            <div>
                                        @elseif($post->title === 'Transferencia de Valores')
                                                    <div class="widget-49-date-success">
                                                        <span class="widget-49-date-day text-success">
                                                            <i class="fa-solid fa-dollar-sign" class="text-success"></i>
                                                        </span>
                                                            <div>
                                        @elseif($post->title === 'Informe Prescripciones')
                                                    <div class="widget-49-date-success">
                                                        <span class="widget-49-date-day text-info">
                                                            <i class="fa-solid fa-prescription"></i>
                                                        </span>
                                                    <div>
                                        @endif

                                        @if ($post->user_id === auth()->user()->id)
                                        <div class="widget-49-meeting-info">
                                            <span class="widget-49-pro-title">{{ $post->title }}</span>
                                            <span class="widget-49-meeting-time"></span>
                                            <p></p>
                                        <span class="widget-49-date-month">{{ $post->created_at }}</span>

                                        </div>

                                        </div>
                                        <ol class="widget-49-meeting-points">
                                            <!--<li class="widget-49-meeting-item"><span>descripcion</span></li>-->
                                        </ol>
                                        <div class="widget-49-meeting-action ">
                                            <a href="{{ $post->url }}" target="iframe" onclick="hide()"
                                                class="btn btn-sm btn-flash-border-success bg-success text-white"><i>View All...</i></a>
                                        </div>
                            @endif

                                    </span>
                                    <span class="widget-49-date-month"></span>
                                    </div>



            </div>
        </div>
    </div>



@endif
@endforeach
</div>

</div>



</div>
</div>

<div class="position-absolute top-50 end-0 translate-middle-y " style="margin-right: 4px;  z-index: 999999">
    <button class="btn btn-outline-primary   rounded-circle "
        style="margin: auto; text-align:center; 35px; height: 35px;" onclick="body.requestFullscreen()">
        <i class="fa-solid fa-expand"></i>
    </button>
    <br>
    <button class="btn btn-outline-danger btn_   rounded-circle "
        style="display:none; text-align:center; 35px; height: 35px;" onclick="hide_iframe()">
        <i class="fa-solid fa-circle-xmark"></i>
    </button>

</div>

<div class="position-absolute bottom-0 start-50 translate-middle-x next_prev_  d-none p-2 "
    style="display: none; z-index: 999999">
    <div class="container">
        <div class="row">

            <div class="  col-sm-12 col-md-4 ">
                <button class="btn btn-outline-primary   rounded-circle btn_prev "
                    style="margin: auto; text-align:center; 35px; height: 35px;" onclick="">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
            </div>

            <div class="  col-sm-12 col-md-4">
                @foreach ($proveedor as $pro)
                    @if ($pro->id === auth()->user()->id)
                        <img class="img-fluid " style="" src="{{ $pro->url }}" />
                    @endif
                @endforeach
            </div>

            <div class="  col-sm-12 col-md-4 text-end">
                <button class="btn btn-outline-primary   rounded-circle  btn_next"
                    style="margin: auto; text-align:center; 35px; height: 35px;" onclick="">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>


        </div>
    </div>

</div>




<iframe src="" frameborder="0" class="iframe " id="iframe" onload=""
    style="overflow: auto;position:fixed; top:60px; left:0px; bottom:0px; right:0px; width:100%; height:99%; border:none; margin:0; padding:0; overflow:hidden; z-index:999998; display: none;"
    name="iframe">

</iframe>
@endsection
