<?php namespace Simplecast;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;

class ClientFactory
{
    public static function factory(array $config)
    {
        if (! array_key_exists('apiKey', $config)) {
            throw new \Exception('Client factory requires $apiKey parameter.');
        }

        $client = new Client([
            'base_url' => [
                 'https://api.simplecast.fm/v{version}/',
                 ['version' => '1']
            ],
            'defaults' => [
                'headers' => [
                    'X-API-KEY' => $config['apiKey']
                ]
            ]
        ], [], $config);

        $description = self::getDescriptionFromConfig($config);

        return new GuzzleClient($client, $description);
    }

    private static function getDescriptionFromConfig(array $config)
    {
        $data = isset($config['descriptionPath']) && is_readable($config['descriptionPath'])
            ? include($config['descriptionPath'])
            : include(__DIR__ . '/../simplecast-api.php');

        return new Description($data);
    }
}
