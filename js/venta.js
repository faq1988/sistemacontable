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



    $.ajax({
        type: 'POST',
        url: base_url() + "/sistemacontable/utilidades_controller/load_provincias",
        //data: { 'st': 0 },
        success: function(data, textStatus, request) {
             data.result.forEach(element => {
              $("#provincias").append('<option value="'+element["id"]+'">'+element["descripcion"]+'</option>');
            });
        },
        error: function(request, textStatus, error) {
            alert('Ocurrio un error en el servidor ..');
        },
        dataType: 'json'
    });



    $.ajax({
        type: 'POST',
        url: base_url() + "/sistemacontable/utilidades_controller/load_tipo_comprobante",
        data: { 'st': 0 },
        success: function(data, textStatus, request) {
             data.result.forEach(element => {
              $("#tipo_comprobante").append('<option value="'+element["id"]+'">'+element["descripcion"]+'</option>');
            });
        },
        error: function(request, textStatus, error) {
            alert('Ocurrio un error en el servidor ..');
        },
        dataType: 'json'
    });



});