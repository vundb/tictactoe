<?php

namespace TicTacToe;

class Game
{
    /**
     * @var Player
     */
    private $player1;

    /**
     * @var Player
     */
    private $player2;

    /**
     * @var Board
     */
    private $board;

    /**
     * @param Player $player1
     * @param Player $player2
     * @param Board $board
     */
    public function __construct(Player $player1, Player $player2, Board $board)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->board = $board;
    }

    public function start()
    {

    }

}
