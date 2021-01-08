<?php
require_once "-com/Dao.php";
require_once "-com/Varios.php";

DAO::pasajeroEliminar( $_SESSION["id"]);
redireccionar("UsuarioPerfilVer.php");
?>
