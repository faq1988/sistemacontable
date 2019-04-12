$(document).ready(function() {
    setActiveClasses();
    bindEvents();
});

function bindEvents(){
    $(".l1_compra").off().on('click',function(e){
        let base_url = window.location.origin;
        window.location.href=base_url+"/sistemacontable/compra_controller";
    });
    $(".l1_venta").off().on('click',function(e){
        let base_url = window.location.origin;
        window.location.href=base_url+"/sistemacontable/venta_controller";
    });
}

function setActiveClasses(){
    //remuevo los activos para setear los nuevos
    $(".active").removeClass(".active");
    active_classes.forEach(element => {
        $(`.${element}`).addClass('active');
    });
    active_classes
}