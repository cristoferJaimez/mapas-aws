//CORB


function hover(u) {
    let btn = document.querySelector('.link_')
        //btn.href = "somelink url"

}

function hide() {
    let card = document.querySelectorAll('.card')
    let next_prev_ = document.querySelector('.next_prev_')
    $(card).hide(500)
    let iframe = document.querySelector('.iframe')
    $(iframe).show(500)
    let btn = document.querySelector('.btn_')
    let load_ = document.querySelector('#load_')
    $(btn).show(500)
    $(load_).show(500)
    $(next_prev_).animate({
        height: 'toggle'
    });
}

function hide_iframe() {
    let iframe = document.querySelector('.iframe')
    let next_prev_ = document.querySelector('.next_prev_')

    $(iframe).hide(500)
    let btn = document.querySelector('.btn_')
    $(btn).hide(500)
    let card = document.querySelectorAll('.card')
    let load_ = document.querySelector('#load_')
    $(load_).hide(500)
    $(card).show(500)
    $(next_prev_).animate({
        height: 'toggle'
    });
}

let iframe = document.querySelector('.iframe')
$(iframe).load(function() {
    console.log($(this).val());
});

let v = document.querySelector('.visual-actionButton')

$(v).on('click', e => {
    console.log(e);
})