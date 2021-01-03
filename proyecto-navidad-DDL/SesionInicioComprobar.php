<?php
//se comprueba si el usuario existe o no...
require_once "-com/Varios.php";
require_once "-com/Dao.php";

$conexion=obtenerPdoConexionBD();
$identificador=$_REQUEST["identificador"];
$contrasenna=$_REQUEST["contrasenna"];

$arrayUsuario=DAO::obtenerUsuario($identificador,$contrasenna); //crear en Dao o varios

if ($arrayUsuario != null) {
    marcarSesionComoIniciada($arrayUsuario);
    redireccionar("ListadoVuelosParametros.php");
} else {
    redireccionar("SesionInicioMostrarFormulario.php");
}