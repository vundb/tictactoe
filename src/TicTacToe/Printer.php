<?php

namespace TicTacToe;

class Printer
{
    /**
     * @var Board
     */
    private $board;

    /**
     * @param Board $board
     */
    public function __construct(Board $board)
    {
        $this->board = $board;
    }

    public function print()
    {
        if ($this->board->getState() === Board::STATE_NOT_READY) {
            throw new \Exception('Could not print board, because the is no board!');
        }

        var_dump($this->board->getBoard());
    }
}
