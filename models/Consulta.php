<?php

class Consulta
{
    private $id;
    private $fechaHoraInicio;
    private $fechaHoraFin;
    private $modalidad;
    private $link;
    private $cupo;
    private $cupoDisponible;
    private $profesor;
    private $materia;
    private $estado;
    private $motivoBloqueo;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getFechaHoraInicio()
    {
        return $this->fechaHoraInicio;
    }

    public function setFechaHoraInicio($fechaHoraInicio)
    {
        $this->fechaHoraInicio = $fechaHoraInicio;
    }
    public function getFechaHoraFin()
    {
        return $this->fechaHoraFin;
    }

    public function setFechaHoraFin($fechaHoraFin)
    {
        $this->fechaHoraFin = $fechaHoraFin;
    }
    public function getModalidad()
    {
        return $this->modalidad;
    }

    public function setModalidad($modalidad)
    {
        $this->modalidad = $modalidad;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getCupo()
    {
        return $this->cupo;
    }

    public function setCupo($cupo)
    {
        $this->cupo = $cupo;
    }

    public function getProfesor()
    {
        return $this->profesor;
    }

    public function setProfesor($profesor)
    {
        $this->profesor = $profesor;
    }

    public function getMateria()
    {
        return $this->materia;
    }

    public function setMateria($materia)
    {
        $this->materia = $materia;
    }
    
    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    
    public function getMotivoBloqueo()
    {
        return $this->motivoBloqueo;
    }

    public function setMotivoBloqueo($motivoBloqueo)
    {
        $this->motivoBloqueo = $motivoBloqueo;
    }

    public function getCupoDisponible()
    {
        return $this->cupoDisponible;
    }

    public function setCupoDisponible($listadoInscriptos)
    {
        $this->cupoDisponible = $this->cupo - count($listadoInscriptos);
    }
}
