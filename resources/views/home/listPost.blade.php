@extends('layout.app')
@section('contenido')
    @include('home.load')

    @if (auth()->user()->fk_rol === 1)
    <div class="container-fluid">
        <div class="row">
            <h6 class="text-muted"> <i class="fa-solid fa-list-ul"></i> List Post</h6>
            <hr>

            <div class="col-md-3 col-sm-12">
                <div class="list-group list-group-flush" style="  overflow-x: hidden; overflow-y: hidden">
                    <a href="#" class="list-group-item list-group-item-action href_  " aria-current="true">
                        <i class="fa-solid fa-circle-plus"></i> Add Post csv
                    </a>
                    <a href="#" class="list-group-item list-group-item-action href_  " aria-current="true">
                        <i class="fa-solid fa-floppy-disk"></i> Export Links Post
                    </a>

                </div>
            </div>

            <div class=" col-md-9 col-sm-12">
                <table class="table table-sm ">
                    <thead class="text-center">
                        <th> <i class="fa-solid fa-users"></i> Users</th>
                        <th><i class="fa-solid fa-ballot-check"></i> Type report</th>
                        <th><i class="fa-solid fa-ballot-check"></i> Category</th>
                        <th> <i class="fa-solid fa-link"></i> Links</th>
                        <th> <i class="fa-solid fa-database"></i> Status</th>
                        <th> <i class="fa-solid fa-calendar"></i> Timestamps</th>
                    </thead>
                    <tbody>
                        {{ $posts->links() }}
                        @foreach ($posts as $post => $value)
                            <tr>
                                <td>
                                    @foreach ($user as $usu)
                                        @if ($usu->id === $value->user_id)
                                            {{ $usu->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-center text-capitalize">
                                    @foreach ($type as $ty)
                                        @if ($ty->id === $value->type_report_id)
                                            {{ $ty->type }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-center text-capitalize">
                                    @foreach ($cate as $ca)
                                        @if ($ca->id === $value->category_id)
                                            {{ $ca->category }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-center"><a href="{{ $value->url }}" class="d-inline-block text-truncate "
                                        style="max-width: 150px;" target="blank_"> {{ $value->url }}</a></td>
                                <td class="text-center text-success">
                                    <i class="fa-solid fa-link" title="ON LINE"></i>
                                </td>
                                <td class="text-center text-muted">{{ $value->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>

    @else
        sin permiso
    @endif
@endsection
