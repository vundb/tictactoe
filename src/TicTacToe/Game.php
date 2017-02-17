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
     * @var Printer
     */
    private $printer;

    /**
     * @param Player $player1
     * @param Player $player2
     * @param Board $board
     * @param Printer $printer
     */
    public function __construct(Player $player1, Player $player2, Board $board, Printer $printer)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->board = $board;
        $this->printer = $printer;
    }

    public function start()
    {

    }

}
