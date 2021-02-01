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
<form action='UsuarioGuardar.php' method='post'>
    <label><strong>Nombre: </strong></label>
    <input type='text' name='nombre'><br><br>
    <label><strong>Apellidos: </strong></label>
    <input type='text' name='apellidos'><br><br>
    <label><strong>Usuario: </strong></label>
    <input type='text' name='identificador' /><br><br>
    <label><strong>Contraseña: </strong></label>
    <input type='password' name='contrasenna' /><br><br>
    <input type='submit' name='boton' value="Enviar" />
</form>
</div>
<br>
<a href='SesionInicioMostrarFormulario.php'>Ya estoy registrado</a><br><br>
<a href='FormularioReservaVuelos.php'>Pagina Inicial</a>

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