@extends('layout.app')
@section('contenido')
    @include('home.navbar')
    @include('home.navbutton')

    @foreach ($user as $usu)
        @if ($usu->id === auth()->user()->id)
            <div class="container">
                <div class="row mt-4 m-2">
                    <div class="card col-md-3 col-sm-12 mx-auto">
                        <div class="card-body ">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li>
                                    <img src="{{auth()->user()->avatar}}" alt="" class="img-fluid rounded mx-auto d-block mt-4 mb-3 img-thumbnail">
                                </li>
                                <li class="text-start">
                                   <ol> User: {{ auth()->user()->name }}</ol>
                                    <ol>Email: {{ auth()->user()->email }}</ol>
                                    <ol>Document:</ol>
                                    <ol>Addres:</ol>
                                    <ol>Phone: </ol>
                                    <ol></ol>

                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif
    @endforeach
@endsection
