
        <form action="{{route('home')}}" method="POST">
            @csrf
            <button type="submit" class="btn badge bg-danger text-wrap">
                <i class="fa-solid fa-backward"></i> {{auth()->user()->name}},   return home.</button>
        </form>

