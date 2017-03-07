<?php

namespace App\Users\Entity;
/**
*User entity
*/
class User
{
    protected $id;

    protected $lastName;

    protected $firstName;

    protected $login;

    protected $password;

    public function __construct($id, $lastName, $firstName, $login, $password)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->login = $login;
        $this->password = $password;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function getLastName()
    {
        return $this->lastName;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['lastName'] = $this->lastName;
        $array['firstName'] = $this->firstName;
        $array['password'] = $this->password;
        $array['login'] = $this->login;

        return $array;
    }
}
