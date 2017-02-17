<?php
/**
 * Created by PhpStorm.
 * User: michaelboll
 * Date: 17.02.17
 * Time: 15:24
 */

namespace Demo;


class Player
{
    public $number = 0;
    public $sign = 'x';

    public function __construct($number, $sign)
    {
        $this->number = $number;
        $this->sign = $sign;
    }
}