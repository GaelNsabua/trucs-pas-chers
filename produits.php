<?php 
$title = "Produits";
$header = "Decouvrez tout nos produits";
?>
<?php require 'composants/head.php'; ?>
<?php require 'composants/nav.php'; ?>
<?php require 'composants/main.php'; ?>

<!-- importation des données -->
<?php require 'models/produits-data.php'; ?>

<h1>Tous les produits</h1>

<div>
    <!-- boucle pour parcourir les produits -->
    <?php foreach ($produits as $produit): ?>
        <!-- affichage des information du produit le nom et le prix -->
        Nom : <?php echo $produit['nom']; ?><br>
        Prix : <?php echo $produit['prix'] . ' ' . $produit['devise']; ?><br>
        <div>

            <?php foreach ($etudiants as $etudiant): ?>
                <?php if ($etudiant['id'] === $produit['etudiant_id']): ?>
                    Etudiant : <?php echo $etudiant['nom']; ?><br>
                    Promotion : <?php echo $etudiant['promotion']; ?><br>
                    Telephone : <?php echo $etudiant['tel']; ?><br>
                    <hr>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>

<?php require 'composants/footer.php'; ?>