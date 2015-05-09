<?php namespace Simplecast;

use GuzzleHttp\Client;

class ClientFactory
{
    public static function factory(array $config)
    {
        if (! array_key_exists('apiKey', $config)) {
            throw new \Exception('Client factory requires $apiKey parameter.');
        }

        $client = new Client([
            'defaults' => [
                'headers' => [
                    'X-API-KEY' => $config['apiKey']
                ]
            ]
        ]);

        return $client;
    }
}
