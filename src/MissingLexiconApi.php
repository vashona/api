<?php

namespace vashona\api;

use GuzzleHttp;

/**
 * Class MissingLexiconApi
 * @package vashona\api
 */
class MissingLexiconApi
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
     *
     * @param unknown $izwi
     * @return unknown
     */
    public function update($izwi)
    {
        $parameters = [
            'format' => 'json',
            'izwi'   => $izwi,
        ];
        $client     = new GuzzleHttp\Client(['http_errors' => false]);
        $response   = $client->request('GET', $this->serverUrl, [
            'auth'  => $this->credentials['auth'],
            'query' => $parameters,
        ]);
        $body       = json_decode($response->getBody(), true);

        return $body;
    }
    
    /**
     * Get top rated missing lexicons
     * @param int $limit
     * @return mixed
     */
    public function get($limit = 10)
    {
        $parameters = [
            'format'   => 'json',
            'active'   => 1,
            'limit'    => $limit,
            'ordering' => '-score',
        ];
        $client     = new GuzzleHttp\Client(['http_errors' => false]);
        $response   = $client->request('GET', $this->serverUrl, [
            'auth'  => $this->credentials['auth'],
            'query' => $parameters,
        ]);
        $body       = json_decode($response->getBody(), true);

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
