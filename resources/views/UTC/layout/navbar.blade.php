<div class="text-center position-absolute top-50 start-50 buttons cargando" style="display: none" id="cargando">
    <div class="card">
        <div class="card-body">
            loading
        </div>
    </div>
</div>


<div class="position-absolute top-50 start-50 translate-middle buttons files_upload" id="files_upload"
    style="display: none;">

    <div class="mb-3">
        <input class="form-control" type="file" id="formFile">
    </div>

</div>

<div class="position-absolute top-0 end-0 buttons" style="z-index: 9999;">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="form-check form-switch" style="">
                    <label for="">
                        <div class="icono"></div>
                        <i class="fa-solid fa-eye-slash" id="fa-eye-slash"></i>
                        <input class="form-check-input view" title="Panel UTC" type="checkbox" id="view" name="view"
                            checked>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="position-absolute bottom-0 start-50 translate-middle-x  buttons " id="">
    <div class="btn-group me-2 p-2" role="group" aria-label="Second group">
        <button type="button" class="btn btn-secondary" onclick="body.webkitRequestFullscreen()">
            <i class="fa-solid fa-expand"></i></button>
        </button>
        <button type="button" class="btn btn-secondary" onclick="print()">
            <i class="fa-solid fa-print"></i>
        </button>
        <button type="files" class="btn btn-secondary tools" onclick="tools()">
            <i class="fa-solid fa-screwdriver-wrench"></i>
        </button>
        <button type="files" class="btn btn-secondary tools" onclick="toggle() ">
            <i class="fa-solid fa-users"></i>
        </button>
    </div>
</div>








<div class="position-absolute bottom-0 start-50 translate-middle-x card p-3 historial   buttons  " id="historial"
    style="display: none; width: 50em; z-index:3; " style="font-size: 0.7em">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('UTC.layout.line_tiempo')
            </div>

        </div>
    </div>

</div>



<!--panel _ 1-->
<div class="  float-end float-xxl-end float-lg-end  card p-3 buttons panel_1 " id="panel_1" style="width: 15rem">

    <div class="container">
        <div class="row">
            <div class="col-11">

                <form action="{{ url('utcmaps') }}" method="POST" id="form-search" class="mb-3">
                    @csrf

                    <label class="text-mute form-label" style="border: none; height: 20px; font-size: 0.5em">
                        <i class="fa-solid fa-magnifying-glass"></i> Buscar Persona.</label>
                    <select  type="search" class="mi-selector form-select form-select-sm search_" id="search_" name="search_" style="font-size: 0.7em"
                        placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                    </select>



                    <label class="text-mute form-label" style="font-size: 0.7em">
                        <i class="fa-solid fa-location-pin"></i> Region.</label>
                    <select class="nieve form-select form-select-sm  " multiple style="border: none; font-size: 0.5em"
                        id="nieve" name="nieve">

                        @if (Session::has('regiones'))
                        @else
                            @foreach ($regiones as $item)
                                <option value="{{ $item->co_region }}">{{ $item->region }} </option>
                            @endforeach
                        @endif

                    </select>


                    <!--msm -->
                    @if (Session::has('utc'))
                    @endif


                </form>

                <!-- result -->
                <table class=" table table-sm table-striped" style="display: none">
                    <tbody class="fs-6 text">
                        <tr class="" style="font-size: 0.7em">
                            <td># UTC</td>
                            <td>
                                <div class="num_utc"></div>
                            </td>
                        </tr>


                    </tbody>
                </table>




                <form action="" id="form-search-utc">
                    @csrf
                    <div class="">
                        <label class="text-mute form-label" style="font-size: 0.7em">
                            <i class="fa-solid fa-location-pin"></i> Departamento.</label>
                        <select class="my-select-dep form-select form-select-sm " id="my-select-dep"
                            name="my-select-dep[]" multiple style="border: none; font-size: 0.5em">


                        </select>
                    </div>



                    <div class="">
                        <label class="text-mute form-label" style="font-size: 0.7em">
                            <i class="fa-solid fa-location-pin"></i> Municipio.</label>
                        <select class="form-select form-select-sm my_select-mun" style="font-size: 0.5em;" multiple
                            id="my_select-mun" name="my_select-mun[]">

                        </select>

                    </div>

                    <div class="">
                        <label class="text-mute form-label" style="font-size: 0.7em">
                            <i class="fa-solid fa-location-pin"></i> Localidad.</label>
                        <select class="form-select form-select-sm my_select-loc " style="font-size: 0.5em;" multiple
                            id="my_select-loc" name="my_select-loc[]">

                        </select>
                    </div>

                    <div class="">
                        <label class="text-mute form-label" style="font-size: 0.7em">
                            <i class="fa-solid fa-location-pin"></i> Barrio.</label>
                        <select class="form-select form-select-sm my_select-bar " style="font-size: 0.5em;" multiple
                            id="my_select-bar" name="my_select-bar[]">

                        </select>
                    </div>

                    <div class="">
                        <label class="text-mute form-label" style="font-size: 0.7em">
                            <i class="fa-solid fa-location-pin"></i> UTC.</label>
                        <select class="form-select form-select-sm my-select-utc" multiple="multiple"
                            name="my-select-utc[]" id="my-select-utc" style="font-size: 0.5em">
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!--fin panel 1-->

<!--panel 2-->
<div class="  float-end float-xxl-end float-lg-end  card p-3 buttons panel_2 " id="panel_2"
    style="width: 15rem; display: none;">

    <div class="container" style="font-size: 0.7em">
        <div class="row text-muted text-cente">

            <ul>
                <li>
                    <div class="form-check form-switch " style="">
                        <input class="form-check-input fv" title="Fuerza de Venta" type="checkbox" id="fv" name="fv">
                        <label class="form-check-label text-muted" for="fv">Fuerza de venta</label>
                </li>
                <li>
                    <div class="form-check form-switch " style="">
                        <input class="form-check-input load_file" title="Fuerza de Venta" type="checkbox" id="load_file"
                            name="load_file">
                        <label class="form-check-label text-muted" for="load_file">Subir Archivo</label>
                    </div>
                </li>
            </ul>


        </div>

    </div>

</div>
<!--fi panel 2-->


<!--panel 3-->
<div class="  float-end float-xxl-end float-lg-end  card p-3 buttons panel_add_re" id="panel_add_re"
    style="width: 20rem; display: none;">

    <div class="container" style="font-size: 0.7em">



    </div>

</div>


<!---panel representantes-->
<div class="position-fixed top-50 start-0 translate-middle-y buttons panel_re " style="display: none; font-size: 0.8em; width: 18rem">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="card p-2">
                    <form action="" method="POST" id="form-search" class="mb-3 ">
                        @csrf

                        <label class="text-mute form-label text-center" style="">
                            <i class="fa-solid fa-flask-vial"></i>Laboratorio </label>
                        <select class="nieve form-select form-select-sm  " multiple
                            style="border: none; font-size: 0.5em " id="nieve" name="nieve">

                            @if (Session::has('regiones'))
                            @else
                                @foreach ($regiones as $item)
                                    <option value="{{ $item->co_region }}">{{ $item->region }} </option>
                                @endforeach
                            @endif

                        </select>


                        <label class="text-mute form-label mt-2 mb-2 text-center" style="">
                            <i class="fa-solid fa-users"></i> Representante en <span class="text-nowrap bd-highlight"> UTC</span></label>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-2">
                                <button type="button" class="btn btn-primary btn-circle border border-1 add_new_rep" id="add_new_rep"><i class="fa-solid fa-plus"></i>
                                </button>

                                <button type="button" class="btn btn-success btn-circle border border-1 rep_edit" id="rep_edit"><i class="fa-solid fa-pencil"></i>
                                </button>

                              </div>
                        <select class="nieve form-select form-select-sm  " multiple
                            style="border: none; font-size: 0.5em " id="nieve" name="nieve">

                            @if (Session::has('regiones'))
                            @else
                                @foreach ($regiones as $item)
                                    <option value="{{ $item->co_region }}">{{ $item->region }} </option>
                                @endforeach
                            @endif

                        </select>


                        <!--msm -->
                        @if (Session::has('utc'))
                        @endif


                    </form>
                </div>

                <div class="card p-2 mt-1">
                    <table class="table table-sm" style="font-size: 0.7em">
                        <thead>
                            <tr>
                                <th colspan="3" class="table-active text-center">Representante</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3" class="table-active text-center">Larry the Bird</td>
                            </tr>
                            <tr>
                                <th scope="row">Gerente. General</th>
                                <td colspan="2" class=" text-center">Larry the Bird</td>
                            </tr>
                            <tr>
                                <th scope="row">Gerente. Distrital</th>
                                <td colspan="2" class=" text-center">Larry the Bird</td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="" method="POST" id="form-search" class="mb-3 ">
                        @csrf


                        <!--leyenda-->
                        <ol class="list-group list-group-numbered" style="font-size: 0.7em">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Subheading</div>
                              </div>
                              <span class="badge bg-primary rounded-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Subheading</div>
                              </div>
                              <span class="badge bg-primary rounded-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Subheading</div>
                              </div>
                              <span class="badge bg-primary rounded-pill">14</span>
                            </li>


                          </ol>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
