<?php
require_once "-com/Dao.php";
require_once "-com/Varios.php";
if(DAO::haySesionIniciada()){
    $idVuelo=$_REQUEST["vuelo"];
    $idUsuario = $_SESSION["id"];
    DAO::pasajeroCrear($idVuelo,$idUsuario);
    redireccionar("ListadoVuelosCompleto.php");
}else{
    redireccionar("SesionInicioMostrarFormulario.php");
}
