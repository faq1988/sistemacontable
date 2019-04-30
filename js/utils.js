function base_url() {
    return window.location.origin;
}

//inserta campos de error en cada elemento designado en el arreglo de error 
function set_form_errors(form, errors) {
    $('.form-error').remove();
    for (const key in errors) {
        const element = errors[key];
        $(form).find(`[name=${key}]`).parent().append(`<span class='form-error' style="color:red">${element}</span>`);
    }
}

function clear_form(form) {
    $(form).find('input').val('');
    $(form).find('select').prop("selectedIndex", 0);
}

function map_field(f, id) {
    var field = {};
    field.tipo_documento = { 1: 'DU', 2: 'Libreta Civica', 3: 'Libreta Enrolamiento' };
    field.categoria_iva = { 0: 'Monotributo', 1: 'Responsable Inscripto' };

    return field[f][id];
}
