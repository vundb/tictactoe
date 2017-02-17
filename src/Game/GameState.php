<?php

namespace Game;

/**
 * Class GameState
 * @package Game
 */
class GameState
{
    /**
     * @var boolean
     */
    const STATE_UNDECIDED = true;

    /**
     * @var Board
     */
    private $board;

    /**
     * @var Player
     */
    private $currentTurn;

    /**
     * GameState constructor.
     * @param Board $board
     * @param Player[] $players
     */
    public function __construct(Board $board, array $players)
    {
        $board = new Board();
        $this->board = $board;
        $this->currentTurn = $players[0];
    }

    /**
     * @return Board
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * @return Player
     */
    public function getCurrentTurn()
    {
        return $this->currentTurn;
    }
}
