<?php

namespace App\Hour\Entity;

class Hour
{
    protected $id;

    protected $idStop;

    protected $idLine;

    protected $hour;

    public function __construct($id, $idStop, $idLine, $hour)
    {
        $this->id = $id;
        $this->idStop = $idStop;
        $this->idLine = $idLine;
        $this->hour = $hour;

    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setidStop($idStop)
    {
        $this->idStop = $idStop;
    }

    public function setidLine($idLine)
    {
        $this->idLine = $idLine;
    }

    public function sethour($hour)
    {
        $this->hour = $hour;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getidStop()
    {
        return $this->idStop;
    }

    public function getidLine()
    {
        return $this->idLine;
    }

    public function gethour()
    {
        return $this->hour;
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['idStop'] = $this->idStop;
        $array['idLine'] = $this->idLine;
        $array['hour'] = $this->hour;

        return $array;
    }
}
