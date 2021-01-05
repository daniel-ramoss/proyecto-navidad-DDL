<?php
// Luismi

require_once "-com/Clases.php";
require_once "-com/Varios.php";
session_start();


class DAO
{
    private static $pdo = null;

    private function obtenerPdoConexionBD(): PDO
    {
        $servidor = "localhost";
        $bd = "aerolinea";
        $identificador = "root";
        $contrasenna = "";
        $opciones = [
            PDO::ATTR_EMULATE_PREPARES => false, // turn off emulation mode for "real" prepared statements
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
        ];

        try {
            $conexionBD = new PDO("mysql:host=$servidor;dbname=$bd;charset=utf8", $identificador, $contrasenna, $opciones);
        } catch (Exception $e) {
            error_log("Error al conectar: " . $e->getMessage()); // El error se vuelca a php_error.log
            exit('Error al conectar'); //something a user can understand
        }

        return $conexionBD;
    }

    private static function ejecutarConsulta(string $sql, array $parametros): array
    {
        if (!isset(self::$pdo)) self::$pdo = self::obtenerPdoConexionBd();

        $select = self::$pdo->prepare($sql);
        $select->execute($parametros);
        $rs = $select->fetchAll();

        return $rs;
    }

    private static function ejecutarActualizacion(string $sql, array $parametros): ?int
    {
        if (!isset(self::$pdo)) self::$pdo = self::obtenerPdoConexionBd();

        $actualizacion = self::$pdo->prepare($sql);
        $sqlConExito = $actualizacion->execute($parametros);

        if(!$sqlConExito) return null;
        else return $actualizacion->rowCount();
    }

    /* USUARIO */

    function obtenerUsuario(string $identificador, string $contrasenna): ?array
    {
        $rs = self::ejecutarConsulta(
            "SELECT * FROM Usuario WHERE identificador = ?  & BINARY contrasenna = ?",
            [$identificador,$contrasenna]
        );
        if ($rs) return self::marcarSesionComoIniciada($rs[0]);
        else return null;
    }

    function obtenerUsuarioCreado(string $identificador): ?array
    {
        $conexion = obtenerPdoConexionBD();
        $sql1 = "SELECT * FROM Usuario WHERE id = ?;";

        $select = $conexion->prepare($sql1);
        $select->execute([$identificador]); // Se añade el parámetro a la consulta preparada.
        $rs = $select->fetchAll();

        return $select->rowCount()==1 ? $rs[0] : null;
    }

    function marcarSesionComoIniciada(array $arrayUsuario)
    {
        // TODO Anotar en el post-it todos estos datos:
        $_SESSION["id"] = $arrayUsuario["id"];
        $_SESSION["identificador"] = $arrayUsuario["identificador"];
        $_SESSION["contrasenna"] = $arrayUsuario["contrasenna"];
        $_SESSION["nombre"] = $arrayUsuario["nombre"];
        $_SESSION["apellidos"] = $arrayUsuario["apellidos"];
    }

    function haySesionIniciada(): bool
    {
        // TODO Pendiente hacer la comprobación.

        // Está iniciada si isset($_SESSION["id"])
        return isset($_SESSION["id"]) ? true : false;

    }

    function cerrarSesion()
    {
        session_destroy();
        setcookie('codigoCookie', "");
        setcookie('identificador',"");
        unset($_SESSION);
        // TODO session_destroy() y unset de $_SESSION (por si acaso).
    }

    function borrarCookies()
    {
        setcookie("identificador", "", time() - 3600); // Tiempo en el pasado, para (pedir) borrar la cookie.
        setcookie("codigoCookie", "", time() - 3600); // Tiempo en el pasado, para (pedir) borrar la cookie.}
    }

    function establecerSesionCookie(array $arrayUsuario)
    {
        // Creamos un código cookie muy complejo (no necesariamente único).
        $codigoCookie = generarCadenaAleatoria(32); // Random...

        actualizarCodigoCookieEnBD($codigoCookie);

        // Enviamos al cliente, en forma de cookies, el identificador y el codigoCookie:
        setcookie("identificador", $arrayUsuario["identificador"], time() + 600);
        setcookie("codigoCookie", $codigoCookie, time() + 600);
    }

    function destruirSesionRamYCookie()
    {
        session_destroy();
        actualizarCodigoCookieEnBD(Null);
        borrarCookies();
        unset($_SESSION); // Por si acaso
    }



    /* VUELO */

    private static function vueloCrearDesdeRs(array $fila): Vuelo
    {
        return new Vuelo($fila["id"], $fila["fechaIda"], $fila["fechaVuelta"], $fila["asientosTotal"], $fila["asientosLibres"],
            $fila["asientosComprados"], $fila["inicio"],$fila["destino"],$fila["precio"]);
    }

    public static function vueloObtenerPorId(int $id): ?Vuelo
    {
        $rs = self::ejecutarConsulta(
            "SELECT * FROM Vuelos WHERE idVuelo=?",
            [$id]
        );
        if ($rs) return self::vueloCrearDesdeRs($rs[0]);
        else return null;
    }

    public static function vueloActualizar($v)
    {
        self::ejecutarActualizacion(
            "UPDATE Vuelos SET fechaIda=?,fechaVuelta=?,asientosTotal=?,
                asientosLibres=?, asientosComprados=?, origen= ?, destino=?, precio =? WHERE id=?",
            [$v->getFechaIda(),$v->getFechaVuelta(),$v->getAsientosTotal(),
                $v->getAsientosLibres(),$v->getAsientosComprados(),$v->getOrigen(),
                $v->getDestino(),$v->getPrecio(),$v->getId()]
        );
    }

    public static function vueloEliminar($id)
    {
        self::ejecutarActualizacion(
            "DELETE FROM Vuelos WHERE id=?",
            [$id]
        );
    }

    public static function vueloCrear(Vuelo $v)
    {
        self::ejecutarActualizacion(
            "INSERT INTO Vuelos (nombre) VALUES (?)",
            [$v->getFechaIda(),$v->getFechaVuelta(),$v->getAsientosTotal(),
                $v->getAsientosLibres(), $v->getAsientosComprados(),$v->getOrigen(),
                $v->getDestino(),$v->getPrecio()]
        );
    }

    public static function vueloObtenerTodas(): array
    {
        $datos = [];
        $rs = self::ejecutarConsulta(
            "SELECT * FROM Vuelos ORDER BY fechaIda",
            []
        );

        foreach ($rs as $fila) {
            $vuelo = self::vueloCrearDesdeRs($fila);
            array_push($datos, $vuelo);
        }

        return $datos;
    }
    public static function vueloObtenerPorParametros(string $origen, string $destino, string $fechaIda, string $fechaVuelta): array
    {
        $datos = [];
        $rs = self::ejecutarConsulta(
            "SELECT * FROM Vuelos WHERE fechaIda=? & fechaVuelta=? & inicio=? & destino=? ORDER BY inicio",
            [$fechaIda,$fechaVuelta,$origen,$destino]
        );
        foreach ($rs as $fila) {
            $vuelo = self::vueloCrearDesdeRs($fila);
            array_push($datos, $vuelo);
        }
       return $datos;
    }

    //Pasajero
    private static function pasajeroCrearDesdeRs(array $fila): Pasajero
    {
        return new Pasajero($fila["idPasajero"], $fila["idVuelo"], $fila["idUsuario"], $fila["numeroAsiento"], $fila["asientosLibres"]);
    }

    public static function pasajeroObtenerPorId(int $id): ?Pasajero
    {
        $rs = self::ejecutarConsulta(
            "SELECT * FROM Pasajeros WHERE idPasajero=?",
            [$id]
        );
        if ($rs) return self::pasajeroCrearDesdeRs($rs[0]);
        else return null;
    }

    public static function pasajeroActualizar(Pasajero $pasajero)
    {
        self::ejecutarActualizacion(
            "UPDATE Pasajeros SET idVuelo=?,idUsuario=?,numeroAsiento=? WHERE idPasajero=?",
            [$pasajero->getIdVuelo(),$pasajero->getIdUsuario(),$pasajero->getNumeroAsiento(),$pasajero->getIdPasajero()]
        );
    }

    public static function pasajeroEliminar($id)
    {
        self::ejecutarActualizacion(
            "DELETE FROM Pasajeros WHERE id=?",
            [$id]
        );
    }

    public static function pasajeroCrear(Pasajero $pasajero)
    {
        self::ejecutarActualizacion(
            "INSERT INTO Pasajeros (idVuelo,idUsuario,numeroAsiento) VALUES (?,?,?)",
            [$pasajero->getIdVuelo(),$pasajero->getIdUsuario(),$pasajero->getNumeroAsiento()]
        );
    }

    public static function pasajeroObtenerTodas(): array
    {
        $datos = [];
        $rs = self::ejecutarConsulta(
            "SELECT * FROM Pasajeros ORDER BY idVuelo",
            []
        );

        foreach ($rs as $fila) {
            $pasajero = self::pasajeroCrearDesdeRs($fila);
            array_push($datos, $pasajero);
        }

        return $datos;
    }
    public static function pasajeroObtenerPorParametros(int $idPasajero, int $idVuelo,int $idUsuario,int $numAsiento): array
    {
        $datos = [];
        $rs = self::ejecutarConsulta(
            "SELECT * FROM Pasajeros WHERE idPasajero=? & idVuelo=? & idUsuario=? & numAsiento=?",
            [$idPasajero,$idVuelo,$idUsuario,$numAsiento]
        );
        foreach ($rs as $fila) {
            $pasajero = self::pasajeroCrearDesdeRs($fila);
            array_push($datos, $pasajero);
        }
        return $datos;
    }

}