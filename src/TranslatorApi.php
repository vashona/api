<?php

namespace vashona\api;

use GuzzleHttp;

/**
 * Class TranslatorApi
 * @package vashona\api
 */
class TranslatorApi
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
     * Make a translation request
     * @param $x string
     * @param $to sna | en
     * @param $from en | sna
     * @return string
     */
    public function getTranslation($x, $to, $from)
    {
        $parameters = [
            'format' => 'json',
            'x'      => $x,
            'to'     => $to,
            'from'   => $from,
        ];
        $client     = new GuzzleHttp\Client(['verify' => false]);
        $response   = $client->request('GET', $this->serverUrl, [
            'auth'  => $this->credentials['auth'],
            'query' => $parameters,
        ]);
        $body       = json_decode($response->getBody(), true);

        return $body;
    }

    /**
     * Set username and password
     * @param $username string
     * @param $password string
     */
    public function setAuth($username, $password)
    {
        $this->credentials['auth'] = [$username, $password,];
    }

    /**
     * Set the url to make a query to
     * @param $serverUrl string
     */
    public function setServerUrl($serverUrl)
    {
        $this->serverUrl = $serverUrl;
    }
}
