$(document).ready(function() {

    $("#my_pharma").on('change', function() {
        if ($(this).val() != "") {
            var codigo = $(this).val();
            var option = $("#my_pharma:selected").text();
            if (codigo != '') {
                $(".select_nom_cadena").removeClass('d-none')
                $(".select_pharma").addClass('d-none')
            } else {
                $(".select_pharma").addClass('d-none')
                $(".select_nom_cadena").addClass('d-none')
            }
        }
    });


    //seleccionar farmacia por cadena o independiente


});