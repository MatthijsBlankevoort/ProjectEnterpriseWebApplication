function openNav() {
    document.getElementById("sidebar").style.width = "250px";
    // document.getElementById("hamburgerdiv").style.marginLeft = "250px";
    document.getElementById("nav-icon3").setAttribute( "onclick", "closeNav()");
}
function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    // document.getElementById("hamburgerdiv").style.marginLeft = "0px";   
    document.getElementById("nav-icon3").setAttribute( "onclick", "openNav()");
    
    
}

$(document).ready(function(){
	$('#nav-icon3').click(function(){
        $(this).toggleClass('open');
        $("#hamburgerdiv").toggleClass("open");
	});
});