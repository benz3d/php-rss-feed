<?php
namespace Benz3d\RSS\Feed;

use Benz3d\RSS\Channel\ChannelInterface;

interface FeedInterface {
    /**
     * Add a channel to feed
     * @param ChannelInterface $channel
     */
    public function addChannel(ChannelInterface $channel);
    
    /**
     * Output as XML
     */
    public function toXML();
    
}