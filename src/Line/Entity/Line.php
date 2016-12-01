<?php

namespace App\Line\Entity;

class Line
{
    protected $id;

    protected $name;

   protected $going;

   protected $comming;

    public function __construct($id, $name, $going, $comming)
    {
        $this->id = $id;
        $this->name = $name;
        $this->going = $going;
        $this->comming = $comming;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setGoing($going)
    {
        $this->going = $going;
    }

    public function setComming($comming)
    {
        $this->comming = $comming;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getGoing()
    {
        return $this->going;
    }

    public function getComming()
    {
        return $this->comming;
    }
    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['name'] = $this->name;
        $array['going'] = $this->going;
        $array['comming'] = $this->comming;

        return $array;
    }
}
