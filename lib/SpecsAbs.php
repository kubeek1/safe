<?php

abstract class SpecsAbs
{
    public $name;
    public $producer;

    function getName()
    {
        return $this->name;
    }
    function setName($name)
    {
        $this->name = $name;
    }

    function getProducer()
    {
        return $this->producer;
    }
    function setProducer($producer)
    {
        $this->producer = $producer;
    }

}