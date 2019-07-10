<?php
namespace App\Core;

class App {

    public static $registery = [];

    public static function bind($key, $value)
    {
        static::$registery[$key] = $value;
    }


    public static function get($key)
    {
        return static::$registery[$key];
    }


}