<?php
$article = 'Monture';
$prix = 15;
$devise = '$';

$articles_names =[
    "Bracelet",
    "Montre",
    "Cable USB",
    "Ecouters",
    "Carnets",
];

$articles_prix = [
    "Bracelet" => 5000,
    "Montre" => 13000,
    "Cable USB" => 7500,
    "Ecouters" => 25000,
    "Carnets" => 2500,
];

//somme de tous les articles
$total = 0;
foreach($articles_prix as $p){
    $total += $p;
}