<?php

class Alarm extends AlarmAbs
{
    static function yell()
    {
        if(self::$isAlarmed == true) {
            self::$isYelling = true;
            echo "<font color='red'>ALARM!</font><br/>";
        }
        return false;
    }
    static function turnOffAlarm($pin1, $pin2){
        if($pin1 == $pin2) {
            self::$isYelling = false;
            echo "<br/><font color='red'>Alarm turned off!</font><br/>";
            return true;
        }
        echo "<br/><font color='red'>Wrong passphrase, turning alarm!</font><br/>";
        self::yell();
        return false;
    }
}