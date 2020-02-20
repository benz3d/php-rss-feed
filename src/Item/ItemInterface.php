<?php
namespace Benz3d\RSS\Item;

interface ItemInterface {
    /**
     * Required. Defines the title of the item
     * @param string $title
     * @return $this
     */
    public function title($title);
    
    /**
     * Required, Defines the hyperlink to the item
     * @param $string $url
     * @return $this
     */
    public function link($url);
    
    /**
     * Required. Describes the item
     * @param string $description
     * @return $this
     */
    public function description($description);
    
    /**
     * Optional. Specifies the e-mail address to the author of the item
     * @param string $email
     * @return $this
     */
    public function author($email);
    
    /**
     * Optional. Defines one or more categories the item belongs to
     * @param array $category
     * @return $this
     */
    public function category(array $category);
    
    /**
     * 	Optional. Allows an item to link to comments about that item
     * @param string $url
     * @return $this
     */
    public function comments($url);
    
    /**
     * 
     * @param string $url      Required. Defines the length (in bytes) of the media file
     * @param string $length   Required. Defines the type of media file
     * @param string $type     Required. Defines the URL to the media file
     * @return $this
     */
    public function enclosure($url,$length,$type);
    
    /**
     * Optional. Defines the last-publication date for the item
     * @param string $date
     * @return $this
     */
    public function pubDate($date);
    
    /**
     * Optional. Specifies a third-party source for the item
     * @param string $url   Required. Specifies the link to the source
     * @return $this
     */
    public function source($url);
    
    /**
     * Optional. Defines a unique identifier for the item
     * @param string $id
     * @param bool $isPermaLink Optional. If set to true, the reader may assume that it is a permalink to the item (a url that points to the full item described by the <item> element). The default value is true. If set to false, the guid may not be assumed to be a url
     * @return $this
     */
    public function guid($id, bool $isPermaLink = true);
    
    /**
     * Output as XML
     */
    public function toXML();
}