$(document).ready(function() {
    bindEvents();
});

function bindEvents(){
    $(".l1_compra").off().on('click',function(e){
        let base_url = window.location.origin;
        window.location.href=base_url+"/sistemacontable/index.php/compra_controller";
    });
}