<?php
class Database
{
    protected $pdo;
    public function __construct($config)
    {

        $dsn = "mysql:" . http_build_query($config, "", ";");

        //Se connecter à la base de données
        $this->pdo = new PDO($dsn);
    }
    public function query($query, $params = [])
    {
        //Préparer la requête
        $pdoStatement = $this->pdo->prepare($query);

        //Executer la requête
        $pdoStatement->execute($params);

        //Recuperer les informations à renvoyées par la requête
        return $pdoStatement;
    }
}
