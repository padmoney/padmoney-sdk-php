<?php

namespace Padmoney\Invoice;

class Invoice extends \Padmoney\AbstractClient implements InvoiceInterface
{
    /**
     * Constructor
     *
     * @param array  $args
     */
    public function __construct(array $args)
    {
        $endpoint = 'invoices';
        parent::__construct($args, $endpoint);
    }

    /**
     * Cancel invoice
     *
     * @param string  $id
     */
    public function cancel(string $id)
    {
        return $this->requestPut($id, 'cancel', []);
    }

    /**
     * Create invoice
     *
     * @param array  $params
     */
    public function create(array $params = [])
    {
        return $this->requestPost(null, null, $params);
    }

    /**
     * Get invoice
     *
     * @param string  $id
     */
    public function get(string $id)
    {
        return $this->requestGet($id, null, []);
    }

    /**
     * List invoices
     *
     * @param array  $query
     */
    public function list(array $query)
    {
        return $this->requestGet(null, null, $query);
    }

    /**
     * List invoices items
     *
     * @param string  $invoiceID
     */
    public function items(string $invoiceID, array $query = [])
    {
        return $this->requestGet($invoiceID, 'items', $query);
    }
}
