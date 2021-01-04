<?php
// Luismi

require_once "Clases.php";
require_once "Varios.php";

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
            PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
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



    /* VUELO */

    private static function vueloCrearDesdeRs(array $fila): Vuelo
    {
        return new Vuelo($fila["id"], $fila["fechaIda"], $fila["fechaVuelta"], $fila["asientosTotal"], $fila["asientosLibres"],
            $fila["asientosComprados"], $fila["inicio"], $fila["destino"], $fila["precio"]);
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

    public static function vueloActualizar($vuelo)
    {
        self::ejecutarActualizacion(
            "UPDATE Vuelos SET nombre=? WHERE id=?",
            [$vuelo->getNombre(),$vuelo->getId() ]
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
            [$v]
        );
    }

    public static function vueloObtenerTodas(): array
    {
        $datos = [];
        $rs = self::ejecutarConsulta(
            "SELECT * FROM Vuelos ORDER BY fechaVuelo",
            []
        );

        foreach ($rs as $fila) {
            $vuelo = self::vueloCrearDesdeRs($fila);
            array_push($datos, $vuelo);
        }

        return $datos;
    }
    public static function vueloObtenerPorParametros(string $origen, string $destino,string $fechaIda,string $fechaVuelta): array
    {
        $datos = [];
        $rs = self::ejecutarConsulta(
            "SELECT * FROM Vuelos WHERE fechaIda=? & fechaVuelta=? & inicio=? & destino=?",
            [$fechaIda,$fechaVuelta,$origen,$destino]
        );
        foreach ($rs as $fila) {
            $vuelo = self::vueloCrearDesdeRs($fila);
            array_push($datos, $vuelo);
        }
       return $datos;
    }

}