<?php

class State extends Orm
{
    public function __construct(PDO $conex)
    {
        parent::__construct('id', 'states', $conex);
    }
}
