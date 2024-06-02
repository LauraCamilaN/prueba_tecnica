<?php

class Company extends Orm
{
    public function __construct(PDO $conex)
    {
        parent::__construct('id', 'companies', $conex);
    }

    public function companiesProjects()
    {
        $sql = $this->db->prepare("SELECT A.id AS 'company_id', A.name AS 'company_name' FROM companies AS A INNER JOIN projects AS B ON A.ID = B.company_id GROUP BY A.id ORDER BY A.id");
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
