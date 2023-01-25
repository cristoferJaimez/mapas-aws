@extends('layout.app')
@section('contenido')
        @if (auth()->user()->fk_rol === 1)
            <div class="container " >
                <div class="row">
                    <h6 class="text-muted"><i class="fa-solid fa-users"></i> List Users</h6>
                    <hr>
                    <div class="col-md-3 col-sm-12">
                        <div class="list-group list-group-flush" style="  overflow-x: hidden; overflow-y: hidden">

                            <a class=" list-group-item list-group-item-action" data-bs-toggle="modal" href="#exampleModalToggle"
                                role="button">
                                <i class="fa-solid fa-circle-plus"></i> Add Users csv
                            </a>
                            <a href="#" class="list-group-item list-group-item-action href_  " aria-current="true">
                                <i class="fa-solid fa-floppy-disk"></i> Export Users
                            </a>

                        </div>

                        <h6 class="text-center text-muted"><i class="fa-solid fa-list"></i> List System Users</h6>
                        <div class="list-group" style="overflow-x: hidden; max-height: 50%">

                            @foreach ($data_prov as $item => $it)
                                <a href="{{ url('proveedores') }}?pro={{ $it->description }}&img={{ $it->url }}&id={{ $it->id }}"
                                    id="prove_{{ $it->id }}"
                                    class="list-group-item d-flex justify-content-between align-items-center provee  "
                                    aria-current="true">
                                    <span class="text-end "><b class="text-uppercase">{{ $it->description }}</b>
                                    </span>
                                    <span class="badge  rounded-pill">
                                        <img src="{{ $it->url }}" width="45px" height="45px" class="img-fluid avatar "
                                            alt="avatar">
                                    </span>
                                </a>
                            @endforeach
                        </div>




                    </div>
                    <div class=" col-md-9  col-sm-12  " style="position: relative;">
                        <div id="contenido" class="text-center text-muted ">
                            <i class="fa-solid fa-users-rays fa-8x position-absolute top-50 start-50 translate-middle  "></i>
                            <br>
                            <i class="position-absolute top-100 start-50 translate-middle ">
                                work tables close up
                            </i>
                        </div>

                    </div>


                </div>
            </div>



            </div>
        @else
            sin permiso
        @endif


        <!--modal-->
        @include('home.modal_new_users')
    @endsection
