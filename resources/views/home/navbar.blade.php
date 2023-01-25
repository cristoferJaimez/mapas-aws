<nav class="navbar navbar-light  d-sm-block text-cente shadow-sm   d-md-block navbar-expand-lg mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('home') }}"><i class="fa-regular fa-gauge-max"></i> My Report
            Dashboard {{auth()->user()->name}}</a>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto  mb-lg-0">

                <!--
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active text-white' : 'text-dark' }}"
                        aria-current="page" href="{{ url('home') }}"> <i class="fa-solid fa-house-user"></i> Home </a>
                </li>
            -->

                @if (auth()->user()->fk_rol === 1)
                    <!--
                <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listUsers') ? 'active text-white' : 'text-dark' }}"
                            aria-current="page" href="{{ url('listUsers') }}"><i class="fa-solid fa-users-line"></i>
                            List Users</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listPost') ? 'active text-white' : 'text-dark' }}"
                            aria-current="page" href="{{ url('listPost') }}"> <i
                                class="fa-solid fa-clipboard-list"></i>
                            List Post</a>
                    </li>

                    <li class="nav-item">
                        <a target="blank_"
                            class="nav-link {{ request()->routeIs('utcmaps') ? 'active text-white' : 'text-dark' }}"
                            aria-current="page" href="{{ route('utcmaps') }}"> <i
                                class="fa-solid fa-map-location-dot"></i>
                            Maps</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listUTC') ? 'active text-white' : 'text-dark' }}"
                            aria-current="page" href="{{ route('listUTC') }}"> <i
                                class="fa-solid fa-map-location-dot"></i>
                            List UTC</a>
                    </li>
                -->
                @else
                    <!--
                    <li class="nav-item">
                        <a class=" nav-link   {{ request()->routeIs('postList') ? 'text-white' : 'text-dark' }}"
                            aria-current="page" href="{{ url('postList') }}/{{ auth()->user()->id }}"><i
                                class="fa-solid fa-link"></i> Links post</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link    {{ request()->routeIs('oldpost') ? 'text-white' : 'text-dark' }}"
                            aria-current="page" href="{{ url('oldpost') }}/{{ auth()->user()->id }}"><i
                                class="fa-solid fa-clipboard-list"></i> List old post</a>
                    </li>
                -->
                @endif
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav  mb-lg-0">

                    <li class="nav-item ">
                        <form action="{{ url('logout') }}" style="display: inline; " method="POST">
                            @csrf
                            <button class="nav-link btn btn-sm text-dark" type="submit"> <i
                                    class="fa-solid fa-arrow-right-from-bracket"></i></button>
                        </form>
                    <li>


                </ul>
            </div>
        </div>
    </div>

</nav>
