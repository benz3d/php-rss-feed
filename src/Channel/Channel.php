<?php
namespace Benz3d\RSS\Channel;

use Benz3d\RSS\Item\ItemInterface;

class Channel implements ChannelInterface{
    protected $title;
    protected $description;
    protected $link;
    protected $image;
    protected $copyright;
    protected $skipHours;
    protected $lastBuildDate;
    protected $generator;
    protected $language;
    protected $managingEditor;
    protected $pubDate;
    protected $ttl;
    protected $webMaster;
    protected $skipDays;
    protected $textInput;
    protected $docs;
    protected $category;
    protected $items = [];
    
    public function __construct($title,$description,$link){
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
    }
    
    public function title($title)
    {
        $this->title =$title;
        return $this;
    }
    
    public function description($description)
    {
        $this->description = $description;
        return $this;
    }
    
    public function link($link)
    {
        $this->link = $link;
        return $this;
    }
    
    public function image($url, $title, $link, $description = '', $width = 88, $height = 31)
    {
        $this->image = [
            'url' => $url,
            'title' => $title,
            'link' => $link,
            'description' => $description, 
            'width' => $width, 
            'height' => $height
        ];
        
        return $this;
    }

    public function copyright($copyright)
    {
        $this->copyright = $copyright;
        return $this;
    }

    public function skipHours(array $hours)
    {
        $this->skipHours = $hours;
        return $this;
    }

    public function lastBuildDate($date)
    {
        $this->lastBuildDate = $date;
        return $this;
    }

    public function generator($generator)
    {
        $this->generator = $generator;
        return $this;
    }

    public function language($language)
    {
        $this->language = $language;
        return $this;
        
    }

    public function managingEditor($email)
    {
        $this->managingEditor = $email;
        return $this;
        
    }

    public function pubDate($date)
    {
        $this->pubDate = $date;
        return $this;
    }

    public function ttl($minutes)
    {
        $this->ttl = $minutes;
        return $this;
    }

    public function webMaster($email)
    {
        $this->webMaster = $email;
        return $this;
    }

    public function skipDays(array $days)
    {
        $this->skipDays = $days;
        return $this;
    }

    public function textInput($title, $name, $description, $link)
    {
        $this->textInput = [
            'title' => $title, 
            'name'  => $name,
            'description' => $description, 
            'link' => $link
        ];
        
        return $this;
    }

    public function docs($url)
    {
        $this->docs = $url;
        return $this;
    }

    public function category(array $category)
    {
        $this->category = $category;
        return $this;
    }

    public function addItem(ItemInterface $item)
    {
        $this->items[] = $item;
        return $this;
    }
    
    public function toXML()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->startElement('channel');
        $xml->writeElement('title',$this->title);
        $xml->writeElement('description',$this->description);
        $xml->writeElement('link',$this->link);
        
        if (isset($this->image)) {
            $xml->startElement('image');
            foreach ($this->image as $tag => $value) {
                $xml->writeElement($tag,$value);
            }
            $xml->endElement();
        }
        
        if(isset($this->category)){
            foreach ($this->category as $value) {
                $xml->writeElement('category',$value);
            }
        }
        
        if(isset($this->copyright)){
            $xml->writeElement('copyright',$this->copyright);
        }
        
        if(isset($this->skipDays)){
            $xml->startElement('skipDays');
            foreach ($this->skipDays as $day) {
                $xml->writeElement('day',$day);
            }
            $xml->endElement();
        }
        
        if(isset($this->skipHours)){
            $xml->startElement('skipHours');
            foreach ($this->skipHours as $h) {
                $xml->writeElement('hour',$h);
            }
            $xml->endElement();
        }
        
        if(isset($this->lastBuildDate)){
            $xml->writeElement('lastBuildDate',$this->lastBuildDate);
        }
        
        if(isset($this->pubDate)){
            $xml->writeElement('pubDate',$this->pubDate);
        }
        
        if(isset($this->generator)){
            $xml->writeElement('generator',$this->generator);
        }
        
        if(isset($this->language)){
            $xml->writeElement('language',$this->language);
        }
        
        if(isset($this->ttl)){
            $xml->writeElement('ttl',$this->ttl);
        }
        
        if(isset($this->managingEditor)){
            $xml->writeElement('managingEditor',$this->managingEditor);
        }
        
        if(isset($this->webMaster)){
            $xml->writeElement('webMaster',$this->webMaster);
        }
        
        if(isset($this->docs)){
            $xml->writeElement('docs',$this->docs);
        }
        
        if (isset($this->textInput)) {
            $xml->startElement('textInput');
            foreach ($this->textInput as $tag => $value) {
                $xml->writeElement($tag,$value);
            }
            $xml->endElement();
        }
        
        if(!empty($this->items)){
            foreach ($this->items as $item){
                $xml->writeRaw($item->toXML());
            }
        }
        
        $xml->endElement(); // end channel
        
        return $xml->outputMemory();
    }
    
}