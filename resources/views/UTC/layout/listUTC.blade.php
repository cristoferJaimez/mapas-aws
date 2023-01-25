@extends('layout.app')
@section('contenido')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('home.load')

    <div class="container ">
        <div class="row m-1">

            <div class=" mt-5 m-3">

                <table class="yajra-datatable table table-sm table-striped" style="font-size: 0.7em ">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">UTC</th>
                            <th scope="col">Area</th>
                            <th scope="col">Departament</th>
                            <th scope="col">Municipality</th>
                            <th scope="col">Locality</th>
                            <th scope="col">Neighborhood</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>


                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
                <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(e=>{
                        const datos = {!! json_encode($data) !!};

                    try {

                        $('.yajra-datatable').DataTable({

                            scrollY: 250,
                            scrollX: false,
                            data: datos.original.data,
                            language: {
                                url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-CO.json',
                            },
                            columns: [{
                                    data: 'id'
                                },
                                {
                                    data: 'co_barrio'
                                },
                                {
                                    data: 'region'
                                },
                                {
                                    data: 'departamento'
                                },
                                {
                                    data: 'municipio'
                                },

                                {
                                    data: 'localidad'
                                },
                                {
                                    data: 'desc_utc'
                                }



                            ]
                        });
                    } catch (error) {
                        console.log(console.error(error));
                    }
                    })
                </script>

            </div>
        </div>
    </div>
@endsection
