<?php

namespace Game;

/**
 * Class Dimension
 * @package Game
 */
class Dimension
{
    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * Dimension constructor.
     * @param int $width
     * @param int $height
     */
    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $width
     * @return Dimension
     */
    public function setWidth(int $width): Dimension
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param int $height
     * @return Dimension
     */
    public function setHeight(int $height): Dimension
    {
        $this->height = $height;
        return $this;
    }
}
