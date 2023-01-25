@include('home.load')
@extends('layout.app')
@include('home.navbar')


@section('contenido')
    <style>
        body {
            overflow-y: visible;
        }

        video {
            /* override other styles to make responsive */
            width: 100% !important;
            height: auto !important;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('css/camera.css') }}"></script>

    <video id="video" onclick="takepicture()" class=" mt-1 col-12 mb-1 d-none res" width="100%"
        style="position:absolute; z-index:3;  top:-25px ; height: 100%">
    </video>

    <input type="button" id="startbutton"
        class="d-none  col-12 btn btn-primary position-absolute bottom-0 start-50 translate-middle-x" value="Take photo"
        style=" z-index:3;" />

    <div class="container-fluid" style="">

        <div class="row ">


            @if (Session::has('message'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Nice job!</strong> {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @else
            @endif
            <div class="col-md-12 col-sm-12 mx-auto  mt-1 ">


                    <form action="{{ route('form_geo_forma') }}" method="post" id="myForm">
                        @csrf

                        <span id="dir_google" class="text-muted mx-auto"></span>
                        <br>
                        <span id="dir_mts" class="text-muted mx-auto"></span>

                        <div class="input-group input-group-sm mb-1 mt-3 ">
                            <span class="input-group-text" id="basic-addon1"><i
                                    class="fa-solid fa-location-crosshairs fa-2x" class="p-2 btn btn-primary "
                                    onclick="init()"></i></span>
                            <input type="text" id="lat_lng" disabled required
                                style="text-align: center; color: rgb(214, 60, 60)" id="lat_lng" class="form-control"
                                placeholder="Lat, Lng" size="100" aria-label="Username" name="lat_lng"
                                aria-describedby="basic-addon1">

                            <input type="text" name="lat" id="lat" class="d-none">
                            @error('lat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="text" name="lng" id="lng" class="d-none" required>
                            <input type="text" name="adress" id="adress" class="d-none" required>


                        </div>


                            <p>
                                <div class="msm_ mb-2 text-danger" style="z-index: 99999;"></div>
                            </p>

                            <!--localidad-->
                            <div class="input-group input-group-sm mb-1 mt-3 ">

                                <select class="mi-selector form-select  mb-1 mi-localidad" style="width: 100%" name="cadena_ind" id="my_pharma"
                                    required>
                                    <option value="">Open this select menu</option>
                                </select>
                            </div>
                            <p>
                            <div class=" mb-2 position-absolute top-50 start-50 translate-middle text-danger">

                            </div>
                            </p>
                            <div class="input-group input-group-sm mb-1 mt-3  d-none select_nom_cadena">

                                <select class=" form-select  mb-1  mi-cadena" name="" id="select_option" required>
                                    <option selected>Open this select menu</option>
                                    <option value="cadena">CADENAS</option>
                                    <option value="independiente">INDEPENDIENTE</option>
                                </select>
                            </div>
                            <!--cadena-->
                            <div class="input-group input-group-sm mb-1 mt-3 col-12 d-none select_nom_cadena">

                                <select class="mi-selector form-select  mb-1 d-none" style="width: 100%"  name="" id="nom_cadena" required>
                                    <option value="">Open this select menu</option>
                                    @foreach ($pharma as $item)
                                        <option value="">{{ $item->cadena }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!--fin cadena-->
                            @error('nom_cadena')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                            <div class="input-group col-12 input-group-sm mb-1 mt-2 mb-2 mx-auto  d-none select_pharma">
                                <select class="mi-selector" name="pharma" id="pharma" style="width: 100%" required>
                                    <option selected>Open this select menu</option>

                                </select>
                            </div>

                            <div class="col-md-12  col-sm-12 mt-4">
                                <button type="button" onclick="camera()" style="width: 100%" id="camera_open" class="btn btn-danger "><i
                                        class="fa-solid fa-camera "></i></button>

                            </div>


                            <img src="https://www.close-upinternational.com/img/logo.svg" id="photo" style=""
                                onclick="" alt="photo"
                                class="col-12 d-none img-thumbnail rounded mx-auto    shadow-sm mb-2" width="200px"
                                height="200px">


                            <canvas id="canvas" width="100%" class="col-12 d-none"></canvas>
                            <!--
                                                        <div class="input-group input-group-sm mb-3 ">
                                                            <input type="text" id="buscar" required name="buscar" class="form-control buscar"
                                                                placeholder="search pharma" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    -->


                            <textarea class="form-control col-md-12" id="text_img" name="img" style="display: none" rows="3" required></textarea>
                            <button type="submit" style="width: 100%" class=" btn btn-sm btn-primary mt-2">update</button>
                    </form>

            </div>


        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBb3IgM-eU8HwwkzPNpIcpA1BWAdWtdaoI">
    </script>
    <script type="text/javascript" src="{{ asset('js/js_google/locations.js') }}"></script>
    <script src="{{ asset('js/form_geo/index.js') }}"></script>
    <script src="{{ asset('js/form_geo/camera.js') }}"></script>
@endsection
