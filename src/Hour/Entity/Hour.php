<?php

namespace App\Hour\Entity;

class Hour
{
    protected $id;

    protected $idStop;

    protected $idLine;

    protected $direction;

    protected $hour;

    protected $depart;

    public function __construct($id, $idStop, $idLine, $hour, $depart)
    {
        $this->id = $id;
        $this->idStop = $idStop;
        $this->idLine = $idLine;
        $this->hour = $hour;
        $this->depart = $depart;

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

    public function setDirection($direction)
    {
      $this->direction = $direction;
    }

    public function sethour($hour)
    {
        $this->hour = $hour;
    }

    public function setDepart($depart)
    {
      $this->depart = $depart;
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

    public function getDirection()
    {
        return $this->direction;
    }

    public function gethour()
    {
        return $this->hour;
    }

    public function getDepart()
    {
        return $this->depart;
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['idStop'] = $this->idStop;
        $array['idLine'] = $this->idLine;
        $array['direction'] = $this->direction;
        $array['hour'] = $this->hour;
        $array['depart'] = $this->depart;

        return $array;
    }
}
