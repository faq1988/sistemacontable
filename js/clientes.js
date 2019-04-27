$(document).ready(function() {
     bindEvents();
     loadClientes();
});

function bindEvents(){
    $(".send").off().click(function(e){
        e.preventDefault();
        e.stopPropagation();
        sendForm('.form-cliente');
    });
}


function loadClientes(){
    var data_table_config = {
        "ajax" :{
            "url" : base_url()+"/sistemacontable/clientes_controller/load_cliente",
            "type" : "post",
            "dataSrc": 'result',
        },
        "stateSave": false, // guarda el estado en el local storage (orden, pagina)
        "processing" : true,
        "deferRender": false,
        "searching"  : true,
        "orderClasses":false,
        "paging"     : false,
        "sPaginationType": "full_numbers",
        "iDisplayLength": 100,
        "autoWidth" : false,
        "aLengthMenu": [[50, 100, 200, -1], [50, 100, 200, "Todos"]],
        "stripeClasses": ["odd", "even"],
        "columns"    :[
            {   title: "Cliente"             , 
                data : "razon_social"          , 
                sortable:true,
            },
            {title: "Categoria IVA", data: "categoria_iva"},
            {title: "Documento"       , data: "val_select"  , sortable:true,
                render: function(d,t,f){
                    return f.tipo_documento+' - '+f.cuit;
                }
            },
            {title: "Localidad"            , 
            data : "localidad",
            sortable:true,
              
            },
            {title: "Domicilio",
                render: function(d,t,f){
                    return `${f.domicilio} ${(f.altura) ? f.altura:''} ${(f.piso) ? f.piso:''} ${(f.depto) ? f.depto:''}`;
                }
            },
            {title: "e-mail"      , data: "email"     },
            {title: "telefono"      , data: "telefono"  },
        ],
        "createdRow": function( row, data, dataIndex ) {
        },
        "order": [[ 0, 'desc' ], [1, 'asc']],
        "drawCallback": function(){
        },
        "initComplete": function(){
        }
    };

    $("#tbl_cliente").DataTable(data_table_config);
    $("#tbl_cliente").css("width","100%");
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
