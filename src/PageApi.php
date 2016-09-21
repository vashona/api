<?php

namespace vashona\api;

use GuzzleHttp;

/**
 * Class PageApi
 * @package vashona\api
 */
class PageApi
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
     * @param $slug
     * @return mixed
     */
    public function getPage($slug)
    {
        $parameters = [
            'format' => 'json',
            'slug' => $slug,
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
