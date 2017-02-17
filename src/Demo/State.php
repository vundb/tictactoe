<?php
/**
 * Created by PhpStorm.
 * User: michaelboll
 * Date: 17.02.17
 * Time: 15:33
 */

namespace Demo;


class State
{
    public $sign = '_';

    public function __construct()
    {

    }
    public function setSign($sign)
    {
        $this->sign = $sign;
    }
}