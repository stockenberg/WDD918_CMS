<?php


namespace app\core;


class Guard
{


    public static function protect() {
        if(!self::isLoggedIn()){
            header('Location: ?page=login');
            exit();
        }
    }


    public static function isLoggedIn()
    {
        return !empty($_SESSION['auth'] ?? []);
    }
}