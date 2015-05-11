<?php
require '../vendor/autoload.php';
require 'environment.php';

$simplecast = Simplecast\ClientFactory::factory([
    'apiKey' => $apiKey
]);

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
//     'podcast_id' => 335
// ]);

// $result = $simplecast->podcastStatisticsOverall([
//     'podcast_id' => 335,
//     'timeframe' => 'custom',
//     'start_date' => '2015-01-01',
//     'end_date' => '2015-01-30'
// ]);

// $result = $simplecast->podcastEpisodeStatistics([
//     'podcast_id' => 335,
//     'episode_id' => 11265,
// ]);

echo '<pre>';
var_dump($result);
