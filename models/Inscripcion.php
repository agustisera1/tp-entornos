<?php

class Inscripcion
{
    private $nro;
    private $fecha_inscripcion;
    private $usuario;

    public function setNro($nro)
    {
        $this->nro = $nro;
    }

    public function getNro()
    {
        return $this->nro;
    }

    public function setFechaInscripcion($fecha_inscripcion)
    {
        $this->fecha_inscripcion = $fecha_inscripcion;
    }

    public function getFechaInscripcion()
    {
        return $this->fecha_inscripcion;
    }

    public function setUsuario($usuario)
    {
      $this->usuario = $usuario;  
    }
    
    public function getUsuario()
    {
      return $this->usuario;  
    }
}
