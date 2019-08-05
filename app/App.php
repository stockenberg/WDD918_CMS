<?php

namespace app;

use app\controller\LoginController;
use app\core\Navigation;


class App
{
    public function init()
    {
        session_name('minifacebook');
        session_start();


        switch ($_GET['page'] ?? '') {
            case 'home':

                break;

            case 'login':
                $login = new LoginController();
                $login->init();
                break;
        }


    }

    /**
     * Takes the GET-P Parameter and concatenates it with
     * the template file in pages
     * @return string
     */
    public function getCurrentPageTemplate()
    {
        $nav = new Navigation();
        return './pages/' . $nav->getPageName($_GET['page'] ?? '') . '.php';
    }

    public static function isLoggedIn()
    {
        return !empty($_SESSION['auth'] ?? []);
    }

}