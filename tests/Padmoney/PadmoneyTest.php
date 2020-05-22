<?php

declare(strict_types=1);

namespace Padmoney\Tests;

use Padmoney\Padmoney;

class PadmoneyTest extends \Padmoney\Tests\AbstractTestCase
{
    public function testApiUriProduction()
    {
        $expected = Padmoney::PADMONEY_URI;

        $this->assertSame($expected, Padmoney::apiUri(null), 'null');
        $this->assertSame($expected, Padmoney::apiUri(''), 'empty');
        $this->assertSame($expected, Padmoney::apiUri('prod'), 'prod');
        $this->assertSame($expected, Padmoney::apiUri('Prod'), 'Prod');
        $this->assertSame($expected, Padmoney::apiUri('PROD'), 'PROD');
    }

    public function testApiUriSandbox()
    {
        $expected = Padmoney::PADMONEY_URI_SANDBOX;

        $this->assertSame($expected, Padmoney::apiUri('dev'));
        $this->assertSame($expected, Padmoney::apiUri('Dev'));
        $this->assertSame($expected, Padmoney::apiUri('DEV'));
    }
}
