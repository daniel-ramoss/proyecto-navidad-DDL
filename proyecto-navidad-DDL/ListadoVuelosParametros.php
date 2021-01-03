<?php
// Dani
// se muestran los vuelos cuyos parámetros (introducidos en FormularioReservaVuelos) son similares
require_once "-com/Varios.php";
require_once "-com/Dao.php";

$conexion=obtenerPdoConexionBD();
$origen=$_REQUEST["origen"];
$destino=$_REQUEST["destino"];
$fechaIda=$_REQUEST["fechaIda"];
$fechaVuelta=$_REQUEST["fechaVuelta"];
$precio=$_REQUEST["precio"];

$vuelos=DAO::vueloObtenerPorParametros($origen, $destino, $fechaIda, $fechaVuelta, $precio); ///hay que crear esta función en el Dao

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
        <th>Fecha Ida</th>
        <th>Fecha Vuelta</th>
        <th>Precio</th>
        <th>Plazas Disponibles</th>
        <th>Reservar</th>
        <?php
        foreach ($vuelos as $vuelo) { ?>
        <tr>
            <td> <?=$vuelo->getOrigen()?>          </td>
            <td> <?=$vuelo->getDestino()?>         </td>
            <td> <?=$vuelo->getFechaIda()?>        </td>
            <td> <?=$vuelo->getFechaVuelta()?>     </td>
            <td> <?=$vuelo->getPrecio()?>          </td>
            <td> <?=$vuelo->getAsientosLibres()?>  </td>
            <td> <a href=''> (X) </a>              </td>
            <!-- Al hacer click en reserva:
                -redireccionamos a UsuarioPerfilver (se muestran el perfil del usuario y sus vuelos reservados)
                -redireccionamos a PaginaIntermedia ("Has reservado el vuelo Madrid-Paris (2/2/2021)...")
            -->
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
