@extends('layout.app')

@push('head')

@endpush
@section('contenido')
   @include('home.load')
    <!--map -->


    <div id="map" class="map col-md-12">
    </div>


    @include('UTC.layout.navbar')

    <script>

    </script>
@endsection
