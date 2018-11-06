<?php

abstract class LockAbs extends SpecsAbs
{
    protected $message, $mechanism, $pin;
    protected $locked = true;

    abstract function unlock($pin, $pin2);

    function isLocked(){
        return $this->locked;
    }
    function lock()
    {
        if (!$this->isLocked()){
            $this->locked = true;
            echo "Safe has been locked.<br/>";
            return true;
        }
        else {
            echo "\nyou can't lock it twice to make it harder to break.<br/>";
            return false;
        }
    }
    function getPin(){
        return $this->pin;
    }
    function getMechanism(){
        return $this->mechanism;
    }
    function getMessage(){
        return $this->message . $this->mechanism;
    }
    function wrongPassphrase(){
        echo "<font color='red'>Wrong access phrase!</font><br/>";
    }

    function __construct($pin){
        $this->pin = $pin;
    }

}