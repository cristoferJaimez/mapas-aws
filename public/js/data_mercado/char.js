var global = 0;
var cadena = 0;
var propio_ = 0;

//let myChart = new Chart();

function char(glo, cad, pro) {
    var data = [{
        type: "sunburst",
        labels: [`GLOBAL`, "CADENA", "PROPIO", "PROPIO"],
        parents: ["", "GLOBAL", 'GLOBAL', "CADENA"],
        values: [glo, 12000000, pro, pro],
        outsidetextfont: { size: 10, color: "#FFF" },
        leaf: { /*opacity: 0.4*/ },
        marker: {
            line: { width: 2 },
            colors: ["#DC3545", "#0DCAF0", "#FFC107", "#FFC107"]
        },
    }];


    var config = { responsive: true };

    var layout = {
        title: 'MERCADO',
        margin: { l: 0, r: 0, b: 0, t: 0 },
        height: 280,

    };

    document.getElementById('myChart').textContent = ""
    Plotly.newPlot('myChart', data, layout, config);
    $('.modebar-btn').addClass('d-none');
    // console.log('y¿txt');
    // console.log($('.surface').length);

}




function calculo() {
    document.getElementById('myChart').textContent = "Loading char..."

    document.getElementById('total_valor').textContent = "Loading..."
        //event.defaultPrevented();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }


    });


    //mercado global
    var propio = false
    $.ajax({
        url: "info_btn",
        type: 'POST',
        data: {
            "arr_utc": document.getElementById('arr_utc').value,
            "farmacia": farmacia
        },
        success: function(response) {
            global = response.total_valores

            document.getElementById('total_valor').textContent = "$ " + Math.trunc(response.total_valores).toLocaleString("es");
            document.getElementById('total_unidad').textContent = response.total_unidades;

            document.getElementById('total_puntos').textContent = response.total_puntos.length;
            document.getElementById('total_promedio').textContent = "$ " + Math.trunc(response.total_valores / response.total_puntos.length).toLocaleString("es");
            $("#vt").val(response.total_valores);


            //exportar respuestas


            if (propio === false) {
                propio = true;
                //mercado pripio
                propio_ = response.farmacia[0].VAL;
                document.getElementById('total_propio').textContent = "$" + Math.trunc(response.farmacia[0].VAL).toLocaleString('es');
                document.getElementById('unidad_propio').textContent = response.farmacia[0].UND

            }

            char(global, cadena, propio_)

            //console.log(response);
        },
        error: function(err) {
            console.log(err);
        }
    });





}
