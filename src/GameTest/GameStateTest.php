<?php

namespace GameTest;

use Game\Board;
use Game\GameState;
use Game\Player;
use PHPUnit\Framework\TestCase;

/**
 * Class GameStateTest
 * @package GameTest
 */
class GameStateTest extends TestCase
{
    public function testConstructor()
    {
        $players = [new Player('A'), new Player('B')];
        $board = new Board();

        $game = new GameState($board, $players);

        $this->assertEquals($board, $game->getBoard());
        $this->assertSame($players[0], $game->getCurrentTurn());
    }
}
