<?php

namespace Padmoney\Http;

use Exception;

class RequestException extends Exception
{
    protected $data = [];

    public function __construct(int $code, array $data = [])
    {
        $this->code = $code;
        $this->data = $data;
        $this->message = $this->getErrorMessage();
    }

    private function getErrorMessage()
    {
        return $this->data['error'];
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
