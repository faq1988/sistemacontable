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

function setMessage(type, msg, delay) {
    let alert = `<div class="alert alert-${type}"> ${msg} </div>`
    $(".main-header").prepend(alert).slideDown(300).delay(400);
    $(".main-header").find('.alert').slideUp(300).delay(delay).fadeIn(400).remove();
}
