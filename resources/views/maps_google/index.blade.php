@extends('layout.app')
@include('home.load')
@section('contenido')
    <style>
        body {
            overflow: hidden;
        }

        ul {
            padding: 0;
            margin: 0
        }

        ul li {
            float: left;
            margin-right: 20px;
            list-style: none;
            text-decoration: none;
        }

        table {
            border: none
        }

        #card_gf {
            background: rgba(209, 209, 209, 0.493);
            position: absolute;
            overflow: auto;
        }

        #legend {
            font-family: Arial, sans-serif;
            background: #fff;
            padding: 10px;
            margin: 10px;
            border: 3px solid #000;
        }

        #legend h3 {
            margin-top: 0;
        }

        #legend img {
            vertical-align: middle;
        }
    </style>
    <div class="container-fluit">
        <div class="row">
            <div class=" col-md-12 col-sm-12" style="z-index: 2">
                <!-- Autocomplete location search input -->


                <div class="container-fluid">
                    <center>
                        <div class="col-8 mt-2">
                            <input type="search"  class="form-control form-control-sm" id="search_input"
                                class="" autofocus />
                        </div>
                    </center>
                    <div class="contenedor">
                        <div class="div_map">
                                @include('maps_google.sidebar')
                            
                        </div>
                    </div>


                </div>
                @if (auth()->user()->fk_rol == 1 || auth()->user()->fk_rol == 3)
                <!-- chart mercados mapas -->
                <div class="position-absolute top-50 start-0 translate-middle-y">
                    @include('maps_google.folder_chart.char')
                </div>

                <div class="position-absolute top-50 end-0 translate-middle-y" style="width: 15em;">
                    @include('maps_google.folder_chart.info')
                </div>

                <!--grafico-->
                <div class="position-absolute top-50 start-50 translate-middle  d-none" id="card_gf"
                    style="width: 100%; height: 100%;">
                    <div class="card " style="z-index: 99999">
                        <div class="card-body">
                            <a id="responsive-menu-button2 btn" class="btn btn-sm btn-danger float-end" onclick="closeGF()">
                                &times;
                            </a>

                        </div>
                    </div>
                </div>
                @endif



                <!--load file csv-->
                <div class="position-absolute top-50 start-50 translate-middle  d-none" id="csv_file">

                    <div class="card p-3">
                        <a id="responsive-menu-button2 btn" class="btn btn-sm btn-danger float-start" onclick="closeCSV()"
                            style="width: 7%">
                            &times;
                        </a>

                        <div class="input-group mt-3">
                            <input type="file" class="form-control">
                            <button class="btn btn-success">Upload</button>
                        </div>

                    </div>

                </div>


                <!--end-->




                <div class="card m-4 spinner-border text-danger position-absolute top-50 start-50 car_api"
                    style="z-index: 99999; display: none" role="status">
                    <span class="visually-hidden">Loading map utc...</span>
                </div>



            </div>
            <div class="col-md-12" style="z-index: 1">
                <div id="map"></div>





            </div>
        </div>
    </div>


    <script
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBb3IgM-eU8HwwkzPNpIcpA1BWAdWtdaoI">
    </script>
    <script src="{{ asset('js/google_maps.js') }}"></script>
    <script src="{{ asset('js/data_mercado/index.js') }}"></script>
@endsection
