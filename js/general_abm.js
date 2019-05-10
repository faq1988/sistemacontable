$(document).ready(function () {
    bindEvents();
});

function bindEvents() {
    $("#abm_select").change(function () {
        $(`.${$(this).val()}`).show();
    });
}