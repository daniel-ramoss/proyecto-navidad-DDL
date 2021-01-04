<?php
// Luismi

abstract class Dato
{
}


class Vuelo extends Dato
{
    private  $id;
    private  $fechaIda;
    private  $fechaVuelta;
    private  $asientosTotal;
    private  $asientosLibres;
    private  $asientosComprados;
    private  $origen;
    private  $destino;
    private  $precio;

    public function __construct(int $id, string $fechaIda, string $fechaVuelta, int $asientosTotal, int $asientosLibres, int $asientosComprados, string $origen, string $destino, float $precio)
    {
        $this->setId($id);
        $this->setFechaIda($fechaIda);
        $this->setFechaVuelta($fechaVuelta);
        $this->setAsientosTotal($asientosTotal);
        $this->setAsientosLibres($asientosLibres);
        $this->setAsientosComprados($asientosComprados);
        $this->setOrigen($origen);
        $this->setDestino($destino);
        $this->setPrecio($precio);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getFechaIda(): string
    {
        return $this->fechaIda;
    }

    public function setFechaIda(string $fechaIda): void
    {
        $this->fechaIda = $fechaIda;
    }

    public function getFechaVuelta(): string
    {
        return $this->fechaVuelta;
    }

    public function setFechaVuelta(string $fechaVuelta): void
    {
        $this->fechaVuelta = $fechaVuelta;
    }

    public function getAsientosTotal(): int
    {
        return $this->asientosTotal;
    }

    public function setAsientosTotal(int $asientosTotal): void
    {
        $this->asientosTotal = $asientosTotal;
    }

    public function getAsientosLibres(): int
    {
        return $this->asientosLibres;
    }

    public function setAsientosLibres(int $asientosLibres): void
    {
        $this->asientosLibres = $asientosLibres;
    }

    public function getAsientosComprados(): int
    {
        return $this->asientosComprados;
    }


    public function setAsientosComprados(int $asientosComprados): void
    {
        $this->asientosComprados = $asientosComprados;
    }

    public function getOrigen(): string
    {
        return $this->origen;
    }

    public function setOrigen(string $origen): void
    {
        $this->origen = $origen;
    }

    public function getDestino(): string
    {
        return $this->destino;
    }

    public function setDestino(string $destino): void
    {
        $this->destino = $destino;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
    }
}
class Pasajero extends Dato
{
    private  $idPasajero;
    private  $idVuelo;
    private  $idUsuario;
    private  $numeroAsiento;

    public function __construct(int $idPasajero, int $idVuelo, int $idUsuario, int $numeroAsiento)
    {
        $this->idPasajero = $idPasajero;
        $this->idVuelo = $idVuelo;
        $this->idUsuario = $idUsuario;
        $this->numeroAsiento = $numeroAsiento;
    }


    public function getIdPasajero(): int
    {
        return $this->idPasajero;
    }


    public function setIdPasajero(int $idPasajero): void
    {
        $this->idPasajero = $idPasajero;
    }


    public function getIdVuelo(): int
    {
        return $this->idVuelo;
    }


    public function setIdVuelo(int $idVuelo): void
    {
        $this->idVuelo = $idVuelo;
    }


    public function getIdUsuario(): int
    {
        return $this->idUsuario;
    }


    public function setIdUsuario(int $idUsuario): void
    {
        $this->idUsuario = $idUsuario;
    }


    public function getNumeroAsiento(): int
    {
        return $this->numeroAsiento;
    }

    public function setNumeroAsiento(int $numeroAsiento): void
    {
        $this->numeroAsiento = $numeroAsiento;
    }
}
class Usuario extends Dato
{

    private  $identificador;
    private  $contrasenna;
    private  $nombre;
    private  $apellidos;
    private  $codigoCookie;


}