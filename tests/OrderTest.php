<?php

namespace LojaVirtual\PagarMe\Tests;

use LojaVirtual\PagarMe\PagarMe;
use LojaVirtual\PagarMe\Resources\Order;

class OrderTest extends BaseTesting
{
    public function testInstanceOf()
    {
        $order = new Order();
        $this->assertInstanceOf('LojaVirtual\PagarMe\Resources\Order', $order);
    }
}