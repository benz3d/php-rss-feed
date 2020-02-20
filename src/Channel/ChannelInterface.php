<?php
namespace Benz3d\RSS\Channel;

use Benz3d\RSS\Item\ItemInterface;

interface ChannelInterface {
    
    /**
     * Required. Defines the title of the channel
     * @param string $title
     */
    public function title($title);
    
    /**
     * Required. Defines the hyperlink to the channel
     * @param string $link
     */
    public function link($link);
    
    /**
     * Required. Describes the channel
     * @param string $description
     */
    public function description($description);
    
    /**
     * Optional. Defines one or more categories for the feed
     * @param array $category
     */
    public function category(array $category);
    
    //public function cloud($cloud);
    
    /**
     * Optional. Notifies about copyrighted material
     * @param string $copyright
     */
    public function copyright($copyright);
    
    /**
     * Optional. Specifies a URL to the documentation of the format used in the feed
     * @param string $url
     */
    public function docs($url);
    
    /**
     * Optional. Specifies the program used to generate the feed
     * @param string $generator
     */
    public function generator($generator);
    
    /**
     * 	Optional. Allows an image to be displayed when aggregators present a feed
     * @param string $url           Required. Specifies the URL to the image
     * @param string $title         Required. Defines the text to display if the image could not be shown
     * @param string $link          Required. Defines the hyperlink to the website that offers the channel
     * @param string $description   Optional. Specifies the text in the HTML title attribute of the link around the image
     * @param number $width         Optional.  Defines the width of the image. Default is 88. Maximum value is 144
     * @param number $height        Optional. Defines the height of the image. Default is 31. Maximum value is 400
     */
    public function image($url,$title,$link,$description='',$width=88,$height=31);
    
    /**
     * Optional. Specifies the language the feed is written in
     * @param string $language
     */
    public function language($language);
    
    /**
     * Optional. Defines the last-modified date of the content of the feed
     * @param string $date
     */
    public function lastBuildDate($date);
    
    /**
     * Optional. Defines the e-mail address to the editor of the content of the feed
     * @param string $email
     */
    public function managingEditor($email);
    
    /**
     * Optional. Defines the last publication date for the content of the feed
     * @param string $date
     */
    public function pubDate($date);
    
    /**
     * Optional. Specifies the days where aggregators should skip updating the feed
     * @link https://www.w3schools.com/xml/rss_tag_skipDays.asp
     * @param array $days
     */
    public function skipDays(array $days);
    
    /**
     * Optional. Specifies the hours where aggregators should skip updating the feed
     * @link https://www.w3schools.com/xml/rss_tag_skipHours.asp
     * @param array $hours 0-23
     */
    public function skipHours(array $hours);
    
    /**
     * Optional. Specifies a text input field that should be displayed with the feed
     * @link https://www.w3schools.com/xml/rss_tag_textinput.asp
     * @param string $title         Required. Defines the label of the submit button in the text input area
     * @param string $name          Required. Defines the name of the text object in the text input area
     * @param string $description   Required. Defines a description of the text input area
     * @param string $link          Required. Defines the URL of the CGI script that processes the text input
     */
    public function textInput($title,$name,$description,$link);
    
    /**
     * 	Optional. Specifies the number of minutes the feed can stay cached before refreshing it from the source
     * @param integer $minutes
     */
    public function ttl($minutes);
    
    /**
     * Optional. Defines the e-mail address to the webmaster of the feed
     * @param string $email
     */
    public function webMaster($email);
    
    /**
     * Add an item to channel
     * @param ItemInterface $item
     */
    public function addItem(ItemInterface $item);
    
    /**
     * Output as XML
     */
    public function toXML();
    
}