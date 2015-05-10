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
            'defaults' => [
                'headers' => [
                    'X-API-KEY' => $config['apiKey']
                ]
            ]
        ], [], $config);

        $description = self::getDescriptionFromConfig($config);

        $guzzleClient = new GuzzleClient($client, $description);

        $guzzleClient->setConfig(
            'defaults/api_version',
            1
        );

        return $guzzleClient;
    }

    private static function getDescriptionFromConfig(array $config)
    {
        $data = isset($config['descriptionPath']) && is_readable($config['descriptionPath'])
            ? include($config['descriptionPath'])
            : include(__DIR__ . '/simplecast-api.php');

        return new Description($data);
    }
}
