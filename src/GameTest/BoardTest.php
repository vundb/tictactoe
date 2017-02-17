<?php

namespace GameTest;

use Game\Board;
use Game\Position;
use PHPUnit\Framework\TestCase;

/**
 * Class BoardTest
 * @package GameTest
 */
class BoardTest extends TestCase
{
    public function testBoardConstructor()
    {
        $board = new Board();

        $dimension = $board->getDimension();

        $this->assertSame(3, $dimension->getWidth());
        $this->assertSame(3, $dimension->getHeight());
    }

    public function testGetValueAtPosition()
    {
        $board = new Board();

        $value = $board->getValueAtPosition(new Position(2, 2));

        $this->assertSame(0, $value);
    }

    public function testSetValueAtPosition()
    {
        $position = new Position(2, 2);
        $board = new Board();

        $this->assertSame(0, $board->getValueAtPosition(new Position(0, 0)));

        $board->setValueAtPosition($position, 3);

        $this->assertSame(3, $board->getValueAtPosition($position));
    }

    public function testSetValueAtPositionWithOutOfRange()
    {
        $board = new Board();

        $this->expectException(\Exception::class);

        $board->setValueAtPosition(new Position(3, 3), 3);
    }
}
