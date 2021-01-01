<?php
// Dani
// se muestran los vuelos cuyos parámetros (introducidos en FormularioReservaVuelos) son similares
require_once "-com/Varios.php";
require_once "-com/Dao.php";

$conexion=obtenerPdoConexionBD();

$vuelos=DAO::vueloObtenerPorParametros(); ///hay que crear esta función en el Dao
///
?>

<html>
<head>
    <meta charset='UTF-8'>
</head>
<body>
<h1>¡Reserva tus vuelos!</h1>
<h4>Lista de Vuelos: </h4>
<table border="1">
    <tr>
        <th>Origen</th>
        <th>Destino</th>
        <th>Fecha Vuelo</th>
        <th>Precio</th>
        <th>Plazas Disponibles</th>
        <?php
        foreach ($vuelos as $vuelo) { ?>
        <tr>
            <td> <?=$vuelo->getOrigen()?>          </td>
            <td> <?=$vuelo->getDestino()?>         </td>
            <td> <?=$vuelo->getFechaVuelo()?>      </td>
            <td> <?=$vuelo->getPrecio()?>          </td>
            <td> <?=$vuelo->getAsientosLibres()?>  </td>
        </tr>
        <?php } ?>
    </tr>
</table>

</body>
<style>
    html{
        background-color: #8bc9e3;
    }
</style>
</html>
