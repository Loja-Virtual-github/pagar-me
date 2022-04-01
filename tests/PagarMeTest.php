<?php

namespace LojaVirtual\PagarMe\Tests;

use LojaVirtual\PagarMe\PagarMe;

class PagarMeTest extends BaseTesting
{
    public function testInstanceOf()
    {
        $pagarMe = new PagarMe('public-key', 'secret-key');
        $this->assertInstanceOf('LojaVirtual\PagarMe\PagarMe', $pagarMe);
    }

    public function testBuildClassName()
    {
        $snakeCase = 'snake_case';
        $this->assertEquals(
            'LojaVirtual\PagarMe\Resources\SnakeCase',
            PagarMe::buildResourceClassName($snakeCase)
        );

        $upperCase = 'UPPER_CASE';
        $this->assertEquals(
            'LojaVirtual\PagarMe\Resources\UpperCase',
            PagarMe::buildResourceClassName($upperCase)
        );

        $lowerCase = 'lower_case';
        $this->assertEquals(
            'LojaVirtual\PagarMe\Resources\LowerCase',
            PagarMe::buildResourceClassName($lowerCase)
        );
    }

    public function testCallValidResource()
    {
        $pagarMe = new PagarMe('public-key', 'secret-key');
        $resource = $pagarMe->order();
        $this->assertInstanceOf('LojaVirtual\PagarMe\Resources\Order', $resource);
    }

    /**
     * @expectedException \DomainException
     */
    public function testCallInvalidResource()
    {
        $pagarMe = new PagarMe('public-key', 'secret-key');
        $order = $pagarMe->invalid();
    }
}