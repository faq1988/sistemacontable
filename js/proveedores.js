
var proveedores = [];

$(document).ready(function () {
    bindEvents();
    loadProveedores();
});

function bindEvents() {
    $(".send").off().click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        sendForm('.form-proveedor');
    });
}


function loadProveedores() {
    var data_table_config = {
        "ajax": {
            "url": base_url() + "/sistemacontable/proveedores_controller/load_proveedor",
            "type": "post",
            "data": { 'st': 0 },
            "dataSrc": function (json) {
                json.result.forEach(e => {
                    proveedores[e.id] = e;
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
        "aLengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todos"]],
        "stripeClasses": ["odd", "even"],
        "columns": [
            {
                title: "Proveedor",
                data: "razon_social",
                sortable: true,
            },
            {
                title: "Categoria IVA",
                render: function (d, t, f) {
                    return _CATEGORIA_IVA[f.categoria_iva];
                }
            },
            {
                title: "Documento", data: "val_select", sortable: true,
                render: function (d, t, f) {
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
                render: function (d, t, f) {
                    return `${f.domicilio} ${(f.altura) ? f.altura : ''} ${(f.piso) ? f.piso : ''} ${(f.depto) ? f.depto : ''}`;
                }
            },
            { title: "e-mail", data: "email" },
            { title: "telefono", data: "telefono" },
            {
                title: "",
                render: function (d, t, f) {
                    let action_icons = ``;
                    action_icons += `<i class='fa fa-pen edit-proveedor' title='Editar proveedor'></i>&nbsp;`;
                    action_icons += `<i class='fa fa-times delete-proveedor' title='Eliminar proveedor'></i>`;
                    return action_icons;
                }
            },
        ],
        "createdRow": function (row, data, dataIndex) {
            $(row).attr('id', data.id);
        },
        "order": [[0, 'desc'], [1, 'asc']],
        "drawCallback": function () {
            $('.delete-proveedor').off().click(function () {
                let id = $(this).closest('tr').attr('id');
                eliminarProveedor(id);
            });
            $('.edit-proveedor').off().click(function () {
                let id = $(this).closest('tr').attr('id');
                fillFormProveedor(id);
            });
        },
        "initComplete": function () {
        }
    };

    $("#tbl_proveedor").DataTable(data_table_config);
    $("#tbl_proveedor").css("width", "100%");
}

function sendForm(id) {
    let data = $(id).serialize() + `&id=${$(id).attr('data-proveedorid')}`;
    $.ajax({
        type: 'POST',
        url: base_url() + "/sistemacontable/proveedores_controller/crear_proveedor",
        data: data,
        success: function (data, textStatus, request) {
            if (data.success == false) {
                if (data.result == null) {
                    setMessage('danger', data.msg, 4000);
                }
                //seteo los errores en el formlario
                set_form_errors(id, data.response);
            }
            else {
                clear_form(id);
                $("#tbl_proveedor").DataTable().ajax.reload();
            }
        },
        error: function (request, textStatus, error) {
        },
        dataType: 'json'
    });
}

function eliminarProveedor(proveedor_id) {
    $.ajax({
        type: 'POST',
        url: base_url() + "/sistemacontable/proveedores_controller/delete_proveedor",
        data: { 'id': proveedor_id },
        success: function (data, textStatus, request) {
            if (data.success == false) {
                //seteo los errores en el formlario
                set_form_errors(id, data.response);
            }
            else {
                $("#tbl_proveedor").DataTable().ajax.reload();
            }
        },
        error: function (request, textStatus, error) {
        },
        dataType: 'json'
    });
}

function fillFormProveedor(proveedor_id) {
    $(".form-proveedor").attr('data-proveedorid', proveedor_id);
    $("input[name='razon_social']").val(proveedores[proveedor_id].razon_social);
    $("select[name='categoria_iva']").val(proveedores[proveedor_id].categoria_iva);
    $("select[name='tipo_documento']").val(proveedores[proveedor_id].tipo_documento);
    $("input[name='cuit']").val(proveedores[proveedor_id].cuit);
    $("input[name='domicilio']").val(proveedores[proveedor_id].domicilio);
    $("input[name='altura']").val(proveedores[proveedor_id].altura);
    $("input[name='piso']").val(proveedores[proveedor_id].piso);
    $("input[name='localidad']").val(proveedores[proveedor_id].localidad);
    $("input[name='departamento']").val(proveedores[proveedor_id].departamento);
    $("input[name='email']").val(proveedores[proveedor_id].email);
    $("input[name='telefono']").val(proveedores[proveedor_id].telefono);
}
