<?php

namespace App\Stop\Entity;

class Stop
{
    protected $id;

    protected $name;

    protected $description;

    protected $latitude;

    protected $longitude;

    public function __construct($id, $name, $description, $latitude, $longitude)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->latitude = $latitude;
        $this->longitude = $longitude;


    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['name'] = $this->name;
        $array['description'] = $this->description;
        $array['latitude'] = $this->latitude;
        $array['longitude'] = $this->longitude;

        return $array;
    }
}
