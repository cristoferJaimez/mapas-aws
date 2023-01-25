@foreach ($user as $item)
    <img src="https://www.close-upinternational.com/img/logo.svg" class="  rounded-circle border d-inline p-2 bg-light" width="70px" height="70px" alt="{{$item->name}}"  title="{{$item->name}}">
@endforeach