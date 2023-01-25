@extends('layout.app')
@section('contenido')
    <div class="container ">
        @include('layout.nav')

        <!--msm -->
        @if(Session::has('message'))    
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Nice job!</strong> {{Session::get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        @else
       
        @endif

        <div class=" mt-5 d-flex justify-content-center align-items-center">
            <div class="col-md-6 col-sm-12 mt-5">
                <form action="{{'register'}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" id="name" autofocus required placeholder="Full Name..." />
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required placeholder="email" />
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required placeholder="password" />
                    </div>
                    <div class="d-grid gap-2 ">
                        <button class="btn btn-primary" type="submit">register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection