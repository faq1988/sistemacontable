$(document).ready(function() {
    bindEvents();
});

function bindEvents() {
    $("#btn_modal_rubro").click(function() {
        $("#modal-default").modal();
    });
    $("#modal-default").on('shown.bs.modal', function() {
        if(!$('.row_rubro').length){
            $("#tbl_rubro tbody").append(add_new_row());
            bindRubroEvents();
        }
    });
    $("#btn_clear_tbl_iva").click(function(){
        $("#tbl_iva tbody").empty();
    });
}

function bindRubroEvents() {
    $(".add_rubro").off().click(function() {
        $("#tbl_rubro tbody").append(add_new_row());
        bindRubroEvents();
    });
    $(".monto").off().on("input",function() {
        change_total(this);
    });
    $(".impuesto").off().change(function() {
        change_total(this);
    });
    $("#save").off().click(function(){
        fill_tbl_iva();
        $("#tbl_rubro tbody").empty();
    });
}

function build_impuesto_select(id) {
    return `<select name='impuesto_${id}' class="form-control impuesto">
    <option value='1.21'>IVA 21 %</option>
    <option value='1.10'>IVA 10 %</option>
    </select>`
}

function add_new_row() {
    let row_number = $('.row_rubro').length;

    return `<tr class='row_rubro'  id='${row_number}'>
                <td><input name='rubro_${row_number}' type='text' class='form-control input-sm rubro'></td>
                <td><input name='monto_${row_number}' type='text' class='form-control input-sm monto'></td>
                <td>
                ${build_impuesto_select(row_number)}
                </td>
                <td><input name='total_${row_number}' type='text' class='form-control input-sm total'></td>
                <td>
                    <i class='fa fa-times delete-rubro ' data-rubro='${row_number}' title='Eliminar rubro'></i>
                </td>
            </tr>`;
}

function fill_tbl_iva(){
    let rows=[];
    $(".row_rubro").each(function(){
        let e=$(this);
        let new_row="";
        new_row+=`<tr>
                    <td>${e.find('.rubro').val()}</td>  
                    <td>${e.find('.total').val()}</td>  
                    <td>${e.find('.monto').val()}</td>  
                    <td>0</td>  
                    <td>0</td>  
                    <td>${e.find('.impuesto').find('option:selected').text()}</td>   
             </tr>`;
        rows.push(new_row);
    });
    $("#tbl_iva").find('tbody').append(rows.join(''));
    $('#modal-default').modal('hide');//close
}

function change_total(element) {
    let id= $(element).closest('tr').attr('id');
    let monto =parseFloat($(`input[name=monto_${id}]`).val());
    let impuesto = parseFloat($(`select[name=impuesto_${id}]`).val());
    $(`input[name=total_${id}]`).val(Math.round(monto * impuesto,3));
}