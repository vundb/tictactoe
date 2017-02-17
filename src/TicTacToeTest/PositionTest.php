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
}
