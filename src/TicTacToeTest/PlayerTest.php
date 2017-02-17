<?php

namespace TicTacToeTest;

use TicTacToe\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    public function testInitializePlayer()
    {
        $player = new Player('Foo');
        $this->assertInstanceOf(Player::class, $player);
    }

    public function testSetPlayerName()
    {
        $player = new Player('Foo');
        $return = $player->getName();

        $this->assertEquals('Foo', $return);
    }

    public function testUserIsAWinner()
    {
        $player = new Player('Foo');
        $result = $player->getIsAWinner();
        $this->assertFalse($result);


        $player->markAsWinner();
        $result = $player->getIsAWinner();
        $this->assertTrue($result);
    }

}
