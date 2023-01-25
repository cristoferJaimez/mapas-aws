$(document).ready(function() {
    //Disable cut copy paste
    $('body').bind('cut copy paste', function(e) {
        e.preventDefault();
        console.log(e);
    });

    //Disable mouse right click
    $("body").on("contextmenu", function(e) {
        console.log("x: ", e.pageX, " y: ", e.pageY);
        return false;
    });
});