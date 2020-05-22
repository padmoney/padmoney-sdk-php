<?php

namespace Padmoney\Http;

use Exception;

class RequestException extends Exception
{
    protected $code;
    protected $data = [];

    public function __construct(int $code, array $data = [])
    {
        $this->code = $code;
        $this->data = $data;
    }

    public function toArray()
    {
        return $this->data;
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }
}
