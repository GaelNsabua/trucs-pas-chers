<?php
$title = "Nouveau produit";
$header = "Ajouter un nouveau produit";
?>
<?php require 'composants/head.php'; ?>
<?php require 'composants/nav.php'; ?>
<?php require 'composants/main.php'; ?>

<!-- importation des données -->
<?php require 'models/produits-data.php'; ?>

<h1 class="mb-6 text-4xl font-extrabold dark:text-white">Publier un nouveau produit</h1>

<div class="grid grid-cols-1 md:grid-cols-2">

    <div class="px-4">
        <form class="w-3/4 max-w-5xl" action="">
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
                focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Saisir le nom" required />
            </div>
            <div class="mb-5">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prix</label>
                <input type="number" id="price" name="price" min=1000 value=1000 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 
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
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                <input type="file" accept="image" id="image" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 
                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                dark:focus:border-blue-500" required />
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
            focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center 
            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
        </form>

    </div>

    <div>
        <h1 class="mb-6 text-2xl font-extrabold dark:text-white">Liste de tous les produits</h1>
        <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
            <?php foreach ($produits as $produit): ?>
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