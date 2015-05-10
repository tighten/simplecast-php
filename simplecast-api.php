<?php return [
    // 'baseUrl' => 'https://api.simplecast.fm/',
    'name' => 'Simplecast',
    'apiVersion' => 1,
    'operations' => [
        'podcasts' => [
            'httpMethod' => 'GET',
            'uri' => '/v1/podcasts.json',
            'responseModel' => 'getResponse',
            'parameters' => [
            ]
        ],
        'podcast' => [
            'httpMethod' => 'GET',
            'uri' => '/v1/podcasts/{podcast_id}.json',
            'responseModel' => 'getResponse',
            'parameters' => [
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
];
