<?php

namespace GameTest;

use Game\Player;
use PHPUnit\Framework\TestCase;

/**
 * Class PlayerTest
 * @package GameTest
 */
class PlayerTest extends TestCase
{
    public function testConstructor()
    {
        $name = 'PLAYER_NAME';

        $player = new Player($name);

        $this->assertSame($name, $player->getName());
    }
}
