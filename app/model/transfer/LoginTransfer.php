<?php


namespace app\model\transfer;


class LoginTransfer
{
    private $username;
    private $password;

    public function __construct($post)
    {
        foreach ($post as $k => $v){
            $setter = 'set' . ucfirst($k);
            $this->$setter($v);
        }
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    private function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    private function setPassword($password): void
    {
        $this->password = $password;
    }




}