<?php
date_default_timezone_set('America/Mexico_City');//hora local
session_start();
if($_SESSION["logueado"] == TRUE) {
if(isset($_POST["enviar"])) {
    require("bd.php");
    //recoleccion de datos y variables
        $categoria= $_POST["categoria"];
        $nameP=$_POST["nameP"];
        $hotel=$_POST["hotel"];
        $marca=$_POST["marca"];
        $modelo=$_POST["modelo"];
        $ns=$_POST["ns"];
        $estado=$_POST["estado"];
        $id_user=$_SESSION["idemail"];
        $fechaR=date("Y/m/d");

        //fin recoleccion de datoa
        $consulta="INSERT INTO productos (nombreP,hotel,marca,serie,fechaR,fk_categoria,modelo,estado,fk_usuarioR) VALUES 
                    ('$nameP','$hotel','$marca','$ns','$fechaR','$categoria','$modelo','$estado','$id_user')";//insercion a la base de datos
        //ejecusion de la consulta
       if(mysqli_query($conexion, $consulta)){
          $mensaje="Producto agregado correctamente";
          Header("Location: ../../body-admin/productos.php?mensaje=".$mensaje."");
        }
        $conexion->close();  //serramos mysql

            
} else {
        header("Location: ../../index.php");
}

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
//fin de verificacion de boton
?>