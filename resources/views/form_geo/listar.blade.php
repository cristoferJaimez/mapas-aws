@include('home.load')
@extends('layout.app')
@section('contenido')
@include('home.navbar')
    <div class="container p-3">
        <div class="container-fluid mb-3 col-md-12 col-sm-12">
            <form action="{{ route('excel.export') }}">
                @csrf
                <div class=" input-group input-group-sm mb-3">
                   <!-- <input type="search" class="form-control" id="floatingSearch" placeholder="Search">
                   -->
                </div>
                  <button class="btn btn-warning " type="submit"  title="Export all XLSX" >Export <i class="fa-solid fa-file-excel"></i></button>
                  @if(session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
                @endif
            </form>
        </div>
        <div class="row">
            <table class="table align-middle table-striped " style="font-size: 0.7em;">
                <header>
                    <tr  class="text-center">
                        <th>Cod</th>
                        <th>Name</th>
                        <th>Adress</th>
                        <th>Lat</th>
                        <th>Lng</th>
                        <th>Google Adress</th>
                        <th>img</th>
                    </tr>
                </header>
                <tbody>
                    @foreach ($lista as $item)
                        <tr>
                            <td>{{ $item->cod }}</td>
                            <td>{{ $item->name_original }}
                            <td>{{ $item->adress }}</td>
                            <td>{{ $item->lat }}</td>
                            <td>{{ $item->lng }}</td>
                            <td>{{ $item->adress_real }}</td>
                            <td class="text-center"><!----> <a href="{{$item->img}}"  data-title="{{$item->name_original}} <br> {{$item->adress_real}}"  maxWidth maxHeight alwaysShowNavOnTouchDevices="true" wrapAround="true"  data-lightbox="roadtrip">  <img src="{{$item->img}}" alt="{{$item->cod}}" class="" title="img : {{$item->cod}}" style="cursor: pointer" width="20px" height="20px"></a></td>
                        </tr>
                        <input type="text" id="img_base_64" value="{{ $item->img }}" class=" d-none">

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mx-auto mt-3" style="font-size: 0.7em;">
            {{ $lista->links() }}
        </div>

    </div>
@endsection
