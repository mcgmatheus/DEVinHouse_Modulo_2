<?php

class Race
{

    private $id;
    private $name;
    private $created_at;

    public function __construct($name = null)
    {
        $this->name = $name;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
}
