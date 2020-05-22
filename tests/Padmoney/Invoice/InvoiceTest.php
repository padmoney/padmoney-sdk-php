<?php

declare(strict_types=1);

namespace Padmoney\Tests\Invoice;

class InvoiceTest extends \Padmoney\Tests\AbstractTestCase
{
    protected $invoice;

    public function setUp(): void
    {
        $this->invoice = new \Padmoney\Invoice\Invoice([]);
        $this->invoice->client = $this->mock(\Padmoney\Http\Client::class);
    }

    public function tearDown(): void
    {
        $this->invoice = null;
    }

    public function testEndpoint(): void
    {
        $invoice = new \Padmoney\Invoice\Invoice([]);
        $this->assertSame('invoices', $invoice->endpoint());
    }

    public function testCancel(): void
    {
        $id = 'e9c613f3-1c50-4b39-9db6-b12ace1793bf';

        $stdClass = new \stdClass;
        $this->invoice->client
            ->expects($this->once())
            ->method('put')
            ->with("invoices/$id/cancel", [])
            ->willReturn($stdClass);

        $this->invoice->cancel($id);
    }

    public function testCreate(): void
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

    public function testGet(): void
    {
        $id = '2bede598-e27b-4505-bff1-052fd3e2f6ca';
        $stdClass = new \stdClass;
        $this->invoice->client
            ->expects($this->once())
            ->method('get')
            ->with("invoices/$id", [])
            ->willReturn($stdClass);

        $this->invoice->get($id);
    }

    public function testItems(): void
    {
        $id = '51224058-c908-4017-91a0-67a9e60e852b';

        $stdClass = new \stdClass;
        $this->invoice->client
            ->expects($this->once())
            ->method('get')
            ->with("invoices/$id/items", [])
            ->willReturn($stdClass);

        $this->invoice->items($id);
    }

    public function testList(): void
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
