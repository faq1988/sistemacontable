var tipo_comprobantes = [];

$(document).ready(function() {
    bindEvents();
    if ($(".form-tipo_comprobante").is(":visible"))
        load_tipo_comprobante();
});

function bindEvents() {
    $(".send").off().click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        sendForm('.form-tipo_comprobante');
    });
}

function reload_tipo_comprobante() {
    load_tipo_comprobante()
}


function load_tipo_comprobante() {
    var data_table_config = {
        "ajax": {
            "url": base_url() + "/sistemacontable/general_abm_controller/load_tipo_comprobante",
            "type": "post",
            "data": { 'st': 0 },
            "dataSrc": function(json) {
                json.result.forEach(e => {
                    tipo_comprobantes[e.id] = e;
                });
                return json.result;
            },
        },
        "stateSave": false, // guarda el estado en el local storage (orden, pagina)
        "processing": true,
        "deferRender": false,
        "searching": true,
        "destroy": true,
        "orderClasses": false,
        "paging": true,
        "sPaginationType": "numbers",
        "iDisplayLength": 100,
        "autoWidth": false,
        "aLengthMenu": [
            [50, 100, 200, -1],
            [50, 100, 200, "Todos"]
        ],
        "stripeClasses": ["odd", "even"],
        "columns": [{
                title: "ID",
                data: "id",
                sortable: true,
            },
            {
                title: "Tipo de Comprobante",
                data: "descripcion",
                sortable: true,
            },
            {
                title: "",
                render: function(d, t, f) {
                    let action_icons = ``;
                    action_icons += `<i class='fa fa-pen edit-tipo-comprobante' title='Editar tipo de comprobante'></i>&nbsp;`;
                    action_icons += `<i class='fa fa-times delete-tipo-comprobante' title='Eliminar tipo de comprobante'></i>`;
                    return action_icons;
                }
            },
        ],
        "createdRow": function(row, data, dataIndex) {
            $(row).attr('id', data.id);
        },
        "order": [
            [0, 'desc'],
            [1, 'asc']
        ],
        "drawCallback": function() {
            $('.delete-tipo-comprobante').off().click(function() {
                let id = $(this).closest('tr').attr('id');
                eliminartipo_comprobante(id);
            });
            $('.edit-tipo-comprobante').off().click(function() {
                let id = $(this).closest('tr').attr('id');
                fillFormtipo_comprobante(id);
            });
        },
        "initComplete": function() {}
    };

    $("#tbl_tipo_comprobante").DataTable(data_table_config);
    $("#tbl_tipo_comprobante").css("width", "100%");
}

function sendForm(id) {
    let data = $(id).serialize() + `&id=${$(id).attr('data-tipo_comprobanteid')}`;
    $.ajax({
        type: 'POST',
        url: base_url() + "/sistemacontable/general_abm_controller/crear_tipo_comprobante",
        data: data,
        success: function(data, textStatus, request) {
            if (data.success == false) {
                //seteo los errores en el formlario
                set_form_errors(id, data.response);
            } else {
                clear_form(id);
                $("#tbl_tipo_comprobante").DataTable().ajax.reload();
            }
        },
        error: function(request, textStatus, error) {},
        dataType: 'json'
    });
}

function eliminartipo_comprobante(tipo_comprobante_id) {
    $.ajax({
        type: 'POST',
        url: base_url() + "/sistemacontable/general_abm_controller/delete_tipo_comprobante",
        data: { 'id': tipo_comprobante_id },
        success: function(data, textStatus, request) {
            if (data.success == false) {
                //seteo los errores en el formlario
                set_form_errors(id, data.response);
            } else {
                $("#tbl_tipo_comprobante").DataTable().ajax.reload();
            }
        },
        error: function(request, textStatus, error) {},
        dataType: 'json'
    });
}

function fillFormtipo_comprobante(tipo_comprobante_id) {
    $(".form-tipo-comprobante").attr('data-tipo_comprobanteid', tipo_comprobante_id);
    $("input[name='descripcion']").val(tipo_comprobantes[tipo_comprobante_id].descripcion);

}