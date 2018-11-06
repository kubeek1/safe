<?php

class PasswordLock extends LockAbs
{
    protected $message = 'Safe\'s passphrase: ';
    protected $mechanism = 'password';

    function unlock($pin, $pin2)
    {
        if($pin == $pin2) {
            $this->locked = false;
            return true;
        }
        return false;
    }

}