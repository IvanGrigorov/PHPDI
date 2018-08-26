<?php


class URLParser  {

    public $url;

    public function __construct() {
    //    $this->url = $url;
    }
    
    
    function parseUrl($url) {
        $urlQuery = explode("/", $url);
        return $urlQuery;
        
    }

    function parseUrlTest($url, $one, $two) {
        return ($url.$one.$two);        
    }
    
} 

?>