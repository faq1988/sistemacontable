$(document).ready(function() {
    // bindEvents();

    $.ajax({
        type: 'POST',
        url: base_url() + "/sistemacontable/clientes_controller/load_cliente",
        data: { 'st': 0 },
        success: function(data, textStatus, request) {
             data.result.forEach(element => {
              $("#cliente").append('<option value="'+element["id"]+'">'+element["razon_social"]+'</option>');
            });
        },
        error: function(request, textStatus, error) {
            alert('Ocurrio un error en el servidor ..');
        },
        dataType: 'json'
    });



});