<?php
$title = "Acceuil";
$header = "Bienvenu sur TrucsPasChers";
?>
<?php require 'composants/head.php'; ?>
<?php require 'composants/nav.php'; ?>
<?php require 'composants/header.php'; ?>
<?php require 'composants/main.php'; ?>

<?php
// importation du fichier de données
require 'models/articles-data.php';
?>

<section class="bg-white mt-12 rounded-xl dark:bg-gray-900">
    <div class="py-8 px-12  mx-auto max-w-screen">
        <!-- Contenu du main -->
        <p class="mb-6 text-4xl font-extrabold dark:text-white">
            <?php

            echo "Super $article pour dame "
                ?>
            <!-- mise en gras avec strong -->
            <strong>
                :<?php echo $prix . ' ' . $devise; ?>
            </strong>
        </p>

        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

        <div>
            <h3 class="mb-6 text-4xl font-extrabold dark:text-white">Les noms de tous les articles</h3>
            <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                <?php
                // la boucle foreache qui permet de parcourir la liste des articles
                foreach ($articles_names as $name): ?>
                    <li><?php echo $name; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div>

            <h3 class="my-6 text-4xl font-extrabold dark:text-white">Les prix de tous les articles </h3>

            <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                <?php foreach ($articles_prix as $name => $prix): ?>
                    <li class="pb-3 sm:pb-4">
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                            <div class="shrink-0">
                                <img class="w-8 h-8 rounded-full object-cover object-center" src="./assets/images/book.png"
                                    alt=<?php $name; ?>>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    <?php echo $name; ?>
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    Ccontact@tpc.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                <?php echo $prix . 'FC'; ?>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>

        <div>


            <h3 class="my-6 flex items-center text-4xl font-extrabold dark:text-white">Le nom et prix des articles de
                moin de
                <span
                    class="bg-blue-100 text-blue-800 text-2xl font-semibold me-2 px-2.5 py-0.5 rounded-sm dark:bg-blue-200 dark:text-blue-800 ms-2">10000fc</span>
            </h3>


            <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                <!-- affichage de nom des article de moin de 10000FC -->
                <?php foreach ($articles_prix as $name => $prix): ?>
                    <?php if ($prix < 10000): ?>
                        <li class="pb-3 sm:pb-4">
                            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                <div class="shrink-0">
                                    <img class="w-8 h-8 rounded-full object-cover object-center" src="./assets/images/logo.png"
                                        alt=<?php $name; ?>>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        <?php echo $name; ?>
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        contact@tpc.com
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    <?php echo $prix . 'FC'; ?>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>

            <h3 class="my-6 text-4xl font-extrabold dark:text-white">Le prix total de tous les articles</h3>
            <!-- appel du trainte d'affichage de la somme des articles  -->
            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                <?php echo "Le total des articles est: ", $total, "FC" ?>
            </p>
        </div>
        <div>
            <h3>L'indentité du premier etudiant</h3>
        </div>
    </div>
</section>

<?php require 'composants/footer.php'; ?>