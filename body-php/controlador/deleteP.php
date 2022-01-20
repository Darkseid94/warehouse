<?php
    
    require("bd.php");
    $id_producto=$_GET["id_producto"];
    //echo $eliminar;
            //eliminamos
                $consulta="DELETE FROM productos WHERE id_producto='$id_producto'";
           //ejecusion de la consulta
                if(mysqli_query($conexion, $consulta)){
                    $mensaje="Producto ".$categoria." eliminado correctamente ";
                    Header("Location: ../../body-admin/home.php?mensaje3=".$mensaje."");
                }
           
        $conexion->close();  //serramos mysql
    
?>