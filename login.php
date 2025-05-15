<?php
$title = "Login";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        isset($_POST["email"]) && isset($_POST["password"])
    ) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = [
            "nom" => "Admin",
            "email" => "admin@trucspaschers.com",
            "password" => "admin123"
        ];

        if ($user["email"] == $email && $user["password"] == $password) {
            $message["success"] = "Connexion reussie";

            //Demarrer la session
            session_start();

            //Enregistrement des informations de l'utilisateur dans la session
            $_SESSION["user"] = [
                "nom" => $user["nom"],
                "email"=> $user["email"]
            ];

            session_regenerate_id(true);

            //Redirection
            header("Location: create.php");
            exit(); 

        } else {
            $message["error"] = "Votre email ou mot de passe est incorrect";
        }
    } else {
        $message["error"] = "Veuillez remplir tous les champs";
    }
}
?>
<?php require 'composants/head.php'; ?>
<?php require 'composants/nav.php'; ?>
<?php require 'composants/main.php'; ?>

<h1 class="mb-6 text-4xl font-extrabold dark:text-white">Formulaire de connexion</h1>

<?php if (isset($message["error"])) : ?>
    <div class="flex items-center p-4 mb-4 text-sm w-2/3 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">Notification erreur!</span> <?= $message["error"] ?>
        </div>
    </div>
<?php elseif (isset($message["success"])) : ?>
    <div class="flex items-center p-4 mb-4 text-sm w-2/3 bg-green-50 dark:bg-green-100 text-green-600
         dark:border-green-800 rounded-lg" role="alert">
        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-bold">Notification succès!</span> <?php echo $message["success"] ?>
        </div>
    </div>
<?php endif; ?>

<form action="login.php" method="POST" class="max-w-sm mx-auto my-20">
    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre email</label>
        <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="nom@gmail.com" required />
    </div>
    <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Votre mot de passe</label>
        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm 
    rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 
    dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
    dark:focus:border-blue-500" required />
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none 
    focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center 
    dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Se connecter</button>
</form>


<?php require 'composants/footer.php'; ?>