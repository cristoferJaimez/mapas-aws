//cargar en div
$(document).ready(function() {
    $('body').on('click', '.href_', function(e) {
        let info;
        let contenedor = document.querySelector("#default");
        let link = $(this).attr('href')
        let salto = window.Location.href = link;
        let id_ = $(this).attr('id')
        $.ajax({
            url: link,
            type: 'GET',
            dataType: 'text',
            async: true,
            success: function(e) {
                window.Location.href = link
                $(".href_").removeClass("active disabled");
                info = e
                $(contenedor.innerHTML = info).show('1000')
                let c = document.getElementById(id_);
                $(c).addClass("active disabled");
            },
            error: function(xhr, status) {
                alert('Disculpe, existe un problema', xhr, status);
                console.log(status);
            },
        });


        e.preventDefault();
    })



    //dentro del div
    $('body').on('click', '.provee', function(e) {
        let info;
        let contenedor = document.querySelector("#contenido");
        let link = $(this).attr('href')
        let id_ = $(this).attr('id')
        let clases = $(this).attr('class')

        let salto = window.Location.href = link;
        $.ajax({
            url: link,
            type: 'GET',
            dataType: 'text',
            async: true,
            success: function(e) {
                window.Location.href = link
                $(".provee").removeClass("active disabled");
                info = e
                let view = contenedor.innerHTML = info;
                let c = document.getElementById(id_);
                $(c).addClass("active disabled");

            },
            error: function(xhr, status) {
                alert('Disculpe, existe un problema', xhr, status);
                console.log(status);
            },
        });


        e.preventDefault();
    })
})
