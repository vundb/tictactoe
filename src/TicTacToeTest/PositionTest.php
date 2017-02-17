<?php

namespace TicTacToeTest;

use TicTacToe\Position;
use PHPUnit\Framework\TestCase;

class PositionTest extends TestCase
{
    public function testInitializePosition()
    {
        $position = new Position(0, 0);
        $this->assertEquals(Position::VALUE_NAN, $position->getValue());
    }

    public function testSetValue()
    {
        $position = new Position(1, 2);

        $this->assertEquals(1, $position->getPosx());
        $this->assertEquals(2, $position->getPosy());
        $this->assertEquals(Position::VALUE_NAN, $position->getValue());

        $position->setValue(Position::VALUE_O);
        $this->assertEquals(Position::VALUE_O, $position->getValue());

        $position->setValue(Position::VALUE_X);
        $this->assertEquals(Position::VALUE_X, $position->getValue());

    }
}
