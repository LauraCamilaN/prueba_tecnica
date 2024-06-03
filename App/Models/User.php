<?php

require_once(__DIR__ . '/../Core/Orm.php');
require_once(__DIR__ . '/../Core/Controller.php');

class User extends Orm
{
    public function  __construct(PDO $conex)
    {
        parent::__construct('id', 'users', $conex);
    }

    public function user($email,)
    {
        $sql = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $sql->bindValue(":email", $email);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_ASSOC);
    }
}
