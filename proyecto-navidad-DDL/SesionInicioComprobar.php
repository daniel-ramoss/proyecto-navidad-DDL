<?php
//se comprueba si el usuario existe o no...
require_once "-com/Varios.php";
require_once "-com/Dao.php";


$identificador=$_REQUEST["identificador"];
$contrasenna=$_REQUEST["contrasenna"];

$arrayUsuario=DAO::obtenerUsuario($identificador,$contrasenna); 

if ($arrayUsuario != null) {
    marcarSesionComoIniciada($arrayUsuario);
    redireccionar("ListadoVuelosParametros.php");
} else {
    redireccionar("SesionInicioMostrarFormulario.php");
}