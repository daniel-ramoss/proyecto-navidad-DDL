<?php
require_once "-com/Varios.php";
require_once "-com/Dao.php";

$vuelos=DAO::vueloObtenerTodas();
?>

<html>
<head> <meta charset="UTF-8"> </head>
<body>
<h1>Listado de Vuelos</h1>

<table border='1'>
    <tr>
        <th>Origen</th>
        <th>Destino</th>
        <th>Fecha ida</th>
        <th>Fecha vuelta</th>
        <th>Reservar</th>
    </tr>
    <tr>
    <?php foreach ($vuelos as $vuelo) { ?>
    <tr>
        <td> <?=$vuelo-> getOrigen()?>      </td>
        <td> <?=$vuelo-> getDestino()?>     </td>
        <td> <?=$vuelo-> getFechaIda()?>    </td>
        <td> <?=$vuelo-> getFechaVuelta()?> </td>
        <td> <a href="SesionInicioMostrarFormulario.php"</a> (X) </td>
    </tr>
    <?php } ?>
    </tr>
</table><br>
<a href="FormularioReservaVuelos.php">Pagina Principal</a><br><br>
<a href="SesionInicioMostrarFormulario.php">Iniciar Sesion</a>
<br><br>


</body>

<style>
    html{
        background-color: #8bc9e3;
    }
</style>
</html>
