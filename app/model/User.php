<?php


namespace app\model;


use app\core\Database;
use app\model\transfer\LoginTransfer;

class User
{

    use Database;

    public function getUsername(LoginTransfer $login)
    {
        $db = $this->connect();
        $SQL = 'SELECT * FROM users WHERE username = :username';
        $stmt = $db->prepare($SQL);
        if($stmt->execute([':username' => $login->getUsername()])){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        return false;
    }

    
}