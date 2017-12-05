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

$(function() {
    $('[data-toggle="tooltip"]').tooltip();

    $('#nav-icon-right').click(function() {
        $(this).toggleClass('open');
        $("#hamburgerdiv-right").toggleClass("open");
    });
})

function openNavRight() {
    document.getElementById("sidebar-right").style.width = "375px";
    document.getElementById("nav-icon-right").setAttribute( "onclick", "closeNavRight()");
    document.getElementById("main-right").style.marginright = "375px";
}

function closeNavRight() {
    document.getElementById("sidebar-right").style.width = "0";
    document.getElementById("nav-icon-right").setAttribute( "onclick", "openNavRight()");
    document.getElementById("main-right").style.marginRight = "0px";
}
