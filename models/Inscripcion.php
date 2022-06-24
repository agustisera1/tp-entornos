<?php

class Inscripcion
{
    private $nro;
    private $fecha_inscripcion;
    private $estado;
    private $usuario;
    private $consulta;

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
    
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setUsuario($usuario)
    {
      $this->usuario = $usuario;  
    }
    
    public function getUsuario()
    {
      return $this->usuario;  
    }

    public function setConsulta($consulta)
    {
      $this->consulta = $consulta;  
    }
    
    public function getConsulta()
    {
      return $this->consulta;  
    }
}
