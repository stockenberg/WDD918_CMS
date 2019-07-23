<?php


namespace app\controller;


use app\core\Status;
use app\model\transfer\LoginTransfer;

class LoginController
{

    public function init()
    {
        switch ($_GET['action'] ?? ''){
            case 'login':
                if($this->isValid($_POST)){
                    $login = new LoginTransfer($_POST);
                }
                break;
        }
    }

    public function save(LoginTransfer $data)
    {
        $data->getUsername();
        $data->getPassword();
    }

    public function isValid(Array $post = []) : bool
    {
        if(!empty($post)){
            foreach ($post as $key => $val){
                define(strtoupper($key), $val);
            }
            if(empty(EMAIL) || empty(PASSWORD)){
                Status::write('login', 'Bitte gib deine Daten an');
                return false;
            }
        }
        return true;
    }
    

}