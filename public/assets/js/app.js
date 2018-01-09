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

    $('#issues-icon').click(function() {
        $(this).toggleClass('open');
        $("#hamburgerdiv-issues").toggleClass("open");
    });
})

function openIssues() {
    document.getElementById("issueslist").style.width = "375px";
    document.getElementById("issues-icon").setAttribute( "onclick", "closeIssues()");
    document.getElementById("main").style.marginRight = "375px";
}

function closeIssues() {
    document.getElementById("issueslist").style.width = "0";
    document.getElementById("issues-icon").setAttribute( "onclick", "openIssues()");
    document.getElementById("main").style.marginRight = "0px";
}
