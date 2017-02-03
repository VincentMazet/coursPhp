<?php

namespace App\Hour\Entity;

class Hour
{
    protected $id;

    protected $idStop;

    protected $idLine;

    protected $hour;
    
    protected $direction;
    
    protected $idStartStop;
    
    protected $idEndStop;


    public function __construct($id, $idStop, $idLine, $hour, $direction, $idStartStop, $idEndStop)
    {
        $this->id = $id;
        $this->idStop = $idStop;
        $this->idLine = $idLine;
        $this->hour = $hour;
        $this->direction = $direction;
        $this->idStartStop = $idStartStop;
        $this->idEndStop = $idEndStop;

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
    
    public function setDirection($direction)
    {
    	$this->direction = $direction;
    }
    
    public function setIdStartStop($idStartStop)
    {
    	$this->idStartStop = $idStartStop;
    }
    
    public function setIdEndStop($idEndStop)
    {
    	$this->idEndStop = $idEndStop;
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
    
    public function getDirection()
    {
    	return $this->direction;
    }
    
    public function getIdStartStop()
    {
    	return $this->idStartStop;
    }
    
    public function getIdEndStop()
    {
    	return $this->idEndStop;
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['idStop'] = $this->idStop;
        $array['idLine'] = $this->idLine;
        $array['hour'] = $this->hour;
        $array['direction'] = $this->direction;
        $array['idStartStop'] = $this->idStartStop;
        $array['idEndStop'] = $this->idEndStop;

        return $array;
    }
}
