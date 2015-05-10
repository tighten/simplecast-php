# Simplecast PHP SDK
A PHP SDK wrapper around the [Simplecast.fm API](https://api.simplecast.fm/).

## Installation
*Simplecast* is available on Packagist as the [tightenco/simplecast](https://packagist.org/packages/tightenco/simplecast) package.

## Quickstart
```php
<?php
require '../vendor/autoload.php';

$simplecast = Simplecast\ClientFactory::factory([
    'apiKey' => 'your api key here'
]);

$result = $simplecast->podcasts();

print $result;
```

## Available methods
Each of these methods is available on the client (shown in the example above as `$simplecast`).

### podcasts
Shows a list of all of your podcasts that are hosted by Simplecast.

```php
$result = $simplecast->podcasts();
```

```
array(2) {
  [0]=>
  array(15) {
    ["id"]=>
    int(335)
    ["title"]=>
    string(25) "The Five-Minute Geek Show"
    ["rss_url"]=>
    string(37) "http://simplecast.fm/podcasts/335/rss"
    ["description"]=>
    string(125) "Matt Stauffer, unabashedly geeky, 5 minutes, twice a week. Frontend dev, backend dev, audio, design, podcasts--all fair game."
    ["author"]=>
    string(13) "Matt Stauffer"
    ["copyright"]=>
    string(19) "All rights reserved"
    ["keywords"]=>
    string(92) "geek, technology, php, css, fiveminutegeekshow, it, programming, development, design, ui, ux"
    ["subdomain"]=>
    string(18) "fiveminutegeekshow"
    ["categories"]=>
    array(3) {
      [0]=>
      string(10) "Technology"
      [1]=>
      string(24) "Technology :: Podcasting"
      [2]=>
      string(23) "Technology :: Tech News"
    }
    ["itunes_url"]=>
    string(73) "https://itunes.apple.com/us/podcast/the-five-minute-geek-show/id952727637"
    ["language"]=>
    string(2) "en"
    ["website"]=>
    string(30) "http://fiveminutegeekshow.com/"
    ["twitter"]=>
    string(15) "5minutegeekshow"
    ["explicit"]=>
    bool(false)
    ["images"]=>
    array(3) {
      ["large"]=>
      string(82) "https://simplecast-media.s3.amazonaws.com/podcast/image/335/1419886609-artwork.jpg"
      ["small"]=>
      string(88) "https://simplecast-media.s3.amazonaws.com/podcast/image/335/small_1419886609-artwork.jpg"
      ["thumb"]=>
      string(88) "https://simplecast-media.s3.amazonaws.com/podcast/image/335/thumb_1419886609-artwork.jpg"
    }
  },
  [1] =>
  array(15) {
    ...
  }
}
```

### podcast
Shows full data for a single podcast given its `podcast_id`.

```php
$result = $simplecast->podcast([
    'podcast_id' => 335
]);
```

```
array(15) {
  ["id"]=>
  int(335)
  ["title"]=>
  string(25) "The Five-Minute Geek Show"
  ["rss_url"]=>
  string(37) "http://simplecast.fm/podcasts/335/rss"
  ["description"]=>
  string(125) "Matt Stauffer, unabashedly geeky, 5 minutes, twice a week. Frontend dev, backend dev, audio, design, podcasts--all fair game."
  ["author"]=>
  string(13) "Matt Stauffer"
  ["copyright"]=>
  string(19) "All rights reserved"
  ["keywords"]=>
  string(92) "geek, technology, php, css, fiveminutegeekshow, it, programming, development, design, ui, ux"
  ["subdomain"]=>
  string(18) "fiveminutegeekshow"
  ["categories"]=>
  array(3) {
    [0]=>
    string(10) "Technology"
    [1]=>
    string(24) "Technology :: Podcasting"
    [2]=>
    string(23) "Technology :: Tech News"
  }
  ["itunes_url"]=>
  string(73) "https://itunes.apple.com/us/podcast/the-five-minute-geek-show/id952727637"
  ["language"]=>
  string(2) "en"
  ["website"]=>
  string(30) "http://fiveminutegeekshow.com/"
  ["twitter"]=>
  string(15) "5minutegeekshow"
  ["explicit"]=>
  bool(false)
  ["images"]=>
  array(3) {
    ["large"]=>
    string(82) "https://simplecast-media.s3.amazonaws.com/podcast/image/335/1419886609-artwork.jpg"
    ["small"]=>
    string(88) "https://simplecast-media.s3.amazonaws.com/podcast/image/335/small_1419886609-artwork.jpg"
    ["thumb"]=>
    string(88) "https://simplecast-media.s3.amazonaws.com/podcast/image/335/thumb_1419886609-artwork.jpg"
  }
}
```

### podcastEpisodes
Lists all episodes of a podcast given its `podcast_id`.

```php
$result = $simplecast->podcastEpisodes([
    'podcast_id' => 335
]);
```

```
array(38) {
  [0]=>
  array(15) {
    ["id"]=>
    int(11265)
    ["number"]=>
    int(38)
    ["podcast_id"]=>
    int(335)
    ["guid"]=>
    string(36) "2cdb9817-3af1-486b-b9f8-055ca29c7cc8"
    ["title"]=>
    string(38) "38 | How to Make Remote Work Suck Less"
    ["duration"]=>
    int(454)
    ["explicit"]=>
    bool(false)
    ["published"]=>
    bool(true)
    ["description"]=>
    string(102) "Everyone's in love with remote work. So are we! But there are some big pains that come along with it. "
    ["long_description"]=>
    string(341) "Everyone's in love with remote work. So are we! But there are some big pains that come along with it.

- [REMOTE](http://www.amazon.com/Remote-Office-Required-Jason-Fried/dp/0804137501)
- [Campfire](https://campfirenow.com/)
- [Slack](https://slack.com/)
- [Sqwiggle](https://www.sqwiggle.com/)
- [Screenhero](https://screenhero.com/)"
    ["published_at"]=>
    string(24) "2015-05-07T18:55:00.000Z"
    ["audio_file_size"]=>
    int(3699203)
    ["audio_url"]=>
    string(36) "http://audio.simplecast.fm/11265.mp3"
    ["sharing_url"]=>
    string(32) "https://simplecast.fm/s/777e7a43"
    ["images"]=>
    array(3) {
      ["large"]=>
      string(84) "https://simplecast-media.s3.amazonaws.com/episode/image/11265/1431025516-artwork.jpg"
      ["small"]=>
      string(90) "https://simplecast-media.s3.amazonaws.com/episode/image/11265/small_1431025516-artwork.jpg"
      ["thumb"]=>
      string(90) "https://simplecast-media.s3.amazonaws.com/episode/image/11265/thumb_1431025516-artwork.jpg"
    }
  }
  [1]=>
  array(15) {
    ..
  },
  ..
}
```

### podcastEpisode
Shows the data for a podcast episode given its `podcast_id` and `episode_id`.

```php
$result = $simplecast->podcastEpisode([
    'podcast_id' => 335,
    'episode_id' => 11265
]);
```

```
array(15) {
  ["id"]=>
  int(11265)
  ["number"]=>
  int(38)
  ["podcast_id"]=>
  int(335)
  ["guid"]=>
  string(36) "2cdb9817-3af1-486b-b9f8-055ca29c7cc8"
  ["title"]=>
  string(38) "38 | How to Make Remote Work Suck Less"
  ["duration"]=>
  int(454)
  ["explicit"]=>
  bool(false)
  ["published"]=>
  bool(true)
  ["description"]=>
  string(102) "Everyone's in love with remote work. So are we! But there are some big pains that come along with it. "
  ["long_description"]=>
  string(341) "Everyone's in love with remote work. So are we! But there are some big pains that come along with it.

- [REMOTE](http://www.amazon.com/Remote-Office-Required-Jason-Fried/dp/0804137501)
- [Campfire](https://campfirenow.com/)
- [Slack](https://slack.com/)
- [Sqwiggle](https://www.sqwiggle.com/)
- [Screenhero](https://screenhero.com/)"
  ["published_at"]=>
  string(29) "2015-05-07T14:55:00.000-04:00"
  ["audio_file_size"]=>
  int(3699203)
  ["audio_url"]=>
  string(36) "http://audio.simplecast.fm/11265.mp3"
  ["sharing_url"]=>
  string(32) "https://simplecast.fm/s/777e7a43"
  ["images"]=>
  array(3) {
    ["large"]=>
    string(84) "https://simplecast-media.s3.amazonaws.com/episode/image/11265/1431025516-artwork.jpg"
    ["small"]=>
    string(90) "https://simplecast-media.s3.amazonaws.com/episode/image/11265/small_1431025516-artwork.jpg"
    ["thumb"]=>
    string(90) "https://simplecast-media.s3.amazonaws.com/episode/image/11265/thumb_1431025516-artwork.jpg"
  }
}
```

### podcastEpisodeEmbed
Get the audio player embed code for a podcast episode given its `podcast_id` and `episode_id`.

```php
$result = $simplecast->podcastEpisodeEmbed([
    'podcast_id' => 335,
    'episode_id' => 11265
]);
```

```
array(5) {
  ["id"]=>
  int(11265)
  ["title"]=>
  string(38) "38 | How to Make Remote Work Suck Less"
  ["height"]=>
  int(36)
  ["width"]=>
  NULL
  ["html"]=>
  array(2) {
    ["light"]=>
    string(132) "<iframe src='https://simplecast.fm/e/11265?style=light' width='100%' height='36px' seamless scrolling='no' frameborder='0'></iframe>"
    ["dark"]=>
    string(131) "<iframe src='https://simplecast.fm/e/11265?style=dark' width='100%' height='36px' seamless scrolling='no' frameborder='0'></iframe>"
  }
}
```

### podcastEpisodeStatistics
Lists the statistics for a podcast episode given its `podcast_id`, `episode_id`, and a period of time.

```php
$result = $simplecast->podcastEpisodeStatistics([
    'podcast_id' => 335,
    'episode_id' => 11265,
    'timeframe' => 'custom',
    'start_date' => '2015-05-09',
    'end_date' => '2015-05-10'
]);
```

Options for `timeframe` are: `recent`, `year`, `all`, `custom`. Note that `custom` timeframes require two more parameters, `start_date` and `end_date`, both formatted as `YYYY-MM-DD`.

```
array(2) {
  ["data"]=>
  array(2) {
    [0]=>
    array(2) {
      ["date"]=>
      string(10) "05-09-2015"
      ["listens"]=>
      int(12345)
    }
    [1]=>
    array(2) {
      ["date"]=>
      string(10) "05-10-2015"
      ["listens"]=>
      int(42)
    }
  }
  ["total_listens"]=>
  int(12387)
}
```

### podcastStatistics
Show statistics for the podcast.

```php
$result = $simplecast->podcastStatistics([
    'podcast_id' => 335
]);
```

```
array(2) {
  ["total_listens"]=>
  int(1234567890)
  ["since"]=>
  string(10) "12-16-2014"
}
```

### podcastStatisticsOverall
Shows statistics for the podcast, scoped by time.

```php
$result = $simplecast->podcastStatisticsOverall([
    'podcast_id' => 335,
    'timeframe' => 'recent'
]);
```

Options for `timeframe` are: `recent`, `year`, `all`, `custom`. Note that `custom` timeframes require two more parameters, `start_date` and `end_date`, both formatted as `YYYY-MM-DD`.

```
array(2) {
  ["data"]=>
  array(22) {
    [0]=>
    array(2) {
      ["date"]=>
      string(10) "04-19-2015"
      ["listens"]=>
      int(12345)
    },
    ...
    [21]=>
    array(2) {
      ["date"]=>
      string(10) "05-10-2015"
      ["listens"]=>
      int(54321)
    }
  }
  ["total_listens"]=>
  int(12345678)
}
```
