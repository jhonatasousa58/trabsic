
$("#menu-nacional").hide();
$("#menu-internacional").hide();
function show_menu(){
    if(document.getElementById('nacional').checked) {
        $("#menu-internacional").hide();
        $("#menu-nacional").show();

    } else if(document.getElementById('internacional').checked) {
        $("#menu-nacional").hide();
        $("#menu-internacional").show();
    }
}
$("#menu-sim").hide();
function show_menu_quanti(){
    if(document.getElementById('sim').checked) {
        $("#menu-sim").show();
    }else{
        $("#menu-sim").hide();
    }
}

$(".clickable-row").click(function() {
    window.location = $(this).data("href");
});
