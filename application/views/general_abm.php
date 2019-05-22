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
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ABM's Generales
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
                <li><a href="#">ABM</a></li>
                <li class="active">ABM's Generales</li>
            </ol>
        </section>
        
        <div class="row">
            <!-- left column -->
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-success">
                <div class="box-header with-border" style='background-color:#00a65a;color:white'>
                    <h3 class="box-title"><b>Seleccione un ABM</b></h3>
                </div>
                <div class="box-body">
                    <select class="form-control">
                        <option value='rubro'>Rubro</option>
                        <option value='tipo_comprobante'>Tipo de comprobante</option>
                        <option>Otro</option>
                    </select>
                </div>
            </div>
        </div>
    <section class='content'>
        <?php echo $tipo_comprobante . $rubro ?>
    </section>
    </div>
</div>

</body>
</html>
