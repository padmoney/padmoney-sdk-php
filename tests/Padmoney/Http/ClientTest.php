<?php

declare(strict_types=1);

namespace Padmoney\Tests\Http;

use Padmoney\Http\Client;

class ClientTest extends \Padmoney\Tests\AbstractTestCase
{
    private $client;
    private $token = 'cGFkbW9uZXk=';
    private $secret = '123';

    public function setUp(): void
    {
        $authHeaders = [
            'Padmoney-Token' => $this->token,
            'Padmoney-Token-Secret' => $this->secret,
        ];
        $this->client = new Client('', $authHeaders);
    }

    public function tearDown(): void
    {
        $this->client = null;
    }

    public function testHeaders(): void
    {
        $headers = $this->client->headers()['headers'];

        $this->assertEquals($headers['Content-Type'], 'application/json');
        $this->assertEquals(preg_split('/\;/', $headers['User-Agent'])[0], "Padmoney-SDK-PHP");
        $this->assertEquals($headers['Padmoney-Token'], $this->token);
        $this->assertEquals($headers['Padmoney-Token-Secret'], $this->secret);
    }
}
