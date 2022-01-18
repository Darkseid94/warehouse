<?php
    
    require("bd.php");
    $id_categoria=$_GET["id_categoria"];
    $categoria=$_GET["categoria"];
    //echo $eliminar;
            //eliminamos
            $consulta="SELECT * FROM productos WHERE fk_categoria='$categoria'";
            $resultado=mysqli_query($conexion, $consulta);
            if(mysqli_num_rows($resultado)==0){
                $consulta="DELETE FROM categoria WHERE id_categoria='$id_categoria'";
           //ejecusion de la consulta
                if(mysqli_query($conexion, $consulta)){
                    $mensaje="Categoria ".$categoria." eliminado correctamente ";
                    Header("Location: ../../body-admin/categoria.php?mensaje3=".$mensaje."");
                }
            }else {
                $mensaje="No puedes eliminar la categoria ".$categoria." por que tiene relacion con uno o mas productos";
                Header("Location: ../../body-admin/categoria.php?mensaje3=".$mensaje."");
            }
        $conexion->close();  //serramos mysql
    
?>