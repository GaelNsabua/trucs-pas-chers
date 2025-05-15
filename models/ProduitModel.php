<?php


class ProduitModel
{
    protected $db;

    public function __construct()
    {

        $config = require "config.php";

        $this->db = new Database($config['database']);
    }
    public function getAll()
    {

        $produits = $this->db->query("SELECT * FROM produits")->fetchAll();

        return $produits;
    }

    public function filterByEtudiantId($etudiant_id)
    {

        $produits = $this->db->query(
            "SELECT * FROM produits WHERE etudiant_id = :etudiant_id",
            ["etudiant_id" => $etudiant_id]
        )->fetchAll();

        return $produits;
    }

    public function insert(array $data){

        //Enregistrer les infos du produit dans la base de données
        $this->db->query(
            "INSERT INTO produits (etudiant_id, nom, prix, devise, image)  VALUES ( ?, ?, ?, ?, ?)",
            [$data["etudiant_id"], $data["name"], $data["price"], $data["currency"], $data["image_name"]]
        );

        return true;

    }
}
