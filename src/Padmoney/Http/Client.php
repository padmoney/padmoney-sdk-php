<?php

namespace Padmoney\Http;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response;

class Client implements ClientInterface
{
    /**
     * @var string
     */
    protected $uri = '';

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * Constructor
     *
     * @param string   $uri
     * @param array    $headers
     */
    public function __construct(string $uri, array $headers)
    {
        $this->uri = $uri;
        $this->headers = $headers;
    }

    public function headers()
    {
        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
        $configs = [
            'Content-Type' => 'application/json',
            'User-Agent' => trim('Padmoney-SDK-PHP' . "; {$host}"),
        ];
        return [
            'headers' => array_merge($this->headers, $configs)
        ];
    }

    public function delete(string $urn)
    {
        return $this->request('DELETE', $urn, []);
    }

    public function get(string $urn, array $query)
    {
        $options = [
            'query' => $query,
        ];
        return $this->request('GET', $urn, $options);
    }

    public function post(string $urn, array $params)
    {
        $options = [
            'json' => $params,
        ];
        return $this->request('POST', $urn, $options);
    }

    public function put(string $urn, array $params)
    {
        $options = [
            'json' => $params,
        ];
        return $this->request('PUT', $urn, $options);
    }

    private function request(string $method, string $urn, array $options)
    {
        $client = new \GuzzleHttp\Client($this->headers());
        try {
            $response = $client->request($method, $this->uri($urn), $options);
        } catch (ClientException $e) {
            $response = $e->getResponse();
        }
        return $this->response($response);
    }

    private function checkForErrors(Response $response, $data)
    {
        $status = $response->getStatusCode();
        $statusClass = (int)($status / 100);
        if (($statusClass === 4) || ($statusClass === 5)) {
            $data = (array)$data;
            throw new RequestException($status, $data);
        }
    }

    private function response(Response $response)
    {
        $content = $response->getBody()->getContents();
        $decoded = json_decode($content);

        $this->checkForErrors($response, $decoded);

        return $decoded;
    }

    private function uri(string $urn)
    {
        return $this->uri.'/'.$urn;
    }
}
