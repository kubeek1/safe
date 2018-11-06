<?php

class Safe extends SafeAbs
{
    private $lock;

    function getSecret(){
        if($this->isLocked() == true) {
            echo "<font color='red'>Access denied! Unlock the safe first.</font><br/>";
            return false;
        }
         return $this->secret;
    }
    function setSecret($secret){
        if($this->isLocked() == true){
            echo "<font color='red'>Access denied! Unlock the safe first.</font><br/>";
            return false;
        } else {
            $this->secret = $secret;
            echo "Secret has been saved as $secret.<br/>";
            return true;
        }
    }
    function getMechanism(){
        return $this->lock->getMechanism();
    }
    function getMessage(){
        return $this->lock->getMessage();
    }

    function isLocked(){
        return $this->lock->isLocked();
    }
    function lock(){
        $this->lock->lock();
    }
    function unlock($pin){
        if($this->isLocked() == false){
            echo "I'm already unlocked<br/>";
        } else {
            if ($this->lock->unlock($pin, $this->lock->getPin()) == false) {
                $this->lock->wrongPassphrase();
                Alarm::yell();
                return false;
            }

            echo "Safe's unlocked! ";
            return true;
        }
    }

    function turnOffAlarm($pin){
        echo "PIN1: $pin" . " Safe's PIN: ****";
        Alarm::turnOffAlarm($this->lock->getPin(), $pin);
    }

    function __construct(LockAbs $lock){
        $this->lock = $lock;
    }
}
