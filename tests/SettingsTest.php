<?php

namespace LojaVirtual\PagarMe\Tests;

use LojaVirtual\PagarMe\Settings;

class SettingsTest extends BaseTesting
{
    public function testSetPublicKey()
    {
        $this->assertEmpty(Settings::getPublicKey());
        Settings::setPublicKey('test');
        $this->assertNotEmpty(Settings::getPublicKey());
    }

    public function testSetSecretKey()
    {
        $this->assertEmpty(Settings::getSecretKey());
        Settings::setSecretKey('test');
        $this->assertNotEmpty(Settings::getSecretKey());
    }
}