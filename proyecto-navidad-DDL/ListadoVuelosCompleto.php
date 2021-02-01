<?php
require_once "-com/Varios.php";
require_once "-com/Dao.php";

$vuelos=DAO::vueloObtenerTodas();
$sesionIniciada=DAO::haySesionIniciada();
?>

<html>
<head> <meta charset="UTF-8"> </head>
<?php
if($sesionIniciada){?>
    <p>Hola, <a href='UsuarioPerfilVer.php'><?=$_SESSION["nombre"]?> <?=$_SESSION["apellidos"]?></a> <a href='SesionCerrar.php'>(Cerrar Sesión)</a></p>
    <?php
}else{?>
    <p><a href='SesionInicioMostrarFormulario.php'>Inicio de Sesión</a></p>
    <?php
}
?>
<body>
<h1>Listado de Vuelos</h1>

<table border='1'>
    <tr>
        <th>Id</th>
        <th>Origen</th>
        <th>Destino</th>
        <th>Fecha ida</th>
        <th>Fecha vuelta</th>
        <th>Reservar</th>
    </tr>
    <tr>
    <?php foreach ($vuelos as $vuelo) {
        $id=$vuelo->getId(); ?>
    <tr>
        <td> <?=$vuelo->getId()?>      </td>
        <td> <?=$vuelo-> getOrigen()?>      </td>
        <td> <?=$vuelo-> getDestino()?>     </td>
        <td> <?=$vuelo-> getFechaIda()?>    </td>
        <td> <?=$vuelo-> getFechaVuelta()?> </td>
        <td> <a href="PasajeroGuardar.php?vuelo=<?=$vuelo-> getId()?>"> (X) </a></td>
    </tr>
    <?php } ?>
    </tr>
</table><br>
<a href="FormularioReservaVuelos.php">Pagina Principal</a><br><br>

<br><br>

</body>

<style>
    html{
        background-color: #8bc9e3;
    }
</style>
</html>
