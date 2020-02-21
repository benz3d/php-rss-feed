<?php
//Example
use Benz3d\RSS\Feed\Feed;
use Benz3d\RSS\Channel\Channel;
use Benz3d\RSS\Item\Item;

$feed = new Feed();
$channel = new Channel('Benz3d Feed', 'Test Feed Channel', 'https://github.com/benz3d/php-rss-feed');
$channel->pubDate(date('F j, Y',time()-60*60*24))
        ->category(['PHP Library'])
        ->language('en-us')
        ->lastBuildDate(date('F j, Y'))
        ->image('https://www.w3schools.com/images/logo.gif', 'W3Schools.com', 'https://www.w3schools.com');

for ($i = 0; $i < 5; $i++) {
    $item = new Item('Feed Item '.$i, 'Item Description '.$i, 'https://github.com/benz3d/php-rss-feed?foo=bar'.$i);
    $item->pubDate(date('F j, Y',time()-60*60*24))
        ->author('aaa@bbb.com')
        ->enclosure('https://www.w3schools.com/media/3d.wmv', 78645, 'video/wmv');
    $channel->addItem($item);
}

$feed->addChannel($channel);

echo $feed->toXML();