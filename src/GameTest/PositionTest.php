<?php

namespace GameTest;

use Game\Position;
use PHPUnit\Framework\TestCase;

/**
 * Class PositionTest
 * @package GameTest
 */
class PositionTest extends TestCase
{
    public function testConstructor()
    {
        $position = new Position(0, 0);

        $this->assertSame(0, $position->getX());
        $this->assertSame(0, $position->getY());
    }

    public function testGetterAndSetter()
    {
        $x = 10;
        $y = 11;

        $position = new Position(0, 0);

        $this->assertSame($position, $position->setX($x));
        $this->assertSame($x, $position->getX());
        $this->assertSame($position, $position->setY($y));
        $this->assertSame($y, $position->getY());
    }
}
