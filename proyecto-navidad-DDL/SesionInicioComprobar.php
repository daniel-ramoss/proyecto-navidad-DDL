<?php
//se comprueba si el usuario existe o no...
require_once "-com/Varios.php";
require_once "-com/Dao.php";

$identificador=$_REQUEST["identificador"];
$contrasenna=$_REQUEST["contrasenna"];

$arrayUsuario=DAO::usuarioObtener($identificador,$contrasenna);

if ($arrayUsuario != null) {
    DAO::marcarSesionComoIniciada($arrayUsuario);

    if (isset($_REQUEST["recordar"])) {
        DAO::establecerSesionCookie($arrayUsuario);
    }
    redireccionar("FormularioReservaVuelos.php");
} else {
    redireccionar("SesionInicioMostrarFormulario.php?datosErroneos");
}