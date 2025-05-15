<?php

//Connection à la base de données
require "utils/DBConnection.php";

//Recuperation des étudiants de la base de données
require "models/EtudiantModel.php";

require "models/ProduitModel.php";

$etudiantModel = new EtudiantModel();

$etudiants = $etudiantModel->getAll();

$produitModel = new ProduitModel();

//Recuperer les informations à renvoyées par la requête
$produits = $produitModel->getAll();
