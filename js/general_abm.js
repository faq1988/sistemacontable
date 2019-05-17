$(document).ready(function () {
    bindEvents();
});

function bindEvents() {
    $(".form-control").change(function () {
        $(".abm").hide();
        $(`.${$(this).val()}`).show();
    });
}