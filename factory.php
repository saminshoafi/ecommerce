<?php
class factory{
    public static function factory($object){
        return new $object;
    }
}