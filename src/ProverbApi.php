<?php

namespace vashona\api;

use GuzzleHttp;

/**
 * Class ProverbApi
 * @package vashona\api
 */
class ProverbApi
{
    /**
     *
     * @var unknown
     */
    protected $credentials = [];

    /**
     *
     * @var unknown
     */
    protected $serverUrl;


    public function getDailyProverb()
    {
        $client   = new GuzzleHttp\Client(['http_errors' => false]);
        $response = $client->request('GET', $this->serverUrl, [
            'auth'  => $this->credentials['auth'],
            'query' => ['format' => 'json'],
        ]);
        $body     = json_decode($response->getBody(), true);

        return $body;
    }

    /**
     * @param $username
     * @param $password
     */
    public function setAuth($username, $password)
    {
        $this->credentials['auth'] = [$username, $password,];
    }

    /**
     * @param $serverUrl
     */
    public function setServerUrl($serverUrl)
    {
        $this->serverUrl = $serverUrl;
    }
}
