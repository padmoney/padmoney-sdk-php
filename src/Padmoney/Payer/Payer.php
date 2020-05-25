<?php

namespace Padmoney\Payer;

use Padmoney\AbstractClient;

class Payer extends AbstractClient implements PayerInterface
{
    /**
     * Constructor
     *
     * @param array $args
     */
    public function __construct(array $args)
    {
        $endpoint = 'payers';
        parent::__construct($args, $endpoint);
    }

    /**
     * @param array $params
     * @return string
     */
    public function create(array $params): string
    {
        $response = $this->requestPost($params);
        return $response['id'];
    }

    /**
     * @param array $params
     */
    public function update(array $params)
    {
        $this->requestPut($params);
    }

    /**
     * @param string $id
     * @return array
     */
    public function get(string $id): array
    {
        return $this->requestGet($id);
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function delete(string $id)
    {
        return $this->requestDelete($id);
    }
}
