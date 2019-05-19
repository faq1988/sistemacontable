<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Modulo de Compras</title>
  <!-- Tell the browser to be responsive to screen width -->
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
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <div class="row form-group">
                <div class="col-sm-6">
                  <label>Proveedor</label>
                  <select name='proveedor' class="form-control">
                    <option value='1'>proveedor 1</option>
                    <option value='2'>proveedor 2</option>
                    <option value='3'>proveedor 3</option>
                  </select>
                </div>
              </div>
              <div class='row form-group'>
                <div class="col-sm-6">
                  <label>Cuenta</label>
                  <input name='cta' type='text' class='form-control'>
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
              <div class='row form-group'>
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
                  <input name='doc' type='text' class='form-control'/>
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
              <div class='row form-group'>
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
                  <input name='suc' type='text' class='form-control'/>
                </div>
                <div class="col-sm-3">
                  <label>Número</label>
                  <input name='num' type='text' class='form-control'/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
</div>
</body>
</html>
