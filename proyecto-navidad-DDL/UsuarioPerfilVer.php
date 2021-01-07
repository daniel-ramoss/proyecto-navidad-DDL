//David
<?php
require_once "-com/Dao.php";
require_once "-com/Clases.php";

if (DAO::haySesionIniciada()){
    $_nombre=$_SESSION['nombre'];
    $_apellidos=$_SESSION['apellidos'];
    $_identificador=$_SESSION['identificador'];
}else
    redireccionar("CrearUsuarioMostrarFormulario.php");
?>

<html>
<head>Perfil Usuario</head>

<body>
<h3>Nombre: <?=$_nombre?> </h3>
<h3>Apellidos: <?=$_apellidos?> </h3>
<h3>Usuario: <?=$_identificador?> </h3>
<br>
<br>
<a href="SesionCerrar.php">Cerrar sesión.</a><br><br>
<a href="FormularioReservaVuelos.php">Página principal.</a><br><br>
<a href="ListadoVuelosCompleto.php">Ver Vuelos.</a><br><br>



</body>
</html>
