function openNav() {
    document.getElementById("sidebar").style.width = "250px";
    // document.getElementById("hamburgerdiv").style.marginLeft = "250px";
    document.getElementById("nav-icon3").setAttribute( "onclick", "closeNav()");
    document.getElementById("main").style.marginLeft = "250px";
}
function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    // document.getElementById("hamburgerdiv").style.marginLeft = "0px";
    document.getElementById("nav-icon3").setAttribute( "onclick", "openNav()");
    document.getElementById("main").style.marginLeft = "0px";


}
function openNavRight() {
    document.getElementById("sidebar-right").style.width = "375px";
    // document.getElementById("hamburgerdiv").style.marginLeft = "250px";
    document.getElementById("nav-icon-right").setAttribute( "onclick", "closeNav()");
    document.getElementById("main-right").style.marginLeft = "375px";
}
function closeNavRight() {
    document.getElementById("sidebar-right").style.width = "0";
    // document.getElementById("hamburgerdiv").style.marginLeft = "0px";
    document.getElementById("nav-icon-right").setAttribute( "onclick", "openNav()");
    document.getElementById("main-right").style.marginLeft = "0px";


}

$(document).ready(function(){
	$('#nav-icon3').click(function(){
        $(this).toggleClass('open');
        $("#hamburgerdiv").toggleClass("open");
	});
});
