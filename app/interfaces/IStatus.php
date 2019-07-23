<?php


namespace app\interfaces;


interface IStatus
{
    public static function write(String $key, String $value);
    public static function read(String $key) : string;
    public static function isEmpty() : bool;

}