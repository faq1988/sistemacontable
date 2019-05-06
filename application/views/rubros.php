<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Modulo de Rubros</title>
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
        Rubros
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="#">ABM</a></li>
        <li class="active">Rubros</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8 col-md-offset-2">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--form role="form"-->
            <form class='form-rubro' data-rubroid='' >
              <div class="box-body">

              <div class="form-group">
                  <label for="exampleInputEmail1">Descripción</label>
                  <input type="text" class="form-control" name="descripcion" placeholder="Descripción"
                  value="<?php echo set_value('descripcion'); ?>">
                </div>
               
             
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button  class="btn btn-primary send">Enviar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Rubros Activos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="tbl_rubro_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-6"></div>
                  <div class="col-sm-6"></div>
                </div>
                <div class="row"><div class="col-sm-12">
                <table id="tbl_rubro" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
  </section>
  </div>
 
  

</body>
</html>
