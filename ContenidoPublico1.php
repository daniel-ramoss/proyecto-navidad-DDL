//David

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
        <th>Vuelo</th>
        <th>Origen</th>
        <th>Destino</th>
        <th>Fecha ida</th>
        <th>Fecha vuelta</th>
        <th>Reservar</th>

    </tr>
    <tr>
        <?php
        foreach ($vuelos as $vuelo) { ?>
    <tr>
        <td> <?=$vuelos-> getVuelo()?>    </td>
        <td> <?=$vuelos-> getOrigen()?>   </td>
        <td> <?=$vuelos-> getDestino()?> </td>
        <td> <?=$vuelos-> getFecha()?> </td>
        <td><a href="SesionInicioMostrarFormulario.php"></a> </td>


    </tr>
    <?php } ?>
    </tr>
</table>

<br><br>


</body>
</html>

