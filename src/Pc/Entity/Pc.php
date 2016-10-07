<?php

namespace App\Pc\Entity;

class Pc
{
    protected $idpc;

    protected $ospc;

    public function __construct($idpc, $ospc)
    {
        $this->idpc = $idpc;
        $this->ospc = $ospc;
    }

    public function setIdPC($idpc)
    {
        $this->idpc = $idpc;
    }

    public function setOsPC($ospc)
    {
        $this->ospc = $ospc;
    }

    public function getIdPC()
    {
        return $this->idpc;
    }
    public function getOsPC()
    {
        return $this->ospc;
    }
    
    public function toArray()
    {
        $array = array();
        $array['idpc'] = $this->idpc;
        $array['ospc'] = $this->ospc;

        return $array;
    }
}
