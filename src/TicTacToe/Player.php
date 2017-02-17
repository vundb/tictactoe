<?php

namespace TicTacToe;

class Player
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $isWinner;

    /**
     * @param $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->isWinner = false;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function getIsAWinner(): bool
    {
        return $this->isWinner;
    }

    public function markAsWinner()
    {
        $this->isWinner = true;
    }


}
