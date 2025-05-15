<?php

class EtudiantModel
{
    protected $db;

    public function __construct()
    {

        $config = require "config.php";

        $this->db = new Database($config['database']);

    }
    public function getAll()
    {

        $etudiants = $this->db->query("SELECT * FROM etudiants")->fetchAll();

        return $etudiants;
    }

    public function getById($etudiant_id)
    {

        $etudiant = $this->db->query("SELECT nom FROM etudiants WHERE id = ?", [$etudiant_id])->fetch(PDO::FETCH_ASSOC);

        return $etudiant ?? null;
    }
}
