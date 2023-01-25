<div class="wrapper">

    <!-- Sidebar -->
    <nav id="sidebar" style="z-index: 99999">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3> {{ auth()->user()->name }}</h3>
            </div>

            <ul class="list-unstyled components">
                    <li class="nav-item">
                        <a class="nav-link  {{ request()->routeIs('listUsers') ? 'active text-white' : 'text-dark' }}"
                            aria-current="page" href="{{ url('listUsers') }}" ><i class="fa-solid fa-users-line"></i>
                            List Users</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listPost') ? 'active text-white' : 'text-dark' }}"
                            aria-current="page" href="{{ url('listPost') }}"> <i class="fa-solid fa-clipboard-list"></i>
                            List Post</a>
                    </li>

                    <li class="nav-item">
                        <a target="blank_" class="nav-link {{ request()->routeIs('utcmaps') ? 'active text-white' : 'text-dark' }}"
                            aria-current="page" href="{{ route('utcmaps') }}"> <i class="fa-solid fa-map-location-dot"></i>
                            Maps</a>
                    </li>

                    <li class="nav-item">
                        <a  class="nav-link {{ request()->routeIs('listUTC') ? 'active text-white' : 'text-dark' }}"
                            aria-current="page" href="{{ route('listUTC') }}"> <i class="fa-solid fa-map-location-dot"></i>
                            List UTC</a>
                    </li>



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


                <li class="nav-item ">
                    <form action="{{ url('logout') }}" style="display: inline;" method="POST">
                        @csrf
                        <button class="nav-link btn btn-sm text-white" type="submit"> <i
                                class="fa-solid fa-arrow-right-from-bracket"></i> Sign out</button>
                    </form>
                <li>
            </ul>
        </nav>
    </nav>

    <div class="content">

    </div>



    </div>
</div>
