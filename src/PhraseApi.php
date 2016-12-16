<?php

namespace vashona\api;

use GuzzleHttp;

/**
 * Class PhraseApi
 * @package vashona\api
 */
class PhraseApi
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

    /**
     * Get daily phrase
     * @return mixed
     */
    public function getDaily()
    {
        $client   = new GuzzleHttp\Client(['verify' => false, 'verify' => false]);
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
