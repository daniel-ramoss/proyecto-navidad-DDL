<?php
// Dani
// se muestran los vuelos cuyos parámetros (introducidos en FormularioReservaVuelos) son similares
//require_once "-com/Varios.php";
require_once "-com/Dao.php";
require_once "-com/Clases.php";

if (!isset($_REQUEST["origen"])) {
    $origen = " ";
} else {
    $origen = $_REQUEST["origen"];
}

if (!isset($_REQUEST["destino"])){
    $destino = " ";
} else {
    $destino = $_REQUEST["destino"];
}

if (!isset($_REQUEST["fechaIda"])) {
    $fechaIda = " ";
} else {
    $fechaIda = $_REQUEST["fechaIda"];
}

if (!isset($_REQUEST["fechaVuelta"])) {
    $fechaVuelta = " ";
} else{
    $fechaVuelta = $_REQUEST["fechaVuelta"];
}

$vuelos=DAO::vueloObtenerPorParametros($origen, $destino, $fechaIda, $fechaVuelta);
$sesionIniciada = DAO::haySesionIniciada();

?>

<html>
<head>
    <meta charset='UTF-8'>
    <?php
    if($sesionIniciada){?>
        <p>Hola, <a href='UsuarioPerfilVer.php'><?=$_SESSION["nombre"]?> <?=$_SESSION["apellidos"]?></a> <a href='SesionCerrar.php'>(Cerrar Sesión)</a></p>
        <?php
    }else{?>
        <p><a href='SesionInicioMostrarFormulario.php'>Inicio de Sesión</a></p>
        <?php
    }
    ?>
</head>
<body>
<h1>¡Reserva tus vuelos!</h1>
<h3>Lista de Vuelos: </h3>

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
        <td> <?=$vuelo->getOrigen()?>                 </td>
        <td> <?=$vuelo->getDestino()?>                </td>
        <td> <?=$vuelo->getFechaIda()?>               </td>
        <td> <?=$vuelo->getFechaVuelta()?>            </td>
        <td> <?=$vuelo->getPrecio()?>                 </td>
        <td> <?=$vuelo->getAsientosLibres()?>         </td>
        <td> <a href='UsuarioPerfilVer.php'> (X) </a> </td>
        <!-- Al hacer click en reserva:
           //Si hay sesion iniciada--
           -redireccionamos a UsuarioPerfilver (se muestran el perfil del usuario y sus vuelos reservados)
          //Si no hay sesion iniciada--
          -redireccionamos de UsuarioPerfilVer a SesionInicioMostrarFormulario
        -->
    <?php } ?>
    </tr>
</table>

<br><br>
<a href='FormularioReservaVuelos.php'>Volver</a><br><br>
<a href='ListadoVuelosCompleto.php'>Todos los Vuelos</a><br><br>>
</body>

<style>
    html{
        background-color: #8bc9e3;
    }
</style>

</html>
