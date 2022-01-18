<?php

			include('bd.php');

			$categoria=$_POST['categoria'];
            $id_categoria=$_POST['id_categoria'];

echo $categoria." ".$id_categoria;

            $consulta="UPDATE categoria set categoria='$categoria'
                        where id_categoria='$id_categoria'";//insercion a la base de datos
    //ejecusion de la consulta
            if(mysqli_query($conexion, $consulta)){
                $mensaje="Categoria ".$categoria." modificado correctamente ";
                Header("Location: ../../body-admin/categoria.php?mensaje3=".$mensaje."");
            }


    $conexion->close();  //serramos mysql
?>