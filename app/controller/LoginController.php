<?php


namespace app\controller;


use app\core\Status;
use app\model\transfer\LoginTransfer;
use app\model\User;

class LoginController
{


    public function init()
    {


        switch ($_GET['action'] ?? ''){
            case 'login':
                if($this->isValid($_POST)){
                    $login = new LoginTransfer($_POST);
                    $model = new User();
                    $result = $model->getUsername($login);

                    if(!empty($result)){
                        if(password_verify($login->getPassword(), $result[0]['password'])){

                            $_SESSION['auth'] = [
                                'username' => $result[0]['username'],
                                'id' => $result[0]['id']
                            ];

                            header('Location: ?page=home');
                            exit();
                        }
                    }

                    Status::write('login', 'Incorrect data');

                }
                break;
        }
    }

    public function isValid(Array $post = []) : bool
    {
        if(!empty($post)){
            foreach ($post as $key => $val){
                define(strtoupper($key), $val);
            }
            if(empty(USERNAME) || empty(PASSWORD)){
                Status::write( 'login', 'Bitte gib deine Daten an');
                return false;
            }
        }
        return true;
    }
    

}