$(document).ready(function() {
    bindEvents();
});

function bindEvents() {
    $(".form-control").change(function() {
        $(".abm").hide();
        let abm = $(this).val();
        $(`.${abm}`).show();
        //ejecuto  la funcion de carga de tabla propia de cada script
        let function_name = "reload_" + abm;
        window[function_name]();
    });
}