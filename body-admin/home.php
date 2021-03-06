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
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Reporte</h4>
                            </div>
                            <div class="content">
                                <form action="../body-php/controlador/addProductos.php" method="post" enctype="multipart/form-data">
                                 
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Numero de serie</label>
                                                <input type="text" name="nameP" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" name="enviar" class="btn btn-secondary btn-fill pull-right">Agregar</button>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <?php                 
                                                if(isset($_GET["mensaje"])){
                                                    $mensaje=$_GET["mensaje"];
                                                    echo "  
                                                    <div class='alert alert-info'>
                                                        <center><a href='#' class='alert-link' >".$mensaje."</a></center>
                                                    </div>";
                                                }
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Productos</h4>
                                <?php                 
                                    if(isset($_GET["mensaje3"])){
                                        $mensaje2=$_GET["mensaje3"];
                                             echo "  
                                                <div class='alert alert-info'>
                                                    <center><a href='#' class='alert-link' >".$mensaje2."</a></center>
                                                </div>";
                                    }
                                ?>
                            </div>
                            <div class="content">
                            <div class="row">
                            <form  method='GET'>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="buscador" class="form-control" placeholder="Introduce aqu?? el producto que deseas buscar">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-secondary btn-fill pull-left">Buscar</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                            </div>
                            
                                    
                            <div class="content table-full-width">
                                <table class="table table-hover table-striped">
                                <tbody>
                                        <td>Nombre de Prodcuto</td>
                                    	<td>Numero de serie</td>
                                    	<td>Marca</td>
                                    	<td>Modelo</td>
                                        <td>Estado</td>
                                        <td>Hotel</td>
                                        <td>Categoria</td>
                                        <td>Fecha de Registro o modificaci??n</td>
                                        <td>Usuario</td>
                                        <td>Accion</td>
                                    
                                    <?php
                                    require("../body-php/controlador/bd.php");
                                    
                                    $auxBuscador="";//la consulta contine texto asi que inicialmente al regexp le indicamos que busque texto
							        if(isset($_GET['buscador'])){
								        $auxBuscador=$_GET['buscador'];
							        }

                                    $consulta = "SELECT p.nombreP,p.serie,p.marca,p.modelo,c.categoria,p.estado,
                                                p.hotel,p.fechaR,u.nombreU,p.id_producto,p.fk_categoria
                                                from productos p
                                                INNER JOIN categoria c 
                                                    on p.fk_categoria=c.id_categoria
                                                INNER JOIN user u 
                                                    on p.fk_usuarioR=u.id_user
                                                WHERE p.nombreP REGEXP '$auxBuscador'
                                                or p.serie REGEXP '$auxBuscador'
                                                or p.marca REGEXP '$auxBuscador'
                                                or p.modelo REGEXP '$auxBuscador'
                                                ORDER BY nombreP ASC";
                                                
                                    $resultado=$conexion->query($consulta);

                                    while($fila = $resultado->fetch_array()){
                                        
                                        echo "<tr>";

                                        echo "<td>".$fila['nombreP']."</td>";  
                                        echo "<td>".$fila['serie']."</td>"; 
                                        echo "<td>".$fila['marca']."</td>";
                                        echo "<td>".$fila['modelo']."</td>";
                                        echo "<td>".$fila['estado']."</td>";
                                        echo "<td>".$fila['hotel']."</td>";
                                        echo "<td>".$fila['categoria']."</td>";
                                        echo "<td>".$fila['fechaR']."</td>";
                                        echo "<td>".$fila['nombreU']."</td>";
                                        echo "<td>
                                                <a href='modP.php?id_producto=".$fila['id_producto']."&nombreP=".$fila['nombreP']."&serie=".$fila['serie']."
                                                &marca=".$fila['marca']."&modelo=".$fila['modelo']."&estado=".$fila['estado']."&categoria=".$fila['fk_categoria']."
                                                &hotel=".$fila['hotel']."' >
                                                    <i class='pe-7s-pen'></i>
                                                </a>
                                                <i>|</i>
                                                <a href='../body-php/controlador/deleteP.php?id_producto=".$fila['id_producto']."' onclick='return eliminarV()'>
                                                    <i class='pe-7s-trash'></i>
                                                </a>
                                            </td>";
                                        echo "</tr>"; 

                                    }
                                    $conexion->close();
                                    ?>
                                     
                                    </tbody>
                                </table>

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
    
    <script src="../js/alertas.js" type="text/javascript"></script>
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
