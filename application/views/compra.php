<!DOCTYPE html>
<html>
<div class="col-sm-3">
  <label>CAI</label>
  <input name='cai' type='text' class='form-control input-sm'>
</div>
<div class="col-sm-3">

  <head>
    <div class="col-sm-3">
      <label>CAI</label>
      <input name='cai' type='text' class='form-control input-sm'>
    </div>
    <div class="col-sm-3">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Modulo de Compras</title>
      <!-- Tell the brow no-padser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Menu de Compras
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
            <li><a href="#">Compra y Venta</a></li>
            <li class="active">Compras</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row no-pad">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <div class="row no-pad form-group">
                    <div class="col-sm-6">
                      <label>Proveedor</label>
                      <select name='proveedor' class="form-control">
                        <option value='1'>proveedor 1</option>
                        <option value='2'>proveedor 2</option>
                        <option value='3'>proveedor 3</option>
                      </select>
                    </div>
                  </div>
                  <div class='row no-pad form-group'>
                    <div class="col-sm-6">
                      <label>Cuenta</label>
                      <input name='cta' type='text' class='form-control input-sm'>
                    </div>
                    <div class="col-sm-6">
                      <label>Razón Social</label>
                      <select name='razon_social' class="form-control">
                        <option value='1'>razón 1</option>
                        <option value='2'>razón 2</option>
                        <option value='3'>razón 3</option>
                      </select>
                    </div>
                  </div>
                  <div class='row no-pad form-group'>
                    <div class="col-sm-3">
                      <label>Cat. I.V.A.</label>
                      <select name='iva' class="form-control">
                        <option value='1'>cat_iva 1</option>
                        <option value='2'>cat_iva 2</option>
                        <option value='3'>cat_iva 3</option>
                      </select>
                    </div>
                    <div class="col-sm-3">
                      <label>Tipo.Doc.</label>
                      <select name='tipo_doc' class="form-control">
                        <option value='1'>tipo 1</option>
                        <option value='2'>tipo 2</option>
                        <option value='3'>tipo 3</option>
                      </select>
                    </div>
                    <div class="col-sm-3">
                      <label>Documento</label>
                      <input name='doc' type='text' class='form-control input-sm' />
                    </div>
                    <div class="col-sm-3">
                      <label>Pcia.</label>
                      <select name='prov' class="form-control">
                        <option value='1'>provincia 1</option>
                        <option value='2'>provincia 2</option>
                        <option value='3'>provincia 3</option>
                      </select>
                    </div>
                  </div>
                  <div class='row no-pad form-group'>
                    <div class="col-sm-3">
                      <label>Tipo comprobante</label>
                      <select name='t_comp' class="form-control">
                        <option value='1'>tipo comprobante 1</option>
                        <option value='2'>tipo comprobante 2</option>
                        <option value='3'>tipo comprobante 3</option>
                      </select>
                    </div>
                    <div class="col-sm-3">
                      <label>Tipo Factura</label>
                      <select name='t_fact' class="form-control">
                        <option value='1'>tipo factura 1</option>
                        <option value='2'>tipo factura 2</option>
                        <option value='3'>tipo factura 3</option>
                      </select>
                    </div>
                    <div class="col-sm-3">
                      <label>Sucursal</label>
                      <input name='suc' type='text' class='form-control input-sm' />
                    </div>
                    <div class="col-sm-3">
                      <label>Número</label>
                      <input name='num' type='text' class='form-control input-sm' />
                    </div>
                  </div>
                  <div class='row no-pad form-group'>
                    <div class="col-sm-3">
                      <label>Fecha</label>
                      <input name='date' class='datepicker form-control' type=' input-smtext' />
                    </div>
                    <div class="col-sm-2">
                      <label>Libro I.V.A.</label>
                      <input name='l_iva' type='text' class='form-control input-sm' />
                    </div>
                    <div class="col-sm-2">
                      <label>Asiento</label>
                      <input name='asiento' type='text' class='form-control input-sm' />
                    </div>
                    <div class="col-sm-2">
                      <label>Tipo</label>
                      <select name='tipo' class="form-control">
                        <option value='1'>Caja</option>
                        <option value='2'>Cta.Cte.</option>
                        <option value='3'>Banco</option>
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <label>&nbsp;</label>
                      <input name='tipo_id' type='text' class='form-control input-sm' />
                    </div>
                  </div>
                </div>
              </div>
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">I.V.A.</a></li>
                  <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Contabilidad</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="box">
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                        <table class="table table-condensed">
                          <tbody>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Rubro</th>
                              <th>Algo mas?</th>
                            </tr>
                            <tr>
                              <td>1.</td>
                              <td>trubro 1</td>
                              <td>
                                AM 1
                              </td>
                            </tr>
                            <tr>
                              <td>2.</td>
                              <td>Rubro 2</td>
                              <td> AM 2
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <div class="box">
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                        <table class="table table-condensed">
                          <tbody>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Task</th>
                              <th>Progress</th>
                              <th style="width: 40px">Label</th>
                            </tr>
                            <tr>
                              <td>1.</td>
                              <td>Update software</td>
                              <td>
                                <div class="progress progress-xs">
                                  <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                </div>
                              </td>
                              <td><span class="badge bg-red">55%</span></td>
                            </tr>
                            <tr>
                              <td>2.</td>
                              <td>Clean database</td>
                              <td>
                                <div class="progress progress-xs">
                                  <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                                </div>
                              </td>
                              <td><span class="badge bg-yellow">70%</span></td>
                            </tr>
                            <tr>
                              <td>3.</td>
                              <td>Cron job running</td>
                              <td>
                                <div class="progress progress-xs progress-striped active">
                                  <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                </div>
                              </td>
                              <td><span class="badge bg-light-blue">30%</span></td>
                            </tr>
                            <tr>
                              <td>4.</td>
                              <td>Fix and squish bugs</td>
                              <td>
                                <div class="progress progress-xs progress-striped active">
                                  <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                                </div>
                              </td>
                              <td><span class="badge bg-green">90%</span></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
              <div class="row no-pad">
                <div class="col-md-12">
                  <div class="box box-warning">
                    <div class="box-header with-border">
                      <div class="row no-pad form-group">
                        <div class="col-sm-2">
                          <label>Total</label>
                          <input name='total' type='text' class='form-control input-sm'>
                        </div>
                        <div class="col-sm-2">
                          <label>Neto</label>
                          <input name='neto' type='text' class='form-control input-sm'>
                        </div>
                        <div class="col-sm-2">
                          <label>Nro. Grab.</label>
                          <input name='nro_grab' type='text' class='form-control input-sm'>
                        </div>
                        <div class="col-sm-2">
                          <label>Monotributo</label>
                          <input name='mnto' type='text' class='form-control input-sm'>
                        </div>
                        <div class="col-sm-2">
                          <label>I.V.A.</label>
                          <input name='tot_iva' type='text' class='form-control input-sm'>
                        </div>
                        <div class="col-sm-2">
                          <label>Otros</label>
                          <input name='otros' type='text' class='form-control input-sm'>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box box-danger">
                <div class='row no-pad'>
                  <div class='col-sm-6'>
                    <form class="form-horizontal">
                      <label> Detalle Rubro:</label>
                      <div class="box-body">
                        <div class="form-group mb-5">
                          <label for="neto_grabado" class="col-sm-4 control-label">Neto Grabado:</label>
                          <div class="col-sm-6">
                            <input name='neto_grabado' type="text" placeholder='0.00' class="form-control" id="neto_grabado">
                          </div>
                        </div>
                        <div class="form-group mb-5">
                          <label for="excento" class="col-sm-4 control-label">Excento:</label>
                          <div class="col-sm-6">
                            <input name='excento' type="text" placeholder='0.00' class="form-control" id="excento">
                          </div>
                        </div>
                        <div class="form-group mb-5">
                          <label for="comp_mono" class="col-sm-4 control-label">Compras Monotrib:</label>
                          <div class="col-sm-6">
                            <input name='comp_mono' type="text" placeholder='0.00' class="form-control" id="comp_mono">
                          </div>
                        </div>
                        <div class="form-group mb-5">
                          <label for="tot_rubro" class="col-sm-4 control-label">Total Rubro:</label>
                          <div class="col-sm-6">
                            <input name='tot_rubro' type="text" placeholder='0.00' class="form-control" id="tot_rubro">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class='col-sm-6'>
                    <div class="box-body no-padding">
                      <table class="table table-condensed">
                        <tbody>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Rubro</th>
                            <th>Algo mas?</th>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>trubro 1</td>
                            <td>
                              AM 1
                            </td>
                          </tr>
                          <tr>
                            <td>2.</td>
                            <td>Rubro 2</td>
                            <td> AM 2
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row no-pad">
                <div class="col-md-12">
                  <div class="box box-success">
                    <div class="box-header with-border">
                      <div class="row no-pad form-group">
                        <div class="col-sm-3">
                          <label>CAI</label>
                          <input name='cai' type='text' class='form-control input-sm'>
                        </div>
                        <div class="col-sm-3">
                          <label>VTO</label>
                          <select name='vto' class="form-control">
                            <option value='<?php echo date('Y-m-d') ?>'><?php echo date('Y-m-d') ?></option>
                          </select>
                        </div>
                        <div class="col-sm-3">
                          <label>Desde</label>
                          <input name='desde' type='text' class='form-control input-sm'>
                        </div>
                        <div class="col-sm-3">
                          <label>Hasta</label>
                          <input name='hasta' type='text' class='form-control input-sm'>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </body>
</html>