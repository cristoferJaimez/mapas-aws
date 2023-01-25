@extends('layout.app')
@section('contenido')
    @include('home.navbar')
    @include('home.navbutton')

    @if (auth()->user()->id === 1)
        <div class="container mt-5  ">
            <div class="row mt-2 mb-5 m-2 ">

                <!--msm -->
                @if (Session::has('message'))
                    <script>
                        Swal.fire(
                            'Good job!',
                            'You clicked the button!',
                            'success'
                        )
                    </script>
                @endif



                <div class="card col-md-4 col-sm-12 mb-2 ">
                    <div class="card-body mt-3 ">
                        <p class="mt-3  d-flex justify-content-center align-items-center">
                            <img src="https://www.close-upinternational.com/img/logo.svg"
                                class="border border-3 rounded-circle navbar-brand border m-2 bg-Light" alt="avatar"
                                width="200px" height="200px">
                        </p>
                        <p class="text-muted  mt-3">
                            @foreach ($user as $item)
                                <h2 class="text-center"> {{ $item->name }}</h2>
                            @endforeach
                        </p>
                    </div>
                </div>

                <div class="card mx-auto col-md-8 col-sm-12 ">

                    <div class="card-body">
                        <form action="{{ 'public' }}" method="POST">
                            @csrf

                            @foreach ($user as $item)
                                <input type="text" name="user_id" id="user_id" value=" {{ $item->id }}" hidden>
                            @endforeach
                            <div class="mb-1">
                                <label for="category" class="form-label">Report type</label>
                                <select class="form-select form-control-sm" name="type_report_id" id="type_report_id"
                                    required aria-label="Default select example">
                                    <option selected class="text-muted">Open this select menu</option>
                                    @foreach ($type as $ty)
                                        <option class="text-capitalize" value="{{ $ty->id }}">{{ $ty->type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-1">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" name="title" autofocus placeholder="title..." required
                                    class="form-control form-control-sm">
                            </div>

                            <div class="mb-1">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control form-control-sm" required cols="30"
                                    placeholder="post description..." rows="5"></textarea>
                            </div>

                            <div class="mb-1">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select form-control-sm" name="category_id" id="category_id" required
                                    aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @foreach ($category as $cat)
                                        <option class="text-capitalize" value="{{ $cat->id }}">{{ $cat->category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label for="url" class="form-label">Url</label>
                                <input type="url" id="url" name="url" autofocus placeholder="https://yourlink.com.co"
                                    required class="form-control form-control-sm">
                            </div>
                            <div class="d-grid gap-2 ">
                                <button class="btn btn-secondary" type="submit">send post</button>
                            </div>
                        </form>
                    </div>
                </div>




            </div>

        </div>
    @else
        sin permisos
    @endif
@endsection
