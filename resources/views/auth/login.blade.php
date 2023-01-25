<div class="container ">
    <div class="row">


    <div class=" position-absolute top-50 start-50 translate-middle col-md-11 col-sm-11 ">

        <p class="text-center">
           <img src="https://www.close-upinternational.com/img/logo.svg" width="80px" height="80px" alt="logo" class="p-1 border  rounded-circle" style="text-align: center" />


          <!-- <h6>Don't have an account? <a href="{{url('register')}}">Sign up</a></h6> -->
        </p>
        <div class="card  " style="width: 18rem;" >
            <div class="card-body">

                <form action="{{url('login')}}" method="POST" >
                    <div class="form-group ">
                        <!--token-->
                        @csrf
                        <div class="mt-3">
                            <label class="form-label">Email *</label>
                            <input type="email" class="form-control" required autofocus
                                value="{{ old('email') }}" name="email" placeholder="Email..." />

                        <div class="form-text text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Password * </label>
                            <input type="password" class="form-control" required name="password"
                                placeholder="Password..." />

                        <div class="form-text text-danger"> @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                        </div>
                        <div class="mt-3">
                            <label>
                                <input type="checkbox" name="remember" />
                                <p class="card-link " style="display: inline">Remember me?</p>
                            </label>
                        </div>
                        <br>

                        <div class="d-grid gap-1">
                            <button class="btn mt-2  btn-primary" type="submit">Sign In</button>
                          </div>

                    </div>
                </form>
            </div>
        </div>
    </div>


    </div>
</div>
