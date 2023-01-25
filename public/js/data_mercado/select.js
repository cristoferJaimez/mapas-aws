const select_1 = document.querySelector('.select_1');
select_1.addEventListener('change', (e) => {
    var num = $("#vt").val();

    document.getElementById("body").innerHTML = ""
        //document.getElementById('table').innerHTML = ""
    document.getElementById('inf_db').textContent = "Loading..."
        //console.log(event.target.value);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    if (event.target.value === "1") {



        $.ajax({
            url: "char",
            type: 'POST',
            data: {
                "arr_utc": document.getElementById('arr_utc').value,
                "select": event.target.value,
            },
            success: function(response) {

                //console.log(response);
                //acomular duplicados
                duplicado(response)

                response.forEach((e, i, arr) => {
                    document.getElementById("body").innerHTML += `
                    <tr>
                          <td>${i+1}</td>
                          <td>${e.PROD}</td>
                          <td>${e.UND}</td>
                          <td> $${ Math.trunc(e.VAL).toLocaleString("es")}</td>
                          <td>${ (e.VAL / num).toFixed(4)}%</td>
                    </tr>
                    `

                });
                $('table#tbl').tableSortable();

                document.getElementById('inf_db').textContent = ""
            },
            error: function(err) {
                console.log(err);
            }
        });

    } else {
        $.ajax({
            url: "char",
            type: 'POST',
            data: {
                "arr_utc": document.getElementById('arr_utc').value,
                "select": event.target.value,
            },
            success: function(response) {

                //unificar
                duplicado(response)

                response.forEach((e, i, arr) => {


                    document.getElementById("body").innerHTML += `
                    <tr>
                          <td>${i+1}</td>
                          <td>${e.FABRICANTE}</td>
                          <td>${e.UND}</td>
                          <td> $${ Math.trunc(e.VAL).toLocaleString("es")}</td>
                          <td>${ (e.VAL / num).toFixed(4)}%</td>
                    </tr>
                    `

                });

                $('table#tbl').tableSortable();


                document.getElementById('inf_db').textContent = ""
            },
            error: function(err) {
                console.log(err);
            }
        });
    }



});




function duplicado(data) {
    var newarr = [];
    var und = 0,
        valo = 0;

    data.forEach((val, i) => {
        data.forEach((va, x) => {
            if (val.FABRICANTE === va.FABRICANTE) {
                und = und + va.UND;
                valo = valo + va.VAL;
            }
        });

        newarr.push({ 'FABRICANTE': val.FABRICANTE, 'UND': und, 'VAL': valo })
    });

    console.log(newarr);
}
