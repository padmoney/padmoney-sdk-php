<?php

namespace Padmoney;

abstract class AbstractClient implements ClientInterface
{
    /**
     * @var array
     */
    protected $args = [];

    /**
     * @var \Padmoney\ClientInterface
     */
    public $client;

    /**
     * @var string
     */
    protected $endpoint = '';


    /**
     * Constructor
     *
     * @param array   $args
     * @param string  $endpoint
     */
    public function __construct(array $args, string $endpoint)
    {
        if (!array_key_exists('env', $args)) {
            $args = array_merge($args, ['env' => Padmoney::PROD]);
        }
        $this->args = $args;
        $this->endpoint = $endpoint;
    }

    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return $this->endpoint;
    }

    private function getClient()
    {
        if (!$this->client) {
            $urlApi = Padmoney::apiUri($this->args['env']);
            $headers = $this->headers();
            $this->client = new \Padmoney\Http\Client($urlApi, $headers);
        }
        return $this->client;
    }

    private function headers()
    {
        $args = array_change_key_case($this->args, CASE_LOWER);
        $token = isset($args['token']) ? $args['token'] : getenv(Padmoney::PADMONEY_TOKEN);
        $tokenSecret = isset($args['token-secret']) ? $args['token-secret'] : getenv(Padmoney::PADMONEY_TOKEN_SECRET);
        return [
            'Padmoney-Token' => $token,
            'Padmoney-Token-Secret' => $tokenSecret,
        ];
    }

    protected function requestDelete($id = null, $additionalEndpoint = null)
    {
        $urn = $this->url($id, $additionalEndpoint);
        return $this->getClient()->delete($urn);
    }

    protected function requestGet($id = null, $additionalEndpoint = null, array $query = [])
    {
        $urn = $this->urn($id, $additionalEndpoint);
        return $this->getClient()->get($urn, $query);
    }

    protected function requestPost($id = null, $additionalEndpoint = null, array $params = [])
    {
        $urn = $this->urn($id, $additionalEndpoint);
        return $this->getClient()->post($urn, $params);
    }

    protected function requestPut($id = null, $additionalEndpoint = null, array $params = [])
    {
        $urn = $this->urn($id, $additionalEndpoint);
        return $this->getClient()->put($urn, $params);
    }

    private function urn($id = null, $additionalEndpoint = null)
    {
        $urn = $this->endpoint();
        if (! is_null($id)) {
            $urn .= '/' . $id;
        }
        if (! is_null($additionalEndpoint)) {
            $urn .= '/' . $additionalEndpoint;
        }
        return $urn;
    }
}
