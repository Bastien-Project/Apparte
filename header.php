<!DOCTYPE html>
<html lang="fr">

<?php
session_start();

// AIDE, a delete une fois fini
if (!empty($_SESSION)) {
    print_r("Vous êtes connecté en tant que " . $_SESSION['first_name']);
} else {
    print_r("Vous n'êtes pas connecté");
}

// secret variables pour la version en ligne
$host = 'localhost';
$dbname = 'apparte';
$user = 'root';
$pass = '';

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

/* A UTILISER QUE POUR INITIALISER LA BASE DE DONNÉES
// Connexion à la base de données
$pdo = new PDO("mysql:host=$host", $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// Lecture du fichier SQL
$sql = file_get_contents(__DIR__ . '/init_apparte.sql');

// Exécution du script SQL
$pdo->exec($sql);
*/

?>

<head>
    <meta charset="UTF-8">
    <title>Projet Apparté</title>
    <link rel="stylesheet" href="style.css">
    <script src="script-navbar.js" defer></script>
    <script src="script-slider.js" defer></script>
    <script src="https://kit.fontawesome.com/8a2d35d848.js" crossorigin="anonymous"></script>
</head>

<!-- A DELETE UNE FOIS FINI -->
<div style="color:red; font-weight: bold; font-size: 2em; text-align: center; margin: 20px;">
    <p>Projet en cours de développement, certaines fonctionnalités peuvent ne pas être disponibles.</p>
</div>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <div class="text logo-text">
                    <p class="name">Projet Apparté</p>
                </div>
            </div>
            <i class="fa-solid fa-circle-chevron-right toggle"></i>
        </header>

        <div class="menu-bar">
            <ul class="menu-links">
                <li class="nav-link">
                    <a href="index.php">
                        <i class="fa-solid fa-house"></i>
                        <span class="text">&nbsp; Accueil</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="chambre.php">
                        <i class="fa-solid fa-bed"></i>
                        <span class="text">&nbsp; Chambre</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span class="text">&nbsp; Réservations</span>
                    </a>
                </li>
                <?php if (empty($_SESSION)) { ?>
                <li class="nav-link">
                    <a href="login.php">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        <span class="text">&nbsp; Connexion</span>
                    </a>
                </li>
                <?php } else { ?>
                <li class="nav-link">
                    <a href="profil.php">
                        <i class="fa-solid fa-user"></i>
                        <span class="text">&nbsp; Mon profil</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a href="logout.php">
                        <i class="fa-solid fa-right-to-bracket reverse"></i>
                        <span class="text">&nbsp; Déconnexion</span>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
    <div class="main-content">