function eliminarV(){
    var respuesta = confirm("estas seguro que deseas eliminar este producto? recuerda que una vez eliminada no podrás recuperarla ");
    if(respuesta == true){
        return true;
    }else{
        return false;
    }
}