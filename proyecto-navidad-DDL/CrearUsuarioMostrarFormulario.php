<?php
require_once "-com/Varios.php";
require_once "-com/Dao.php";
?>



<html>

<head>
    <meta charset='UTF-8'>
</head>



<body>

<h1>Crear Usuario</h1>

<form action='SesionInicioComprobar.php' method='get'>
    <p>Usuario: <input type='text' name='identificador' /></p>
    <p>Contraseña: <input type='password' name='contrasenna' /></p>
    <input type='submit' name='boton' value="Enviar" />
</form>


</body>

</html>