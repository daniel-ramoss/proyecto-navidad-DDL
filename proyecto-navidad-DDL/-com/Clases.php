<?php
// Luismi

abstract class Dato
{
}


class Vuelo extends Dato
{
    private  $id;
    private  $fechaVuelo;
    private  $asientosTotal;
    private  $asientosLibres;
    private  $asientosComprados;
    private  $inicio;
    private  $destino;
    private  $precio;

    public function __construct(int $id, DateTime $fechaVuelo, int $asientosTotal, int $asientosLibres, int $asientosComprados, string $inicio, string $destino, float $precio)
    {
        $this->id = $id;
        $this->fechaVuelo = $fechaVuelo;
        $this->asientosTotal = $asientosTotal;
        $this->asientosLibres = $asientosLibres;
        $this->asientosComprados = $asientosComprados;
        $this->inicio = $inicio;
        $this->destino = $destino;
        $this->precio = $precio;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getFechaVuelo(): DateTime
    {
        return $this->fechaVuelo;
    }

    public function setFechaVuelo(DateTime $fechaVuelo): void
    {
        $this->fechaVuelo = $fechaVuelo;
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

    public function getInicio(): string
    {
        return $this->inicio;
    }

    public function setInicio(string $inicio): void
    {
        $this->inicio = $inicio;
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