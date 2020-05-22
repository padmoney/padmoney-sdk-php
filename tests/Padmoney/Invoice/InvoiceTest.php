<?php

declare(strict_types=1);

namespace Padmoney\Tests\Invoice;

class InvoiceTest extends \Padmoney\Tests\AbstractTestCase
{
    protected $invoice;

    public function setUp()
    {
        $this->invoice = new \Padmoney\Invoice\Invoice([]);
        $this->invoice->client = $this->mock(\Padmoney\Http\Client::class);
    }

    public function tearDown()
    {
        $this->invoice = null;
    }

    public function testEndpoint()
    {
        $invoice = new \Padmoney\Invoice\Invoice([]);
        $this->assertSame('invoices', $invoice->endpoint());
    }

    public function testCreate()
    {
        $params = [
            'amount' => 42.99,
            'due_date' =>'2020-01-01',
        ];
        $stdClass = new \stdClass;
        $this->invoice->client
            ->expects($this->once())
            ->method('post')
            ->with('invoices', $params)
            ->willReturn($stdClass);

        $this->invoice->create($params);
    }

    public function testList()
    {
        $params = [
        ];
        $stdClass = new \stdClass;
        $this->invoice->client
            ->expects($this->once())
            ->method('get')
            ->with('invoices', $params)
            ->willReturn($stdClass);

        $this->invoice->list($params);
    }
}
