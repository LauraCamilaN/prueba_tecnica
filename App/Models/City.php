<?php

require_once(__DIR__ . '/../Core/Orm.php');
require_once(__DIR__ . '/../Core/Controller.php');

class City extends Orm
{

    public function __construct(PDO $conex)
    {
        parent::__construct('id', 'cities', $conex);
    }

    public function findCities($id)
    {
        $sql = $this->db->prepare("SELECT * FROM cities WHERE state_id = :state_id");
        $sql->bindValue(":state_id", $id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
