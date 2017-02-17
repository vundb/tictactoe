<?php

namespace TicTacToe;

class Board
{
    const STATE_READY = 100;
    const STATE_NOT_READY = 200;

    /**
     * @var int
     */
    private $rowCount;

    /**
     * @var int
     */
    private $columnsCount;

    /**
     * @var array
     */
    private $boardStack;

    /**
     * @var
     */
    private $state;

    /***
     * Board constructor.
     * @param $rowCount
     * @param $columnsCount
     */
    public function __construct(int $rowCount, int $columnsCount)
    {
        $this->rowCount = $rowCount;
        $this->columnsCount = $columnsCount;
        $this->boardStack = [];
        $this->state = self::STATE_NOT_READY;
    }

    /**
     * @return int
     */
    public function validate(): int
    {
        return $this->rowCount / $this->columnsCount;
    }

    public function loadBoard()
    {
        for ($row = 0; $row < $this->rowCount; $row++) {
            for ($column = 0; $column < $this->columnsCount; $column++) {
                $this->boardStack[$row][$column] = new Position($row, $column);
            }
        }

        $this->state = self::STATE_READY;
    }

    /**
     * @return int
     */
    public function getState(): int
    {
        return $this->state;
    }

    /**
     * @param int $x
     * @param int $y
     * @return Position
     * @throws \Exception
     */
    public function getPosition(int $x, int $y): Position
    {
        if ($this->state !== self::STATE_READY) {
            throw new \Exception('Board not ready, run board->load()');
        }

        return $this->boardStack[$x][$y];
    }

}
