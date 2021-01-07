<?php
// Dani
//mostramos fecha ida, fecha vuelta, destino, lugar de origen...
//links a contenidos publicos...
//....

?>

<html>
<head>
    <meta charset='UTF-8'>
</head>
<body>
<h1>¡Reserva tus Vuelos!</h1>
<br>
<div>
<form action='ListadoVuelosParametros.php' method='post'>
    <label><strong>Origen: </strong></label>
    <input type='text' name='origen' value=''>
    <label><strong>Destino: </strong></label>
    <input type='text' name='destino' value=''><br><br>
    <label><strong>Fecha Ida: </strong></label>
    <input type='date' name='fechaIda' value=''>
    <label><strong>Fecha Vuelta: </strong></label>
    <input type='date' name='fechaVuelta' value=''><br><br>
    <input type='submit' name='btnBuscaVuelos' value='Buscar'>
</form>
</div>
<br>

<a href='ListadoVuelosCompleto.php'> Listado de Vuelos </a><br><br>
<a href='CrearUsuarioMostrarFormulario.php'>Registrarse  </a>
<!-- El segundo link debería llevar a CrearUsuarioMostrarFormulario.php y luego ese formulario tendrá un link debajo tipo:
 -ya tengo una cuenta (la cual llevará a SesionInicioMostrarFormulario.php al hacer click en esa opción)-->
<a href='UsuarioPerfilVer.php'>Ver Perfil </a><br><br>
<a href='SesionCerrar.php'> Cerrar Sesion </a>
</body>
<style>
    html{
        background-color: #8bc9e3;
    }
    div{
        border: 1px solid black;
        width: 500px;
        height: 120px;
    }
    form {
        padding: 10px;
    }
</style>
</html>

