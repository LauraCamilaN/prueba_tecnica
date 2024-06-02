<?php

class Orm
{
    protected $id;
    protected $table;
    protected $db;

    public function __construct($id, $table, PDO $conex)
    {
        $this->id = $id;
        $this->table = $table;
        $this->db = $conex;
    }

    public function getAll()
    {
        $sql = $this->db->prepare("SELECT * FROM {$this->table}");
        $sql->execute();

        return $sql->fetchAll();
    }

    public function countAll()
    {
        $sql = $this->db->prepare("SELECT COUNT(*) FROM {$this->table}");
        $sql->execute();

        return $sql->fetchColumn();
    }

    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (";

        foreach ($data as $key => $value) {
            $sql .= "{$key},";
        }

        $sql = trim($sql, ',');
        $sql .= ") VALUES (";

        foreach ($data as $key => $value) {
            $sql .= ":{$key},";
        }

        $sql = trim($sql, ',');
        $sql .= ")";

        $stm = $this->db->prepare($sql);

        foreach ($data as $key => $value) {
            $stm->bindValue(":{$key}", $value);
        }

        $stm->execute();
    }

    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET ";
        foreach ($data as $key => $value) {
            $sql .= "{$key} = :{$key},";
        }
        $sql = trim($sql, ',');
        $sql .= " WHERE id = :id";

        $stm = $this->db->prepare($sql);
        foreach ($data as $key => $value) {
            $stm->bindValue(":{$key}", "{$value}");
        }
        $stm->bindValue(":id", $id);
        $stm->execute();
    }
}
