<?php

namespace TicTacToeTest;

use TicTacToe\Board;
use PHPUnit\Framework\TestCase;
use TicTacToe\Position;

class BoardTest extends TestCase
{

    public function testInitializeBoard()
    {
        $board = new Board(3, 3);
        $this->assertInstanceOf(Board::class, $board);
    }

    public function testGetFieldCorrectCount()
    {
        $board = new Board(3, 3);
        $result = $board->validate();

        $this->assertNotNull($result);
        $this->assertInternalType('int', $result);
        $this->assertEquals(1, $result);
    }

    public function testGetFieldWrongCount()
    {
        $board = new Board(3, 4);
        $result = $board->validate();

        $this->assertNotNull($result);
        $this->assertNotEquals(1, $result);
    }

    public function testLoadBoard()
    {
        $board = new Board(3, 3);
        $this->assertEquals(Board::STATE_NOT_READY, $board->getState());

        $board->loadBoard();
        $this->assertEquals(Board::STATE_READY, $board->getState());

        $position = $board->getPosition(0, 0);
        $this->assertInstanceOf(Position::class, $position);
        $this->assertEquals(Position::VALUE_NAN, $position->getValue());
    }
}
