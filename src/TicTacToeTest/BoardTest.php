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
        $this->assertEquals(1, $board->validate());

        $board->loadBoard();
        $this->assertEquals(Board::STATE_READY, $board->getState());

    }

    public function testBoardPositions()
    {
        $board = new Board(3, 3);
        $board->loadBoard();

        $position1 = $board->getPosition(0, 0);
        $this->assertInstanceOf(Position::class, $position1);
        $this->assertEquals(Position::VALUE_NAN, $position1->getValue());

        $position2 = $board->getPosition(1, 1);
        $this->assertInstanceOf(Position::class, $position2);
        $this->assertEquals(1, $position2->getPosx());
        $this->assertEquals(1, $position2->getPosy());

        $position3 = $board->getPosition(2, 0);
        $this->assertInstanceOf(Position::class, $position3);
        $this->assertEquals(2, $position3->getPosx());
        $this->assertEquals(0, $position3->getPosy());
    }

    public function testBoardException()
    {
        $board = new Board(3, 3);
        $this->expectException(\Exception::class);
        $board->getPosition(0, 0);
    }

    public function testBoardReset()
    {
        $board = new Board(3, 3);

        $board->loadBoard();
        $this->assertEquals(Board::STATE_READY, $board->getState());

        $board->resetBoard();
        $this->assertEquals(Board::STATE_NOT_READY, $board->getState());
    }
}
