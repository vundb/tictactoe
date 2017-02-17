<?php

namespace Game;

/**
 * Class Board
 * @package Game
 */
class Board
{
    /**
     * @var Dimension
     */
    private $dimension;

    /**
     * @var array
     */
    private $position;

    /**
     * Board constructor.
     * @param Dimension $dimension
     */
    public function __construct(Dimension $dimension = null)
    {
        if (is_null($dimension)) {
            $dimension = new Dimension(3, 3);
        }

        $this->dimension = $dimension;

        $this->position = [];

        for ($i = 0; $i < $this->dimension->getWidth(); $i++) {
            for ($j = 0; $j < $this->dimension->getHeight(); $j++) {
                $this->position[$i][$j] = 0;
            }
        }
    }

    /**
     * @return Dimension
     */
    public function getDimension()
    {
        return $this->dimension;
    }

    /**
     * @param Position $position
     * @return int
     */
    public function getValueAtPosition(Position $position): int
    {
        return $this->position[$position->getX()][$position->getY()];
    }

    /**
     * @param Position $position
     * @param int $int
     * @throws \Exception
     */
    public function setValueAtPosition(Position $position, int $int)
    {
        if ($position->getX() > $this->dimension->getWidth() - 1 || $position->getY() > $this->dimension->getHeight() - 1) {
            throw new \Exception("Fehler");
        }

        $this->position[$position->getX()][$position->getY()] = $int;
    }
}
