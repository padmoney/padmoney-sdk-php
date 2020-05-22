<?php

namespace Padmoney\Http;

interface ClientInterface
{
    public function headers();
    public function delete(string $urn);
    public function get(string $urn, array $query);
    public function post(string $urn, array $params);
    public function put(string $urn, array $params);
}
