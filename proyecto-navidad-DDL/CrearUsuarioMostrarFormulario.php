<?php
//formulario para la creación del usuario en caso de que no exista
require_once "-com/Varios.php";
require_once "-com/Dao.php";
?>

<html>

<head>
    <meta charset='UTF-8'>
</head>

<body>

<h1>Crear Usuario</h1>
<div>
<form action='SesionInicioComprobar.php' method='get'>
    <p>Usuario: <input type='text' name='identificador' /></p>
    <p>Contraseña: <input type='password' name='contrasenna' /></p>
    <input type='submit' name='boton' value="Enviar" />
</form>
</div>
<br>
<a href='SesionInicioMostrarFormulario.php'>Ya estoy registrado</a>

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
        padding: 5px;
    }
</style>

</html>