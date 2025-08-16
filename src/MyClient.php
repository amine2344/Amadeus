<?php

namespace ShaBax\Amadeus;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class MyClient
{
    protected static function request($method, $endpoint, $params = [])
    {
        $url = rtrim(Amadeus::$base_url, '/') . '/' . ltrim($endpoint, '/');
        $Authorization = "Bearer " . Amadeus::$access_token;

        $client = new Client([
            'base_uri' => Amadeus::$base_url,
            'timeout'  => Amadeus::$timeout ?? 30,
            'verify'   => false,
        ]);

        $options = [
            'headers' => [
                'Content-Type'  => 'application/vnd.amadeus+json',
                'Authorization' => $Authorization,
            ],
        ];

        if ($method === 'GET') {
            $options['query'] = $params;
        } else {
            $options['json'] = $params;
        }

        try {
            $response = $client->request($method, $endpoint, $options);
            return json_decode($response->getBody(), true);
        } catch (GuzzleException $e) {
            $response = $e->getResponse();
            if ($response) {
                return json_decode($response->getBody()->getContents(), true);
            }
            return ['error' => $e->getMessage()];
        }
    }

    public static function get($endpoint, $params = [])
    {
        return self::request('GET', $endpoint, $params);
    }

    public static function post($endpoint, $params = [])
    {
        return self::request('POST', $endpoint, $params);
    }
}
