<?php
//mostramos formulario para el usuario
require_once "-com/Varios.php";
require_once "-com/Dao.php";

if (DAO::haySesionIniciada()) redireccionar("ListadoVuelosCompleto.php");

$datosErroneos = isset($_REQUEST["datosErroneos"]);
?>



<html>

<head>
    <meta charset='UTF-8'>
</head>

<body>

<h1>Iniciar Sesión</h1>
<?php if ($datosErroneos) { ?>
    <p style='color: red;'>No se ha podido iniciar sesión con los datos proporcionados. Inténtelo de nuevo.</p>
<?php } ?>
<div>
<form action='SesionInicioComprobar.php' method='get'>
    <label><strong>NOMBRE USUARIO: </strong></label>
    <input type='text' name='identificador'>
    <br><br>
    <label><strong>CONTRASEÑA: </strong></label>
    <input type='password' name='contrasenna'>
    <br><br>
    <label for='recordar'>RECORDAR:</label>
    <input type='checkbox' name='recordar' id='recordar'>
    <br><br>
    <input type='submit' name='iniciarSesion' value='Iniciar Sesión'>
</form>
</div>
<br>
<a href='CrearUsuarioMostrarFormulario.php'>Registrarse</a>
<a href="SesionCerrar.php">Cerrar Sesion</a>
<a href="UsuarioPerfilVer.php">Ver Perfil</a>
<br><br>
<a href="FormularioReservaVuelos.php">Pagina Principal</a><br><br>
<a href='ListadoVuelosCompleto.php'>Mostrar Vuelos</a>

</body>
<style>
    html{
        background-color: #8bc9e3;
    }
    div{
        border: 1px solid black;
        width: 400px;
    }
    form {
        padding: 10px;
    }
</style>

</html>