<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet"  href="{{ asset('css/nav/navbar.css') }}">

    <link rel="stylesheet" href="{{ asset('css/maps.css') }}">

    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">


    <link rel="stylesheet" href="{{ asset('css/rangeV.css') }}">

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/data_mercado/btn.js') }}"></script>
   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>
        $(window).on('load', function() {
            setTimeout(function() {
                $(".loader-page").css({
                    visibility: "hidden",
                    opacity: "0"
                })
            }, 2000);

        });
    </script>

    <script src="{{ asset('js/window.js') }}"></script>
    <!-- <script src="{{ asset('js/off_mouse.js') }}"></script>-->
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/graticule.js') }}"></script>
    <script src="{{ asset('js/create_list.js') }}"></script>
    <script src="{{ asset('js/pagination.js') }}"></script>

    <!--<script src="{{ asset('assets/maps.geojson') }}"></script>
    -->



    <script src="{{ asset('js/control.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


    <title>Web App</title>
</head>

<body style="">
    @yield('contenido')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ asset('js/maps.js') }}"></script>
    <script>
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.mi-selector').select2();
            });
        });
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

</body>
</html>
