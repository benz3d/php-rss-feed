<?php
namespace Benz3d\RSS\Feed;

use Benz3d\RSS\Channel\ChannelInterface;

class Feed implements FeedInterface {
    
    protected $channels = [];
    protected $xmlVersion = '1.0';
    protected $encoding = 'UTF-8';
    protected $rssVersion = '2.0';
    
    public function addChannel(ChannelInterface $channel)
    {
        $this->channels[] = $channel;
        return $this;
    }

    public function toXML()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->startDocument($this->xmlVersion,$this->encoding);
        $xml->startElement('rss');
            $xml->writeAttribute('version', $this->rssVersion);
            if (!empty($this->channels)) {
                foreach ($this->channels as $channel) {
                    $xml->writeRaw($channel->toXML());
                }
            }
        $xml->endElement();//end rss
        $xml->endElement();
        
        $xml->endDocument();
        return $xml->outputMemory();
    }

    
}