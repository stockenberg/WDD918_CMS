<?php


namespace app\core;


use app\interfaces\IStatus;

/**
 * Class Status
 * @package app\core
 */
class Status implements IStatus
{
    private static $status = [];

    /**
     * @param String $key
     * @param String $value
     */
    public static function write(String $key, String $value)
    {
        self::$status[$key] = $value;
    }

    /**
     * @param String $key
     * @return string
     */
    public static function read(String $key): string
    {
        return self::$status[$key] ?? '';
    }

    /**
     * @return bool
     */
    public static function isEmpty(): bool
    {
        return empty(self::$status);
    }

}
