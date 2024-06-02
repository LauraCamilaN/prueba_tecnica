<?php

class Ticket extends Orm
{
    public function __construct(PDO $conex)
    {
        parent::__construct('id', 'tickets', $conex);
    }
}
