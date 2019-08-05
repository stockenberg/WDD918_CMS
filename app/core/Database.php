<?php


namespace app\core;


trait Database
{

    public function connect()
    {
        return new \PDO('mysql:host=localhost;dbname=minifacebook', "root", "admin");
    }

}