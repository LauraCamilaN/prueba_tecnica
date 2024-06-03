<?php

require_once(__DIR__ . '/../Core/Orm.php');
require_once(__DIR__ . '/../Core/Controller.php');

class State extends Orm
{
    public function __construct(PDO $conex)
    {
        parent::__construct('id', 'states', $conex);
    }
}
