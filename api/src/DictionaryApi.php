<?php

namespace vashona\api;

use GuzzleHttp;

/**
 * Class DictionaryApi
 * @package vashona\api
 */
class DictionaryApi
{

    /**
     * @var array
     */
    protected $credentials = [];

    /**
     * @var array
     */
    protected $serverUrl = [];

    /**
     * DictionaryApi constructor.
     * @param $url
     * @param $paths
     * @param $auth
     */
    public function __construct($url, $paths, $auth)
    {
        $this->serverUrl = $paths;
        array_walk($this->serverUrl, function (&$value, $key) use ($url) {
            $value = $url . $value;
        });
        $this->credentials['auth'] = $auth;
    }

    /**
     * @param $str
     * @return mixed
     */
    public function getIzwi($str)
    {
        $parameters = [
            'format' => 'json',
            'izwi'   => $str,
        ];

        $client   = new GuzzleHttp\Client(['http_errors' => false]);
        $response = $client->request('GET', $this->serverUrl['default'], [
            'auth'  => $this->credentials['auth'],
            'query' => $parameters,
        ]);
        $body     = json_decode($response->getBody(), true);

        return $body;
    }

    /**
     * @return mixed
     */
    public function lastUpdated()
    {
        $parameters = [
            'format'   => 'json',
            'ordering' => '-date_modified',
            'limit'    => 1,
        ];
        $client     = new GuzzleHttp\Client(['http_errors' => false]);
        $response   = $client->request('GET', $this->serverUrl['default'], [
            'auth'  => $this->credentials['auth'],
            'query' => $parameters,
        ]);
        $body       = json_decode($response->getBody(), true);

        return $body;
    }

    /**
     * @param $str
     * @return bool
     */
    public function izwiExists($str)
    {
        $json = $this->getIzwi($str);

        return ( bool )$json ['count'];
    }

    /**
     * @param $str
     * @return mixed
     */
    public function getWord($str)
    {
        $parameters = [
            'format'                                                 => 'json',
            'lexicon_attributes__lexicon_english_translations__word' => $str,
        ];
        $client     = new GuzzleHttp\Client(['http_errors' => false]);
        $response   = $client->request('GET', $this->serverUrl['default'], [
            'auth'  => $this->credentials['auth'],
            'query' => $parameters,
        ]);
        $body       = json_decode($response->getBody(), true);

        return $body;
    }

    /**
     * @param $str
     * @return bool
     */
    public function wordExists($str)
    {
        $json = $this->getWord($str);

        return ( bool )$json ['count'];
    }

    /**
     * @param $str
     * @return mixed
     */
    public function getSearch($str)
    {
        $parameters = [
            'format' => 'json',
            'search' => $str,
        ];
        $client     = new GuzzleHttp\Client(['http_errors' => false]);
        $response   = $client->request('GET', $this->serverUrl['default'], [
            'auth'  => $this->credentials['auth'],
            'query' => $parameters,
        ]);
        $body       = json_decode($response->getBody(), true);

        return $body;
    }

    /**
     * @return mixed
     */
    public function getRandomWord()
    {
        $parameters = [
            'format' => 'json',
        ];
        $client     = new GuzzleHttp\Client(['http_errors' => false]);
        $response   = $client->request('GET', $this->serverUrl['random'], [
            'auth'  => $this->credentials['auth'],
            'query' => $parameters,
        ]);
        $body       = json_decode($response->getBody(), true);

        return $body;
    }

    /**
     * @param     $str
     * @param     $language
     * @param int $limit
     * @return mixed
     */
    public function getSuggestion($str, $language, $limit = 5)
    {
        $parameters = [
            'format'   => 'json',
            'query'    => $str,
            'language' => $language,
            'limit'    => $limit,
        ];
        $client     = new GuzzleHttp\Client(['http_errors' => false]);
        $response   = $client->request('GET', $this->serverUrl['suggestWord'], [
            'auth'  => $this->credentials['auth'],
            'query' => $parameters,
        ]);
        $body       = json_decode($response->getBody(), true);

        return $body;
    }

    /**
     * @param $str
     * @param $language
     * @return mixed
     */
    public function getSpellingSuggestion($str, $language)
    {
        $parameters = [
            'format'   => 'json',
            'query'    => $str,
            'language' => $language,
        ];
        $client     = new GuzzleHttp\Client(['http_errors' => false]);
        $response   = $client->request('GET', $this->serverUrl['suggestSpelling'], [
            'auth'  => $this->credentials['auth'],
            'query' => $parameters,
        ]);
        $body       = json_decode($response->getBody(), true);

        return $body;
    }

    /**
     * @return mixed
     */
    public function getWordOfTheDay()
    {
        $parameters = [
            'format' => 'json',
        ];
        $client     = new GuzzleHttp\Client(['http_errors' => false]);
        $response   = $client->request('GET', $this->serverUrl['wordOfTheDay'], [
            'auth'  => $this->credentials['auth'],
            'query' => $parameters,
        ]);
        $body       = json_decode($response->getBody(), true);

        return $body;
    }
}
