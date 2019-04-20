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
    let data_send=$(id).serialize();
    $.ajax({
     type: 'POST',
     url: base_url()+"/sistemacontable/clientes_controller/crear_cliente",
     data: data_send,
     success: function(data, textStatus, request) {
        if(data.success==false){
            //seteo los errores en el formlario
            set_form_errors('.form-cliente',data.response);
        }
        else{
            alert('ok!!');
        }
    },
     error: function(request, textStatus, error) {
     },
     dataType: 'json'
    });
  }
