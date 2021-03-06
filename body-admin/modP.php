<?php
  session_start();
  if($_SESSION["logueado"] == TRUE) {
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../img/ico.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Warehouse-inventory</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="fondo2">

<div class="wrapper">
    <?php require("menuVertical.php");?>

    <div class="main-panel">
        <?php require("menuHorizontal.php");?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Modificar Productos</h4>
                            </div>
                            <div class="content">
                                <form action="../body-php/controlador/modProducto.php" method="post">
                                <?php
                                $nombreP=$_GET["nombreP"];
                                $serie=$_GET["serie"];
                                $marca=$_GET["marca"];
                                $modelo=$_GET["modelo"];
                                $estado=$_GET["estado"];
                                $id_user=$_SESSION["idemail"];
                                $id_producto=$_GET["id_producto"];
                                $categoria=$_GET["categoria"];
                                $hotel=$_GET["hotel"];
                                
                                ?>
                                <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Categoria</label>
                                                <select name="categoria" class="form-control">
                                                <?php
                                                    require("../body-php/controlador/bd.php");
                                                    $consulta = "SELECT * FROM categoria";
                                                    $resultado=$conexion->query($consulta);
                                                    while($fila = $resultado->fetch_array()){
                                                            
                                                                echo "<option value='".$fila['id_categoria']."'";
                                                                if($categoria==$fila['id_categoria']){
                                                                   echo "selected='selected'";
                                                                }
                                                                echo ">".$fila['categoria']."</option>";

                                                            
                                                    }
                                                    $conexion->close();
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" name="nameP" value="<?php echo $nombreP ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Hotel</label>
                                               <select name="hotel" class="form-control">
                                                <?php
                                                            
                                                               echo "<option value='Hotel trancilbania'";
                                                                if($hotel=="Hotel trancilbania"){
                                                                   echo "selected='selected'";
                                                                }
                                                                echo ">Hotel trancilbania</option>";

                                                                echo "<option value='Hotel xxxxx'";
                                                                if($hotel=="Hotel xxxxx"){
                                                                   echo "selected='selected'";
                                                                }
                                                                echo ">Hotel xxxxx</option>";

                                                
                                                ?>
                                                </select>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Marca</label>
                                                <input type="text" name="marca" value="<?php echo $marca ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Modelo</label>
                                                <input type="text" name="modelo" value="<?php echo $modelo ?>" class="form-control" required>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Numero de serie</label>
                                                <input type="text" name="ns" value="<?php echo $serie ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <input type="text" name="estado" value="<?php echo $estado ?>" class="form-control" required>
                                                </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
                                    <input type="hidden" name="id_producto" value="<?php echo $id_producto ?>">
                                                
                                    <button type="submit" name="enviar" class="btn btn-secondary btn-fill pull-right">Modificar</button>
                                    <div class="clearfix"></div>
                                   
                                    
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php require("pie.php"); ?>
        

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="../js/decimal.js" type="text/javascript"></script>
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
<?php
}
else
{
 echo "
  <html>
  <head>
  <meta http-equiv='REFRESH' content='0;url=../index.php'>
  </head>
  </html>";
}
?>