<?php
//se muestran las caracteristicas del usuario que ha iniciado la session
require_once "-com/Dao.php";
require_once "-com/Varios.php";

if (DAO::haySesionIniciada()) {
    $id= $_SESSION["id"];
    $nombre=$_SESSION["nombre"];
    $apellidos=$_SESSION["apellidos"];
    $identificador=$_SESSION["identificador"];
    $rs=DAO::pasajeroObtenerTodasId($id);
}

?>

<html>
<head> <meta charset="UTF-8"> </head>
<body>
<h1>Perfil Usuario</h1>
<br>
<h4>Nombre: <?= $nombre ?> </h4>
<h4>Apellidos: <?= $apellidos ?> </h4>
<h4>Nombre Usuario: <?= $identificador ?></h4>
<table border='1'>
    <tr>
        <th>Origen</th>
        <th>Destino</th>
        <th>Fecha ida</th>
        <th>Fecha vuelta</th>
        <th>Cancelar Vuelo</th>
    </tr>
    <tr>
        <?php foreach ($rs as $vuelo) { ?>
    <tr>
        <td> <?=$vuelo-> getOrigen()?>      </td>
        <td> <?=$vuelo-> getDestino()?>     </td>
        <td> <?=$vuelo-> getFechaIda()?>    </td>
        <td> <?=$vuelo-> getFechaVuelta()?> </td>
        <td> <a href="PasajeroEliminar.php"</a> (X) </td>
    </tr>
    <?php } ?>
    </tr>
</table>
<br><br>
<a href="SesionCerrar.php">Cerrar Sesion</a><br><br>
<a href="FormularioReservaVuelos.php">Pagina Principal</a><br><br>
<a href="ListadoVuelosCompleto.php">Todos los Vuelos</a>

</body>
<style>
    html{
        background-color: #8bc9e3;
    }
</style>
</html>
