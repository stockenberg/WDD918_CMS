<?php

namespace app;

use app\controller\LoginController;
use app\controller\NewsController;
use app\core\Guard;
use app\core\Navigation;


class App
{

    public $data;

    public function init()
    {
        session_name('minifacebook');
        session_start();


        switch ($_GET['page'] ?? '') {
            case 'home':
                Guard::protect();
                break;

            case 'login':
                $login = new LoginController();
                $login->init();
                break;

            case 'edit_news':
            case 'manage_news':
            case 'create_news';
                Guard::protect();
                $news = new NewsController();
                $this->data = $news->init();
                break;
        }

        if(isset($_GET['action'])){
            if($_GET['action'] === 'logout' ){
                $_SESSION['auth'] = [];
                session_destroy();
            }
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

    /**
     * @param $page
     */
    public static function redirect($page){
        header('Location: ?page=' . $page);
        exit();
    }



}