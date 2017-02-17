<?php
/**
 * Created by PhpStorm.
 * User: ricoherwig
 * Date: 17.02.17
 * Time: 15:17
 */

namespace DemoTest;


use Demo\Board;
use PHPUnit\Framework\TestCase;

/**
 * Class BoardTest
 * @package DemoTest
 */
class BoardTest extends TestCase
{
    private $board = null;

    protected function setUp()
    {
        parent::setUp();
        $this->board = new Board();
    }

    public function testBoardConstructor()
    {
        $this->assertInstanceOf(Board::class, $this->board);
    }

    public function testInitializeGrid()
    {
        $this->board->initializeGrid();
        $grid = $this->board->getGrid();

        $this->assertTrue(is_array($grid));
    }

    public function testGetFieldValue()
    {
        $this->assertNull($this->board->getFieldValue(2, 1));
    }

    public function testSetFieldValue()
    {
        $this->board->setFieldValue(0, 0, 1);
        $grid = $this->board->getGrid();

        $this->assertTrue(is_array($grid));
        $this->assertSame(1, $this->board->getFieldValue(0, 0));
    }

    public function testPlayerVictoryRow() {
        $this->board->initializeGrid();
        $this->assertFalse($this->board->hasPlayerWon(1));

        $this->board->setFieldValue(0, 0, 1);
        $this->board->setFieldValue(1, 0, 1);
        $this->board->setFieldValue(2, 0, 1);

        $this->assertTrue($this->board->hasPlayerWon(1));
    }

    public function testPlayerVictoryColumn() {
        $this->board->initializeGrid();

        $this->board->setFieldValue(0, 0, 1);
        $this->board->setFieldValue(0, 1, 1);
        $this->board->setFieldValue(0, 2, 1);

        $this->assertTrue($this->board->hasPlayerWon(1));
    }

    public function testPlayerVictoryDiagonal1() {
        $this->board->initializeGrid();

        $this->board->setFieldValue(0, 0, 1);
        $this->board->setFieldValue(1, 1, 1);
        $this->board->setFieldValue(2, 2, 1);

        $this->assertTrue($this->board->hasPlayerWon(1));
    }

    public function testPlayerVictoryDiagonal2() {
        $this->board->initializeGrid();

        $this->board->setFieldValue(0, 2, 1);
        $this->board->setFieldValue(1, 1, 1);
        $this->board->setFieldValue(2, 0, 1);

        $this->assertTrue($this->board->hasPlayerWon(1));
    }

    public function testMakePlayerMove() {
        $this->board->initializeGrid();

        $this->board->makePlayerMove(0, 1);
        $this->assertSame(0, $this->board->getFieldValue(0, 1));

        $this->board->makePlayerMove(1, 1);
        $this->assertSame(1, $this->board->getFieldValue(1, 1));
    }

    public function testIsMovePossible() {
        $this->board->initializeGrid();

        $this->board->setFieldValue(0, 0, 1);
        $this->assertFalse($this->board->isMovePossible(0, 0));
        $this->assertTrue($this->board->isMovePossible(0, 1));
    }
}