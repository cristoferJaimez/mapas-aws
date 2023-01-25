//MAX ven graficos
function max_min(params) {
    if ($(params).hasClass('active') === false) {
        $(params).addClass('active')

        $(params).animate({
            height: 'toggle',
            //opacity: '0.5',
            height: '200px',
            width: 'auto',
            zindex: '5'
        });

    } else {

        $(params).removeClass('active')

        $(params).animate({
            height: 'toggle',
            height: '80px',
            width: 'auto'
        });

    }

}
