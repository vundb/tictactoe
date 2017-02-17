<?php

namespace TicTacToeTest;

use TicTacToe\Game;
use TicTacToe\Board;
use TicTacToe\Player;
use PHPUnit\Framework\TestCase;


class GameTest extends TestCase
{

    public function testCanInitializeGame()
    {
        $player1 = new Player('Max');
        $player2 = new Player('Moritz');

        $board = new Board(3, 3);

        $game = new Game($player1, $player2, $board);

        $this->assertInstanceOf(Player::class, $player1);
        $this->assertInstanceOf(Player::class, $player2);
        $this->assertInstanceOf(Board::class, $board);
        $this->assertInstanceOf(Game::class, $game);
    }
}
