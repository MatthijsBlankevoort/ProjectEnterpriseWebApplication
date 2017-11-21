$(function() {
    $('[data-toggle="tooltip"]').tooltip();

    $('#nav-icon').click(function() {
        $(this).toggleClass('open');
        $("#hamburgerdiv").toggleClass("open");
    });
})

function openNav() {
    document.getElementById("sidebar").style.width = "250px";
    document.getElementById("nav-icon").setAttribute( "onclick", "closeNav()");
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("nav-icon").setAttribute( "onclick", "openNav()");
    document.getElementById("main").style.marginLeft = "0px";
}