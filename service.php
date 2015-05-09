<?php
require 'vendor/autoload.php';
require 'environment.php';

use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;

/**
 * TODO
 * - figure out how to inject api key via config
 * - figure out how to make header auth happen outside of operations
 *    http://guzzle.readthedocs.org/en/latest/clients.html#custom-authentication-schemes?
 * - figure out how to not strip out v1 from the baseUrl
 * - figure out if there's a custom param type other than string for YYYY-MM-DD
 */
$client = new Client();
$description = new Description([
    'baseUrl' => 'https://api.simplecast.fm/',
    // 'endpointPrefix' => 'v1', // ??
    'name' => 'Simplecast',
    'apiVersion' => 1,
    'operations' => [
        'podcasts' => [
            'httpMethod' => 'GET',
            'uri' => '/v1/podcasts.json',
            'responseModel' => 'getResponse',
            'parameters' => [
                'X-API-KEY' => [
                    'location' => 'header',
                    'default' => $apiKey
                ]
            ]
        ],
        'podcast' => [
            'httpMethod' => 'GET',
            'uri' => '/v1/podcasts/{podcast_id}.json',
            'responseModel' => 'getResponse',
            'parameters' => [
                'X-API-KEY' => [
                    'location' => 'header',
                    'type' => 'string',
                    'default' => $apiKey
                ],
                'podcast_id' => [
                    'location' => 'uri',
                    'type' => 'string'
                ]
            ]
        ],
        'podcastEpisodes' => [
            'httpMethod' => 'GET',
            'uri' => '/v1/podcasts/{podcast_id}/episodes.json',
            'responseModel' => 'getResponse',
            'parameters' => [
                'X-API-KEY' => [
                    'location' => 'header',
                    'type' => 'string',
                    'default' => $apiKey
                ],
                'podcast_id' => [
                    'location' => 'uri',
                    'type' => 'string'
                ]
            ]
        ],
        'podcastEpisode' => [
            'httpMethod' => 'GET',
            'uri' => '/v1/podcasts/{podcast_id}/episodes/{episode_id}.json',
            'responseModel' => 'getResponse',
            'parameters' => [
                'X-API-KEY' => [
                    'location' => 'header',
                    'type' => 'string',
                    'default' => $apiKey
                ],
                'podcast_id' => [
                    'location' => 'uri',
                    'type' => 'string'
                ],
                'episode_id' => [
                    'location' => 'uri',
                    'type' => 'string'
                ]
            ]
        ],
        'podcastEpisodeEmbed' => [
            'httpMethod' => 'GET',
            'uri' => '/v1/podcasts/{podcast_id}/episodes/{episode_id}/embed.json',
            'responseModel' => 'getResponse',
            'parameters' => [
                'X-API-KEY' => [
                    'location' => 'header',
                    'type' => 'string',
                    'default' => $apiKey
                ],
                'podcast_id' => [
                    'location' => 'uri',
                    'type' => 'string'
                ],
                'episode_id' => [
                    'location' => 'uri',
                    'type' => 'string'
                ]
            ]
        ],
        'podcastStatistics' => [
            'httpMethod' => 'GET',
            'uri' => '/v1/podcasts/{podcast_id}/statistics.json',
            'responseModel' => 'getResponse',
            'parameters' => [
                'X-API-KEY' => [
                    'location' => 'header',
                    'type' => 'string',
                    'default' => $apiKey
                ],
                'podcast_id' => [
                    'location' => 'uri',
                    'type' => 'string'
                ]
            ]
        ],
        'podcastStatisticsOverall' => [
            'httpMethod' => 'GET',
            'uri' => '/v1/podcasts/{podcast_id}/statistics/overall.json',
            'responseModel' => 'getResponse',
            'parameters' => [
                'X-API-KEY' => [
                    'location' => 'header',
                    'type' => 'string',
                    'default' => $apiKey
                ],
                'podcast_id' => [
                    'location' => 'uri',
                    'type' => 'string'
                ],
                'timeframe' => [
                    'location' => 'query',
                    'type' => 'string', // recent, year, all, custom
                    'required' => true
                ],
                'start_date' => [
                    'location' => 'query',
                    'type' => 'string', // YYYY-MM-DD
                ],
                'end_date' => [
                    'location' => 'query',
                    'type' => 'string', // YYYY-MM-DD
                ],
            ]
        ],
        'podcastStatisticsEpisode' => [
            'httpMethod' => 'GET',
            'uri' => '/v1/podcasts/{podcast_id}/statistics/episode.json',
            'responseModel' => 'getResponse',
            'parameters' => [
                'X-API-KEY' => [
                    'location' => 'header',
                    'type' => 'string',
                    'default' => $apiKey
                ],
                'podcast_id' => [
                    'location' => 'uri',
                    'type' => 'string'
                ],
                'episode_id' => [
                    'location' => 'query',
                    'type' => 'integer'
                ],
                'timeframe' => [
                    'location' => 'query',
                    'type' => 'string', // recent, year, all, custom
                    'required' => true
                ],
                'start_date' => [
                    'location' => 'query',
                    'type' => 'string', // YYYY-MM-DD
                ],
                'end_date' => [
                    'location' => 'query',
                    'type' => 'string', // YYYY-MM-DD
                ],
            ]
        ],
    ],
    'models' => [
        'getResponse' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json'
            ]
        ]
    ]
]);

$simplecast = new GuzzleClient($client, $description);

$result = $simplecast->podcasts();

// $result = $simplecast->podcast([
//     'podcast_id' => 335
// ]);

// $result = $simplecast->podcastEpisodes([
//     'podcast_id' => 335
// ]);

// $result = $simplecast->podcastEpisode([
//     'podcast_id' => 335,
//     'episode_id' => 11265
// ]);

// $result = $simplecast->podcastEpisodeEmbed([
//     'podcast_id' => 335,
//     'episode_id' => 11265
// ]);

// $result = $simplecast->podcastStatistics([
//     'podcast_id' => 335
// ]);

// $result = $simplecast->podcastStatisticsOverall([
//     'podcast_id' => 335,
//     'timeframe' => 'recent'
// ]);

// $result = $simplecast->podcastStatisticsOverall([
//     'podcast_id' => 335,
//     'timeframe' => 'custom',
//     'start_date' => '2015-01-01',
//     'end_date' => '2015-01-30'
// ]);

// $result = $simplecast->podcastStatisticsEpisode([
//     'podcast_id' => 335,
//     'episode_id' => 11265,
//     'timeframe' => 'recent'
// ]);

echo '<pre>';
var_dump($result);
