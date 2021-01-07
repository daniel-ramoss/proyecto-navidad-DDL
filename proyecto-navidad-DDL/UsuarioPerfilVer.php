<?php
//se muestran las caracteristicas del usuario que ha iniciado la session
require_once "-com/Dao.php";
require_once "-com/Varios.php";

if (DAO::haySesionIniciada()) {
    $nombre=$_SESSION["nombre"];
    $apellidos=$_SESSION["apellidos"];
    $identificador=$_SESSION["identificador"];
} else {
    redireccionar("CrearUsuarioMostrarFormulario.php");
}

?>

<html>
<head> <meta charset="UTF-8"> </head>
<body>
<h1>Perfil Usuario</h1>
<br>
<h4>Nombre: <?= $nombre ?> </h4>
<h4>Apellidos: <?= $apellidos ?> </h4>
<h4>Nombre Usuario: <?= $identificador ?></h4>
<br><br>
<a href="SesionCerrar.php">Cerrar Sesion</a><br><br>
<a href="FormularioReservaVuelos.php">Pagina Principal</a><br><br>
<a href="ListadoVuelosCompleto.php">Todos los Vuelos</a>

</body>
<style>
    html{
        background-color: #8bc9e3;
    }
</style>
</html>
