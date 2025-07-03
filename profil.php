<?php

include("header.php");

//page pour voir et modifier son profil
$title = "Mon Profil";
$message = "";

// Récupération des informations de l'utilisateur
if (isset($_SESSION['user_id'])) {
    $stmt = $pdo->prepare("SELECT * FROM client WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validation et mise à jour des données
}
if (isset($_POST['update'])) {
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';

    // Mise à jour des informations dans la base de données
    $stmt = $pdo->prepare("UPDATE client SET first_name = ?, last_name = ?, email = ?, phone_number = ? WHERE id = ?");
    $stmt->execute([$first_name, $last_name, $email, $phone_number, $_SESSION['user_id']]);

    $message = "Profil mis à jour avec succès !";
}
?>

<section id="profil">
    <div class="profil-container">
        <h1><?= $title ?></h1>
        <?php if (!empty($message)) : ?>
            <p class="message"><?= $message ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="first_name">Prénom :</label>
                <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($user['first_name'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="last_name">Nom :</label>
                <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($user['last_name'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Numéro de téléphone :</label>
                <input type="tel" id="phone_number" name="phone_number" value="<?= htmlspecialchars($user['phone_number'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" name="update">Mettre à jour</button>
            </div>
        </form>
    </div>
</section>

<?php include("footer.php") ?>