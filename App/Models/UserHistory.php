<?php

class UserHistory extends Orm
{
    public function __construct(PDO $conex)
    {
        parent::__construct('id', 'user_stories', $conex);
    }

    public function list()
    {
        $sql = $this->db->prepare("SELECT A.id AS 'id_user_stories', B.name AS 'project_name', C.name AS 'company_name', E.names, E.last_names FROM user_stories AS A INNER JOIN projects AS B ON B.id = A.project_id INNER JOIN companies AS C ON C.id = B.company_id INNER JOIN users AS E ON E.id = A.user_id ORDER BY A.id");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function listEdit($id)
    {
        $sql = $this->db->prepare("SELECT A.description, A.id AS 'user_story_id', C.id AS 'company_id', C.name AS 'company_name', P.id AS 'project_id', P.name AS 'project_name', U.names, U.last_names FROM user_stories AS A INNER JOIN projects AS P ON P.id = A.project_id INNER JOIN companies AS C ON C.id = P.company_id INNER JOIN users AS U ON U.id = A.user_id WHERE A.id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
