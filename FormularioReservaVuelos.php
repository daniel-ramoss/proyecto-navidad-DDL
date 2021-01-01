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
    <input type='text' name='Origen' value='Ciudad'>
    <label><strong>Destino: </strong></label>
    <input type='text' name='Destino' value='Ciudad'><br><br>
    <label><strong>Fecha Ida: </strong></label>
    <input type='date' name='FechaIda' value='Fecha Ida'>
    <label><strong>Fecha Vuelta: </strong></label>
    <input type='date' name='FechaVuelta' value='Fecha Vuelta'><br><br>
    <input type='submit' name='btnBuscaVuelos' value='Buscar'>
</form>
</div>
<br>
<a href="ContenidoPublico1.php">Listado de Vuelos 1</a><br><br>
<a href='SesionInicioMostrarFormulario.php'> Iniciar Sesión </a>
</body>
<style>
    html{
        background-color: #8bc9e3;
    }
    div{
        border: 1px solid black;
        width: 500px;
    }
    form {
        padding: 5px;
    }
</style>
</html>

