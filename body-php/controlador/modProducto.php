<?php

			include('bd.php');

			$categoria=$_POST['categoria'];
            $nameP=$_POST['nameP'];
            $hotel=$_POST['hotel'];
            $marca=$_POST['marca'];
            $modelo=$_POST['modelo'];
            $ns=$_POST['ns'];
            $estado=$_POST['estado'];
            $fechaR=date("Y/m/d");
            $id_user=$_POST["id_user"];
            $id_producto=$_POST["id_producto"];
           

//echo $categoria." ".$nameP." ".$hotel." ".$marca." ".$modelo." ".$ns." ".$estado." ".$fechaR." ".$id_user;
        $consulta="UPDATE productos set nombreP='$nameP',hotel='$hotel',marca='$marca',serie='$ns',fechaR='$fechaR',
                    fk_categoria='$categoria',modelo='$modelo',estado='$estado',fk_usuarioR='$id_user'
                        where id_producto='$id_producto'";//insercion a la base de datos
    //ejecusion de la consulta
            if(mysqli_query($conexion, $consulta)){
                $mensaje="Producto ".$nameP." modificado correctamente ";
                Header("Location: ../../body-admin/home.php?mensaje3=".$mensaje."");
            }


    $conexion->close();  //serramos mysql
?>