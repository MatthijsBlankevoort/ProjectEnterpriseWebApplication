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
function openIssues() {
    document.getElementById("issueslist").style.width = "375px";
    // document.getElementById("hamburgerdiv").style.marginLeft = "250px";
    document.getElementById("issues-icon").setAttribute( "onclick", "closeNav()");
    document.getElementById("main-right").style.marginLeft = "375px";
}
function closeIssues() {
    document.getElementById("issueslist").style.width = "0";
    // document.getElementById("hamburgerdiv").style.marginLeft = "0px";
    document.getElementById("issues-icon").setAttribute( "onclick", "openNav()");
    document.getElementById("main-right").style.marginLeft = "0px";


}

$(document).ready(function(){
	$('#nav-icon3').click(function(){
        $(this).toggleClass('open');
        $("#hamburgerdiv").toggleClass("open");
	});
});
