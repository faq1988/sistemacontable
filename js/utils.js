function base_url(){
    return  window.location.origin;
}

function set_form_errors(form,errors){
    $('.form-error').remove();
    for (const key in errors) {
        const element = errors[key];
        $(form).find(`[name=${key}]`).parent().append(`<span class='form-error' style="color:red">${element}</span>`);
    }
}