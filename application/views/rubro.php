<div class="row rubro abm"  <?php echo ($default_abm!='rubro') ?'hidden':''?>>
  <div class="col-md-8 col-md-offset-2">
    <div class="box box-primary">
      <form class='form-rubro ' data-rubroid='' >
        <div class="box-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Descripción</label>
            <input type="text" class="form-control" name="descripcion" placeholder="Descripción"
            value="<?php echo set_value('descripcion'); ?>">
          </div>
        </div>
        <div class="box-footer">
          <button  class="btn btn-primary send">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="row rubro abm"  <?php echo ($default_abm!='rubro') ?'hidden':''?> >
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Rubros Activos</h3>
      </div>
      <div class="box-body">
        <div id="tbl_rubro_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6"></div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <table id="tbl_rubro" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
