<?php
//mostramos formulario para el usuario
require_once "-com/Varios.php";
require_once "-com/Dao.php";

$conexion=obtenerPdoConexionBD();
if (haySesionIniciada()) {
    $existeUsuario=true;
} else {
    $existeUsuario=false;
}

?>



<html>

<head>
    <meta charset='UTF-8'>
</head>

<body>

<h1>Iniciar Sesión</h1>
<form action='SesionInicioComprobar.php' method='post'>
    <label><strong>NOMBRE USUARIO: </strong></label>
    <input type='text' name='identificador' value='Usuario...'>
    <br><br>
    <label><strong>CONTRASEÑA: </strong></label>
    <input type='text' name='contrasenna' value='Contraseña...'>
    <br><br>
    <label for='recordar'>RECORDAR:</label>
    <input type='checkbox' name='recordar' id='recordar'>
    <br><br>
    <input type='submit' name='iniciarSesion' value='Iniciar Sesión'>
</form>
<br>
<a href='ContenidoPublico1.php'>Mostrar Vuelos</a>

</body>

</html>