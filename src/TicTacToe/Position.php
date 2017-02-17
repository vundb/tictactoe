<?php

namespace TicTacToe;

class Position
{
    const VALUE_X = 100;
    const VALUE_O = 200;
    const VALUE_NAN = 300;

    /**
     * @var int
     */
    private $posx;

    /**
     * @var int
     */
    private $posy;

    /**
     * @var string
     */
    private $value;

    /**
     * @param int $posx
     * @param int $posy
     */
    public function __construct(int $posx, int $posy)
    {
        $this->posx = $posx;
        $this->posy = $posy;
        $this->value = self::VALUE_NAN;
    }

    /**
     * @return int
     */
    public function getPosx(): int
    {
        return $this->posx;
    }

    /**
     * @return int
     */
    public function getPosy(): int
    {
        return $this->posy;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value)
    {
        $this->value = $value;
    }

}
