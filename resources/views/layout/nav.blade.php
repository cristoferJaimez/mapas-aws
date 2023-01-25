<ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link  {{request()->routeIs('home') ? 'active' : "text-muted"}}" aria-current="page" href="{{url('/')}}">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{request()->routeIs('register') ? 'active' : "text-danger text-decoration-underline fw-bold"}}" href="{{url('register')}}">Register</a>
    </li>
  </ul>
