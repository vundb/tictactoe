<?php

namespace GameTest;

use Game\Dimension;
use PHPUnit\Framework\TestCase;

/**
 * Class DimensionTest
 * @package GameTest
 */
class DimensionTest extends TestCase
{
    public function testConstructor()
    {
        $width = 5;
        $height = 4;

        $dimension = new Dimension($width, $height);

        $this->assertSame($width, $dimension->getWidth());
        $this->assertSame($height, $dimension->getHeight());
    }

    public function testConstructorWithWrongArguments()
    {
        $dimension = new Dimension('5', '4');

        $this->assertSame(5, $dimension->getWidth());
        $this->assertSame(4, $dimension->getHeight());
    }

    public function testGetterSetter()
    {
        $width = 5;
        $height = 4;

        $dimension = new Dimension(0, 0);

        $this->assertSame($dimension, $dimension->setWidth($width));
        $this->assertSame($width, $dimension->getWidth());
        $this->assertSame($dimension, $dimension->setHeight($height));
        $this->assertSame($height, $dimension->getHeight());
    }
}
