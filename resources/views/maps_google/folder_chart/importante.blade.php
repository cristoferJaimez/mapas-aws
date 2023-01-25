

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
            border: none;
            border-bottom: rgb(235, 82, 82) 1px solid;

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

<div class=" col-md-12 col-sm-12" style="z-index: 2">
    <!-- Autocomplete location search input -->


    <div class="container-fluid">
        @if (auth()->user()->fk_rol == 1 || auth()->user()->fk_rol != 3)
            <center>
                <div class="col-8 mt-2">
                    <input type="search" class="form-control form-control-sm" id="search_input" class=""
                        autofocus />
                </div>
            </center>
        @endif
        <div class="contenedor">
            <div class="div_map">
                @include('maps_google.sidebar')

            </div>
        </div>
        @if (auth()->user()->fk_rol == 1 || auth()->user()->fk_rol == 3)
            <!--tarjeta inferiro-->
            <div class="position-absolute bottom-0 start-50 translate-middle-x mb-4">
                @include('maps_google.folder_chart.info_btn')
            </div>
        @endif

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
                    <a id="responsive-menu-button2 btn" class="btn btn-sm btn-danger float-end"
                        onclick="closeGF()">
                        &times;
                    </a>

                        <img src="https://www.socialhizo.com/images/educacion/talleres/tipos_de_graficas.jpg" alt="" style="width: 80%; height: 80%;">

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
<div></div>
