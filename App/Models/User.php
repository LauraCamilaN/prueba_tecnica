<?php

class User extends Orm
{
    public function  __construct(PDO $conex)
    {
        parent::__construct('id', 'users', $conex);
    }
}
