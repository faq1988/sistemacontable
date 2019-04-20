<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Modulo de Clientes</title>
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
        Clientes
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
        <li><a href="#">ABM</a></li>
        <li class="active">Clientes</li>
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
              <!-- <h3 class="box-title">Seleccione el Cliente</h3> -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--form role="form"-->
            <form class='form-cliente'>
              <div class="box-body">

              <div class="form-group">
                  <label for="exampleInputEmail1">Razón social</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="razon_social" placeholder="Razón social"
                  value="<?php echo set_value('razon_social'); ?>">
                </div>
               

                <div class="row">
                <div class="col-md-12" >
                        <div class="col-md-4">    
                            <div class="form-group">
                            <label>Categoría IVA</label>
                            <select class="form-control" name="categoria_iva">
                                <option>Monotributo</option>
                                <option>Responsable inscripto</option>                    
                            </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label>Tipo de documento</label>
                            <select class="form-control" name="tipo_documento">
                                <option>DNI</option>
                                <option>Libreta cívica</option>                    
                                <option>Libreta enrolamiento</option>                    
                            </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="exampleInputEmail1">CUIT / CUIL</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="cuit" placeholder="Cuit / Cuil"
                            value="<?php echo set_value('cuit'); ?>">
                            </div>                            
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-md-12">
                        <div class="col-md-6">                            
                            <div class="form-group">
                            <label for="exampleInputEmail1">Domicilio</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="domicilio" placeholder="Domicilio"
                            value="<?php echo set_value('domicilio'); ?>">
                            <?php echo form_error('domicilio', '<span style="color:red">', '</span>'); ?>
                            </div>                            
                        </div>
                        <div class="col-md-2">     
                            <div class="form-group">
                            <label for="exampleInputEmail1">Altura</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="altura" placeholder="Altura"
                            value="<?php echo set_value('altura'); ?>">
                            <?php echo form_error('altura', '<span style="color:red">', '</span>'); ?>
                            </div>                            
                        </div>
                        <div class="col-md-2">     
                            <div class="form-group">
                            <label for="exampleInputEmail1">Piso</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="piso" placeholder="Piso"
                            value="<?php echo set_value('piso'); ?>">
                            </div>                            
                        </div>
                        <div class="col-md-2">     
                            <div class="form-group">
                            <label for="exampleInputEmail1">Departamento</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="departamento" placeholder="Departamento"
                            value="<?php echo set_value('departamento'); ?>">
                            </div>                            
                        </div>
                    </div>
                </div>
                
                <div class="row">
                <div class="col-md-12">
                        <div class="col-md-6">     
                            <div class="form-group">
                            <label for="exampleInputEmail1">Localidad</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="localidad" placeholder="Localidad"
                            value="<?php echo set_value('localidad'); ?>">
                            </div>                            
                        </div>
                        <div class="col-md-6">  
                            <div class="form-group">
                            <label for="exampleInputEmail1">Teléfono</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="telefono" placeholder="Teléfono"
                            value="<?php echo set_value('telefono'); ?>">
                            </div>                            
                        </div>
                    </div>
                </div>

                
                <div class="form-group">
                <label for="exampleInputEmail1">Correo electrónico</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Correo electrónico"
                value="<?php echo set_value('email'); ?>">
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
    
  </div>
 
  

</body>
</html>
