var heat;

//activar mapade calor herramintas de mapa de calor
$(document).on('click', '.fv', function(e) {
    let linea = document.getElementById('linea_tiempo')
    let hist = document.getElementById('historial')
    let fv = document.querySelector('.fv').checked;
    if (fv === true) {
        //$(linea).show(500)
        $(hist).show(500)
            //activar capa de calor
        $(calor()).show(1000)

    } else {
        //$(linea).hide(500)
        $(hist).hide(500)
        heat.remove();
    }

})


//activar controles de linea de tiempo
$(document).on('change', '.linea_tiempo', function(e) {
    console.log($(this).val());
})

//mapa de calor
function calor() {
    heat = L.heatLayer([
        [4.570868, -74.297333, 1474474719471],
        [4.470868, -73.297333, 14744741] // lat, lng, intensity

    ], {
        scaleRadius: true,
        useLocalExtrema: true,
        maxOpacity: 0.8,
        radius: 15,
        blur: 15, // default value
    });
    $(heat.addTo(map)).show(500)

}


//ocultar paneles
$(document).on('click', '.view', function(e) {
    // console.log(e);
    let panel = document.getElementById('panel_1')
    let vista = document.getElementsByClassName('fa-eye')
    let panel_2 = document.getElementById('panel_2')
    let view = document.querySelector('.view').checked;
    //console.log(vis);
    if (view === true) {
        $(panel).show(500)
    } else {
        $(panel).hide(500)
    }

})

// panel tools
function tools() {
    let panel = document.getElementById('panel_1')
    let panel_2 = document.getElementById('panel_2')
    let chk = document.querySelector('.view');
    /*console.log(chk.defaultChecked);
    if (chk.value === 'on') {

    } else {
        $(chk).prop("checked", true);
        //$(panel).hide(500)
        $(panel_2).hide(500)
    }

    */

    $(panel_2).animate({
        height: 'toggle'
    }, "slow", function() {

    });
}

// input file
function file_up() {
    let files = document.getElementById('files_upload')
    $(files).show(500)
}

$(document).on('click', '.load_file', function(e) {
    // console.log(e);
    let file = document.getElementById('files_upload')
    let view = document.querySelector('.load_file').checked;
    if (view === true) {
        $(file).show(500)
    } else {
        $(file).hide(500)
    }

})


//ocultar representantes
$(document).on('click', '#view_re', function(e) {

})

//funcion ocultar boton
function toggle() {
    let panel = document.getElementsByClassName('panel_re')
    $(panel).animate({
        height: 'toggle'
    }, "slow");
}


//agregar representantes y utc a representantes
$(document).on('click', '.add_new_rep', function(e) {
    let view = document.querySelector('.view')
        // console.log(e);
    let panel_1 = document.getElementById('panel_1')
    let panel_2 = document.getElementsByClassName('panel_add_re')
        //console.log($(view).prop('checked', false));
    $(view).prop('checked', false);
    $(panel_1).hide(500);
    $(panel_2).animate({
        height: 'toggle'
    }, "slow");

})