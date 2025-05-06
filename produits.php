<?php
$title = "Produits";
$header = "Decouvrez tout nos produits";
?>
<?php require 'composants/head.php'; ?>
<?php require 'composants/nav.php'; ?>
<?php require 'composants/main.php'; ?>

<!-- importation des données -->
<?php require 'models/produits-data.php'; ?>

<h1 class="mb-6 text-4xl font-extrabold dark:text-white">Tous les produits</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mx-auto">
    <?php foreach ($produits as $produit): ?>
        <div
            class="flex flex-col items-center my-3 bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-2xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <div class="h-96 w-full md:h-52 md:w-48 bg-cy rounded-l-lg flex justify-center items-center">
                <img class="object-cover object-center w-full rounded-t-lg md:h-auto md:w-full md:rounded-none md:rounded-s-lg"
                    src=<?php echo './uploads/images/' . $produit['image']; ?> alt=<?php echo $produit['nom']; ?>>
            </div>
            <div class="flex flex-col justify-between p-4 leading-normal">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">

                    <?php echo $produit['nom']; ?>

                </h5>

                <span class="text-xl font-bold text-gray-900 dark:text-amber-300 my-2">
                    <?php echo $produit['prix'] . ' ' . $produit['devise']; ?>
                </span>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-100">
                    <?php foreach ($etudiants as $etudiant): ?>
                        <?php if ($etudiant['id'] === $produit['etudiant_id']): ?>
                            Etudiant :
                            <a class="text-cyan-200 font-medium hover:text-cyan-400 hover:underline" href="filtre.php?etudiant=<?php echo $produit['etudiant_id']; ?>">
                                <?php echo $etudiant['nom']; ?>
                            </a><br>
                            Promotion : <?php echo $etudiant['promotion']; ?><br>
                            Telephone : <?php echo $etudiant['tel']; ?><br>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require 'composants/footer.php'; ?>