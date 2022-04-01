<?php

namespace LojaVirtual\PagarMe\Tests;

use LojaVirtual\PagarMe\Tests\Mocks\AbstractResourceMock;

class AbstractResourceTest extends BaseTesting
{
    public function testMethods()
    {
        $this->assertEquals('GET', AbstractResourceMock::GET);
        $this->assertEquals('POST', AbstractResourceMock::POST);
        $this->assertEquals('PUT', AbstractResourceMock::PUT);
        $this->assertEquals('DELETE', AbstractResourceMock::DELETE);
    }
}