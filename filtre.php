<?php

$title = "Filtre";

$etudiant_id = $_GET["etudiant"] ?? 1;

//Connection à la base de données
require "utils/DBConnection.php";

//Recuperation du modele Etudiant
require "models/EtudiantModel.php";

//Recuperation du modele Produit
require "models/ProduitModel.php";

$etudiantModel = new EtudiantModel();

$etudiants = $etudiantModel->getAll();

//Recuperation du nom de l'étudiant correspondant à l'id recuperée dans l'URL
$etudiant = $etudiantModel->getById($etudiant_id);

$nom_etudiant = $etudiant["nom"] ?? "";

//Recuperation des produits filtrées dans la base de données
$produitModel = new ProduitModel();

//Recuperer les produits filtrés
$produits = $produitModel->filterByEtudiantId($etudiant_id);

$header = isset($nom_etudiant) && $nom_etudiant != "" ?  "Filtre des produits : $nom_etudiant " : "Aucun étudiant trouvé ";

?>
<?php require 'composants/head.php'; ?>
<?php require 'composants/nav.php'; ?>
<?php require 'composants/main.php'; ?>

<h1 class="mb-6 text-4xl font-extrabold dark:text-white"><?php echo $header ?></h1>
<div class="mb-2 flex flex-row justify-center items-center">
    <?php foreach ($etudiants as $etudiant): ?>
        <?php if ($etudiant["id"] == $etudiant_id): ?>

            <span
                class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-2 my-3 rounded-sm dark:bg-gray-700 dark:text-gray-300 border border-gray-100 inline-flex items-center justify-center">

                <?php echo $etudiant['nom']; ?>

            </span>

        <?php else: ?>

            <a href="filtre.php?etudiant=<?php echo $etudiant['id']; ?>"
                class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-xs font-semibold me-2 px-2.5 py-2 my-3 rounded-sm dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">

                <?php echo $etudiant['nom']; ?>

            </a>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<?php if (isset($nom_etudiant)) : ?>

    <div class="grid grid-cols-3 gap-4">
        <?php foreach ($produits as $produit): ?>

            <div
                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <div class="h-96 w-full md:h-80 md:w-full bg-cyan-400 rounded-t-lg flex justify-center items-center">
                        <img class="object-cover object-center w-full rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                            src=<?php echo './uploads/images/' . $produit['image']; ?> alt=<?php echo $produit['nom']; ?> />
                    </div>
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class="text-2xl pt-4 font-semibold tracking-tight text-gray-900 dark:text-white">
                            <?php echo $produit["nom"] ?>
                        </h5>
                    </a>
                    <div class="flex items-center mt-2.5 mb-5">
                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                        </div>
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-sm dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span
                            class="text-3xl font-bold text-gray-900 dark:text-white"><?php echo $produit["prix"], $produit["devise"] ?></span>
                        <a href="#"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Contact</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php require 'composants/footer.php'; ?>