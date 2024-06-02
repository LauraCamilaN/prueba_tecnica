<?php

class Ticket extends Orm
{
    public function __construct(PDO $conex)
    {
        parent::__construct('id', 'tickets', $conex);
    }

    public function list()
    {
        $sql = $this->db->prepare("SELECT A.id AS 'ticket_id', A.user_story_id, B.name AS 'status', D.name AS 'prject_name', E.name AS 'company_name'
        FROM tickets AS A INNER JOIN ticket_states AS B ON B.id = A.ticket_state_id INNER JOIN user_stories AS C 
        ON C.id = A.user_story_id INNER JOIN projects AS D ON D.id = C.project_id INNER JOIN companies AS E ON E.id = D.company_id
        ORDER BY A.id");

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function states()
    {
        $sql = $this->db->prepare("SELECT * FROM ticket_states");
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listEdit($id)
    {
        $sql = $this->db->prepare("SELECT A.id AS 'ticket_id', A.user_story_id, A.comments, B.name AS 'status', B.id AS 'status_id', D.name AS 'project_name', E.name AS 'company_name', C.description, U.names, U.last_names FROM tickets AS A INNER JOIN ticket_states AS B ON B.id = A.ticket_state_id INNER JOIN user_stories AS C ON C.id = A.user_story_id INNER JOIN projects AS D ON D.id = C.project_id INNER JOIN companies AS E ON E.id = D.company_id INNER JOIN users AS U ON U.id = C.user_id WHERE A.id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
