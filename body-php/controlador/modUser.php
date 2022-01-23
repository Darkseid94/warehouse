<?php

			include('bd.php');

			$nombreU=$_POST['user'];
            $pwd=$_POST['pwd'];
            $id_user=$_POST['id_user'];

//echo $nombreC." ".$direccionC." ".$telefonoC." ".$id_cliente." ".$fecha;

            $consulta="UPDATE user set nombreU='$nombreU',pwd=md5('$pwd')
            where id_user='$id_user'";//insercion a la base de datos
    //ejecusion de la consulta
            if(mysqli_query($conexion, $consulta)){
                $mensaje="Usuario ".$nombreU." modificado correctamente ";
                Header("Location: ../../body-admin/usuarios.php?mensaje3=".$mensaje."");
            }


    $conexion->close();  //serramos mysql
?>