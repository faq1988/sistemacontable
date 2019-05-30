var rubros = [];

$(document).ready(function() {
    bindEvents();
    if ($(".form-rubro").is(":visible"))
        load_rubro();
});

function bindEvents() {
    $(".send").off().click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        sendForm('.form-rubro');
    });
}

function reload_rubro() {
    $("#tbl_rubro").DataTable().ajax.reload();
}


function load_rubro() {
    var data_table_config = {
        "ajax": {
            "url": base_url() + "/sistemacontable/general_abm_controller/load_rubro",
            "type": "post",
            "data": { 'st': 0 },
            "dataSrc": function(json) {
                json.result.forEach(e => {
                    rubros[e.id] = e;
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
                title: "ID",
                data: "id",
                sortable: true,
            },
            {
                title: "Rubro",
                data: "descripcion",
                sortable: true,
            },
            {
                title: "",
                render: function(d, t, f) {
                    let action_icons = ``;
                    action_icons += `<i class='fa fa-pen edit-rubro' title='Editar rubro'></i>&nbsp;`;
                    action_icons += `<i class='fa fa-times delete-rubro' title='Eliminar rubro'></i>`;
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
            $('.delete-rubro').off().click(function() {
                let id = $(this).closest('tr').attr('id');
                eliminarRubro(id);
            });
            $('.edit-rubro').off().click(function() {
                let id = $(this).closest('tr').attr('id');
                fillFormRubro(id);
            });
        },
        "initComplete": function() {}
    };

    $("#tbl_rubro").DataTable(data_table_config);
    $("#tbl_rubro").css("width", "100%");
}

function sendForm(id) {
    let data = $(id).serialize() + `&id=${$(id).attr('data-rubroid')}`;
    $.ajax({
        type: 'POST',
        url: base_url() + "/sistemacontable/general_abm_controller/crear_rubro",
        data: data,
        success: function(data, textStatus, request) {
            if (data.success == false) {
                //seteo los errores en el formlario
                set_form_errors(id, data.response);
            } else {
                clear_form(id);
                $("#tbl_rubro").DataTable().ajax.reload();
            }
        },
        error: function(request, textStatus, error) {},
        dataType: 'json'
    });
}

function eliminarRubro(rubro_id) {
    $.ajax({
        type: 'POST',
        url: base_url() + "/sistemacontable/general_abm_controller/delete_rubro",
        data: { 'id': rubro_id },
        success: function(data, textStatus, request) {
            if (data.success == false) {
                //seteo los errores en el formlario
                set_form_errors(id, data.response);
            } else {
                $("#tbl_rubro").DataTable().ajax.reload();
            }
        },
        error: function(request, textStatus, error) {},
        dataType: 'json'
    });
}

function fillFormRubro(rubro_id) {
    $(".form-rubro").attr('data-rubroid', rubro_id);
    $("input[name='descripcion']").val(rubros[rubro_id].descripcion);

}