<?php
//mostramos formulario para el usuario


?>



<html>

<head>
    <meta charset='UTF-8'>
</head>

<body>

<h1>Iniciar Sesión</h1>
<div>
<form action='SesionInicioComprobar.php' method='post'>
    <label><strong>NOMBRE USUARIO: </strong></label>
    <input type='text' name='identificador' value=''>
    <br><br>
    <label><strong>CONTRASEÑA: </strong></label>
    <input type='text' name='contrasenna' value=''>
    <br><br>
    <label for='recordar'>RECORDAR:</label>
    <input type='checkbox' name='recordar' id='recordar'>
    <br><br>
    <input type='submit' name='iniciarSesion' value='Iniciar Sesión'>
</form>
</div>
<br>
<a href='CrearUsuarioMostrarFormulario.php'>Registrarse</a>
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