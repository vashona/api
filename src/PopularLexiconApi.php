<?php

namespace vashona\api;

use GuzzleHttp;

/**
 * Class PopularLexiconApi
 * @package vashona\api
 */
class PopularLexiconApi
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
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function getTopShona($limit = 10, $offset = 0)
    {
        $parameters = [
            'format' => 'json',
            'limit'  => $limit,
            'offset' => $offset,
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
