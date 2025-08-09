<?php
//$uri=$_SERVER['REQUEST_URI'];
class roter{
    public $url;
    public $urlArray;
    public function __construct($url){
        $this->url=$url;
    }
    public function parsurl(){
        $address = $this->urlArray= explode("/",$this->url);
        return $address;
    }
}
//$roter = new roter($url);
//$urlArray =$rooter->$parsurl();
