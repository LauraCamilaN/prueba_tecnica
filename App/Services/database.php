<?php

class Database
{
    private $conex;

    public function __construct()
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $this->conex = new PDO("mysql:host=host.docker.internal;dbname=prueba_tecnica;", 'root', 'root', $options);
        $this->conex->exec("SET CHARACTER SET UTF8");
    }

    public function getConex()
    {
        return $this->conex;
    }

    public function closeConex()
    {
        $this->conex = null;
    }
}
