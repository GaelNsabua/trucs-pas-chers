<?php 

require "models/Database.php";

//Recuperation de la config et connection à la base de données

$config = require "config.php";

$db = new Database($config['database']);