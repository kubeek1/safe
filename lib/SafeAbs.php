<?php

abstract class SafeAbs extends SpecsAbs
{
    protected $secret;

    abstract function getSecret();
    abstract function setSecret($secret);
    abstract function unlock($pin);
}