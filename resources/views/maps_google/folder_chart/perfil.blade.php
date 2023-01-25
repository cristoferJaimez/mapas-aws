<div class="card mb-3 mt-2" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://www.close-upinternational.com/img/logo.svg" alt="avatar" class="card-img-top h-100 p-2" />
        </div>
        <div class="col-md-8">
            <div class="card-body">

                    <span class="text-muted"> {{ auth()->user()->name }}</span>
                <br>
                <cite title="Source Title">cadena</cite>
            </div>
            <div class="card-footer">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <form action="{{ url('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-danger"><i class="fa-solid fa-right-from-bracket"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
