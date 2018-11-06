<?php

abstract class AlarmAbs
{
    static $isAlarmed = true;
    static $isYelling = false;

    abstract static function yell();
    abstract static function turnOffAlarm($pin1, $pin2);
}