<?php
require_once "-com/Dao.php";
require_once "-com/Varios.php";

if (isset($_REQUEST["nombre"])        && isset($_REQUEST["apellidos"]) &&
    isset($_REQUEST["identificador"]) && isset($_REQUEST["contrasenna"])){
    //validamos si los campos introducidos son vacíos o no (se debe hacer una validación mejor)
    if ($_REQUEST["nombre"]=="" || $_REQUEST["nombre"]==null) {
        redireccionar("CrearUsuarioMostrarFormulario.php");
    } else {
        $nombre=$_REQUEST["nombre"];
    }
    if ($_REQUEST["apellidos"]=="" || $_REQUEST["apellidos"]==null) {
        redireccionar("CrearUsuarioMostrarFormulario.php");
    } else {
        $apellidos=$_REQUEST["apellidos"];
    }
    if ($_REQUEST["identificador"]=="" || $_REQUEST["identificador"]==null) {
        redireccionar("CrearUsuarioMostrarFormulario.php");
    } else {
        $identificador=$_REQUEST["identificador"];
    }
    if ($_REQUEST["contrasenna"]=="" || $_REQUEST["contrasenna"]==null) {
        redireccionar("CrearUsuarioMostrarFormulario.php");
    } else {
        $contrasenna=$_REQUEST["contrasenna"];
    }
    DAO::usuarioCrear($nombre, $apellidos, $identificador, $contrasenna);
    redireccionar("SesionInicioMostrarFormulario.php");
} else {
    redireccionar("CrearUsuarioMostrarFormulario.php");
}