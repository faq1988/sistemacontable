var clientes = [];

$(document).ready(function() {
    bindEvents();
    loadClientes();
});

function bindEvents() {
    $(".send").off().click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        sendForm('.form-cliente');
    });
}


function loadClientes() {
    var data_table_config = {
        "ajax": {
            "url": base_url() + "/sistemacontable/clientes_controller/load_cliente",
            "type": "post",
            "data": { 'st': 0 },
            "dataSrc": function(json) {
                json.result.forEach(e => {
                    clientes[e.id] = e;
                });
                return json.result;
            },
        },
        "stateSave": false, // guarda el estado en el local storage (orden, pagina)
        "processing": true,
        "deferRender": false,
        "searching": true,
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
                title: "Cliente",
                data: "razon_social",
                sortable: true,
            },
            {
                title: "Categoria IVA",
                render: function(d, t, f) {
                    return _CATEGORIA_IVA[f.categoria_iva];
                }
            },
            {
                title: "Documento",
                data: "val_select",
                sortable: true,
                render: function(d, t, f) {
                    return _TIPO_DOCUMENTO[f.tipo_documento] + ' - ' + f.cuit;;
                }
            },
            {
                title: "Localidad",
                data: "localidad",
                sortable: true,

            },
            {
                title: "Domicilio",
                render: function(d, t, f) {
                    return `${f.domicilio} ${(f.altura) ? f.altura : ''} ${(f.piso) ? f.piso : ''} ${(f.depto) ? f.depto : ''}`;
                }
            },
            { title: "e-mail", data: "email" },
            { title: "telefono", data: "telefono" },
            {
                title: "",
                render: function(d, t, f) {
                    let action_icons = ``;
                    action_icons += `<i class='fa fa-pen edit-cliente' title='Editar cliente'></i>&nbsp;`;
                    action_icons += `<i class='fa fa-times delete-cliente' title='Eliminar cliente'></i>`;
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
            $('.delete-cliente').off().click(function() {
                let id = $(this).closest('tr').attr('id');
                eliminarCliente(id);
            });
            $('.edit-cliente').off().click(function() {
                let id = $(this).closest('tr').attr('id');
                fillFormCliente(id);
            });
        },
        "initComplete": function() {}
    };

    $("#tbl_cliente").DataTable(data_table_config);
    $("#tbl_cliente").css("width", "100%");
}

function sendForm(id) {
    let data = $(id).serialize() + `&id=${$(id).attr('data-clientid')}`;
    $.ajax({
        type: 'POST',
        url: base_url() + "/sistemacontable/clientes_controller/crear_cliente",
        data: data,
        success: function(data, textStatus, request) {
            if (data.success == false) {
                if (data.result == null) {
                    setMessage('danger', data.msg, 4000);
                }
                //seteo los errores en el formlario
                set_form_errors(id, data.response);
            } else {
                $(id).attr('data-clientid', '');
                clear_form(id);
                $("#tbl_cliente").DataTable().ajax.reload();
            }
        },
        error: function(request, textStatus, error) {},
        dataType: 'json'
    });
}

function eliminarCliente(client_id) {
    $.ajax({
        type: 'POST',
        url: base_url() + "/sistemacontable/clientes_controller/delete_cliente",
        data: { 'id': client_id },
        success: function(data, textStatus, request) {
            if (data.success == false) {
                //seteo los errores en el formlario
                set_form_errors(id, data.response);
            } else {
                $("#tbl_cliente").DataTable().ajax.reload();
            }
        },
        error: function(request, textStatus, error) {},
        dataType: 'json'
    });
}

function fillFormCliente(client_id) {
    $(".form-cliente").attr('data-clientid', client_id);
    $("input[name='razon_social']").val(clientes[client_id].razon_social);
    $("select[name='categoria_iva']").val(clientes[client_id].categoria_iva);
    $("select[name='tipo_documento']").val(clientes[client_id].tipo_documento);
    $("input[name='cuit']").val(clientes[client_id].cuit);
    $("input[name='domicilio']").val(clientes[client_id].domicilio);
    $("input[name='altura']").val(clientes[client_id].altura);
    $("input[name='piso']").val(clientes[client_id].piso);
    $("input[name='localidad']").val(clientes[client_id].localidad);
    $("input[name='departamento']").val(clientes[client_id].departamento);
    $("input[name='email']").val(clientes[client_id].email);
    $("input[name='telefono']").val(clientes[client_id].telefono);
}