<?php

require 'models/produits-data.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["currency"])
        && isset($_POST["etudiantId"])
    ) {

        $name = $_POST["name"];
        $price = $_POST["price"];
        $currency = $_POST["currency"];
        $etudiant_id = $_POST["etudiantId"];

        $image_name = $_FILES["image"]["name"];
        $image_tmp_name = $_FILES["image"]["tmp_name"];


        //Déplacer l'image dans le dossier uploads
        move_uploaded_file($image_tmp_name, "uploads/images/" . $image_name);

        //Recuperation des produits filtrées dans la base de données
        $produitModel = new ProduitModel();

        //Recuperer les produits filtrés
        $success = $produitModel->insert([
            "name" => $name,
            "price"=> $price,
            "currency" => $currency,
            "etudiant_id" => $etudiant_id,
            "image_name"=> $image_name,
        ]);
    }
}

$title = "Nouveau produit";
$header = "Ajouter un nouveau produit";
?>
<?php require 'composants/head.php'; ?>
<?php require 'composants/nav.php'; ?>
<?php require 'composants/main.php'; ?>


<?php if (isset($success) && $success === true) : ?>
    <div class="flex items-center p-4 mb-4 text-sm w-2/3 bg-green-50 dark:bg-green-100 text-green-600
         dark:border-green-800 rounded-lg" role="alert">
        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-bold">Notification succès!</span> Le produit <span class="font-medium"><?php echo $name ?></span> a été ajouté avec succès
        </div>
    </div>
<?php endif; ?>


<h1 class="mb-6 text-4xl font-extrabold dark:text-white">Publier un nouveau produit</h1>

<div class="grid grid-cols-1 md:grid-cols-2">

    <div class="px-4 md:pr-16">
        <form action="create.php" method="POST" enctype="multipart/form-data">
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du produit</label>
                <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Saisir le nom" required />
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2.5">
                <div class="mb-5">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix</label>
                    <input type="number" id="price" name="price" value=1000 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>
                <div class="mb-5">
                    <label for="currency" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Devise</label>
                    <select id="currency" name="currency" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>FC</option>
                        <option>$</option>
                    </select>
                </div>
            </div>

            <div class="mb-5">
                <label for="etudiantId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Etudiant</label>
                <select id="etudiantId" name="etudiantId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 
                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                dark:focus:border-blue-500">
                    <?php foreach ($etudiants as $etudiant): ?>
                        <option value=<?php echo $etudiant["id"]; ?>><?php echo $etudiant["nom"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Ajouter une image</label>
                <input class="w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer 
                bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 
                dark:placeholder-gray-400" aria-describedby="image_help" id="image" name="image" type="file">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="image">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>

            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
            focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center 
            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
        </form>

    </div>

    <div>
        <h1 class="mb-6 text-2xl font-extrabold dark:text-white">Liste de tous les produits</h1>
        <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
            <?php foreach (array_reverse($produits) as $produit): ?>
                <li class="pb-1 sm:pb-2">
                    <div class="flex items-center space-x-4 rtl:space-x-reverse">
                        <div class="shrink-0 py-1.5">
                            <img class="w-8 h-8 rounded-full object-cover object-center" src=<?php echo './uploads/images/' . $produit['image']; ?>
                                alt=<?php $produit["nom"]; ?>>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                <?php echo $produit["nom"]; ?>
                            </p>

                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <?php echo $produit["prix"] . $produit["devise"]; ?>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>


<?php require 'composants/footer.php'; ?>