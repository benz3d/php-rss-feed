<?php
namespace Benz3d\RSS\Item;

class Item implements ItemInterface
{

    protected $title;

    protected $description;

    protected $link;

    protected $comments;

    protected $enclosure;

    protected $author;

    protected $guid;

    protected $source;

    protected $category;

    protected $pubDate;

    public function __construct($title, $description, $link)
    {
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
    }

    public function title($title)
    {
        $this->title = $title;
        return $this;
    }

    public function description($description)
    {
        $this->description = $description;
        return $this;
    }

    public function link($url)
    {
        $this->link = $url;
        return $this;
    }

    public function comments($url)
    {
        $this->comments = $url;
        return $this;
    }

    public function enclosure($url, $length, $type)
    {
        $this->enclosure = [
            'url' => $url,
            'length' => $length,
            'type' => $type
        ];
    }

    public function author($email)
    {
        $this->author = $email;
        return $this;
    }

    public function guid($id, bool $isPermaLink = true)
    {
        $this->guid = [
            'id' => $id,
            'isPermaLink' => $isPermaLink ? 'true' : 'false'
        ];
    }

    public function source($url)
    {
        $this->source = $url;
        return $this;
    }

    public function category(array $category)
    {
        $this->category = $category;
        return $this;
    }

    public function pubDate($date)
    {
        $this->pubDate = $date;
        return $this;
    }

    public function toXML()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->startElement('item');
        $xml->writeElement('title', $this->title);
        $xml->writeElement('description', $this->description);
        $xml->writeElement('link', $this->link);

        if (isset($this->category)) {
            foreach ($this->category as $value) {
                $xml->writeElement('category', $value);
            }
        }
        if (isset($this->pubDate)) {
            $xml->writeElement('pubDate', $this->pubDate);
        }
        if (isset($this->author)) {
            $xml->writeElement('author', $this->author);
        }
        if (isset($this->source)) {
            $xml->writeElement('source', $this->source);
        }

        if (isset($this->comments)) {
            $xml->writeElement('comments', $this->comments);
        }

        if (isset($this->enclosure)) {
            $xml->startElement('enclosure');
            foreach ($this->enclosure as $k => $v) {
                $xml->writeAttribute($k, $v);
            }
            $xml->endElement();
        }

        if (isset($this->guid)) {
            $xml->startElement('guid');
            $xml->writeAttribute('isPermaLink', $this->guid['isPermaLink']);
            $xml->text($this->guid['id']);
            $xml->endElement();
        }

        $xml->endElement(); // ens item
        return $xml->outputMemory();
    }
}