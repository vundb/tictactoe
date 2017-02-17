<?php

namespace Game;

/**
 * Class Player
 * @package Game
 */
class Player
{
    /**
     * @var string
     */
    private $name;

    /**
     * Player constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
