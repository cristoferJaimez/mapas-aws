var elInput = document.querySelector('#input');
if (elInput) {
    var etiqueta = document.querySelector('#etiqueta');
    if (etiqueta) {
        etiqueta.innerHTML = elInput.value;

        elInput.addEventListener('input', function() {
            etiqueta.innerHTML = elInput.value;
        }, false);
    }
}


$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });
});


function load_web(params) {
    let content = document.querySelector("#content")
    $(content).load(params);

}