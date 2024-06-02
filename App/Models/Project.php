<?php

class Project extends Orm
{
    public function __construct(PDO $conex)
    {
        parent::__construct('id', 'projects', $conex);
    }

    public function findProjects($id)
    {
        $sql = $this->db->prepare("SELECT * FROM projects WHERE company_id = :company_id");
        $sql->bindValue(":company_id", $id);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
