$(document).ready(function() {
     bindEvents();
});

function bindEvents(){
    $(".send").off().click(function(e){
        e.preventDefault();
        e.stopPropagation();
        sendForm('.form-cliente');
    });
}


function sendForm(id) {
    $.ajax({
     type: 'POST',
     url: base_url()+"/sistemacontable/clientes_controller/crear_cliente",
     data: $(id).serialize(),
     success: function(data, textStatus, request) {
        if(data.success==false){
            //seteo los errores en el formlario
            set_form_errors(id,data.response);
        }
        else{
            alert('ok!!');
            clear_form(id);
        }
    },
     error: function(request, textStatus, error) {
     },
     dataType: 'json'
    });
  }
