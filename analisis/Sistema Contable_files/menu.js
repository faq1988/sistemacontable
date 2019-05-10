$(document).ready(function () {
    setActiveClasses();
    bindMenuEvents();
});

function bindMenuEvents() {
    $(document).find(".l1_compra").off().on('click', function (e) {
        window.location.href = base_url() + "/sistemacontable/compra_controller";
    });
    $(document).find(".l1_venta").off().on('click', function (e) {
        window.location.href = base_url() + "/sistemacontable/venta_controller";
    });
    $(document).find(".l1_clientes").off().on('click', function (e) {
        window.location.href = base_url() + "/sistemacontable/clientes_controller";
    });
    $(document).find(".l1_gral_abm").off().on('click', function (e) {
        window.location.href = base_url() + "/sistemacontable/general_abm_controller";
    });
}

function setActiveClasses() {
    //remuevo los activos para setear los nuevos
    $(".active").removeClass(".active");
    active_classes.forEach(element => {
        $(`.${element}`).addClass('active');
    });
    active_classes
}