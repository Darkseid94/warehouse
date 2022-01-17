<?php
if(isset($_POST["enviar"])) {
    require("bd.php");
    //recoleccion de datos y variables
        $categoria = $_POST["categoria"];

       // echo $nombreU." ".$pwd." ".$tipo;

    //fin recoleccion de datoa
        $consulta="INSERT INTO categoria (categoria) VALUES ('$categoria')";//insercion a la base de datos
        //ejecusion de la consulta
       if(mysqli_query($conexion, $consulta)){
            $mensaje2="Categoria ".$categoria." agregado correctamente";
           Header("Location: ../../body-admin/productos.php?mensaje2=".$mensaje2."");
        }
        $conexion->close();  //serramos mysql

            
} else {
        header("Location: ../../index.php");
}
//fin de verificacion de boton
?>