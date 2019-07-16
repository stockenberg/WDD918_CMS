<?php


namespace app\controller;


class LoginController
{

    public function init()
    {
        switch ($_GET['action'] ?? ''){
            case 'login':
                echo "Log me in";
                break;
        }
    }

}