<?php

namespace App\Passage\Entity;

class Passage
{
    protected $id;

    protected $nameStop;

    protected $numLine;

    protected $hour;

    protected $nextStop;

    protected $previousStop;

    public function __construct($id, $nameStop, $numLine, $hour, $nextStop, $previousStop)
    {
        $this->id = $id;
        $this->nameStop = $nameStop;
        $this->numLine = $numLine;
        $this->hour = $hour;
        $this->nextStop = $nextStop;
        $this->previousStop = $previousStop;

    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNameStop($nameStop)
    {
        $this->nameStop = $nameStop;
    }

    public function setNumLine($numLine)
    {
        $this->numLine = $numLine;
    }

    public function setHour($hour)
    {
        $this->hour = $hour;
    }

    public function setNextStop($nextStop)
    {
        $this->nextStop = $nextStop;
    }

    public function setPreviousStop($previousStop)
    {
        $this->previousStop = $previousStop;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNameStop()
    {
        return $this->nameStop;
    }
    public function getNumLine)
    {
        return $this->numLine
    } 
    public function getHour()
    {
        return $this->hour;
    }   
    public function getNextStop()
    {
        return $this->nextStop;
    }
    public function getPreviousStop()
    {
        return $this->previousStop;
    } 
    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['nameStop'] = $this->nameStop;
        $array['numLine'] = $this->numLine;
        $array['hour'] = $this->hour;
        $array['nextStop'] = $this->nextStop;
        $array['previousStop'] = $this->previousStop;

        return $array;
    }
}
