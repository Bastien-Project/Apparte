<?php
require "header.php";

$isRegister = isset($_GET['register']);
$title = $isRegister ? "Inscription" : "Connexion";
$message = '';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';

    if ($isRegister) {
        $first_name = $_POST['first_name'] ?? '';
        $last_name = $_POST['last_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone_number = $_POST['phone_number'] ?? '';

        // Vérifie si email déjà utilisé
        $checkMail = $pdo->prepare("SELECT * FROM client WHERE email = ?");
        $checkMail->execute([$email]);
        if ($checkMail->fetch()) {
            $message = "Un compte avec cet e-mail existe déjà.";
        } else {
            // Inscription
            $stmt = $pdo->prepare("INSERT INTO client (first_name, last_name, password, email, phone_number) VALUES (?, ?, ?, ?, ?)");
            $hashedPassword = hash('sha512', $password);
            $stmt->execute([
                $first_name,
                $last_name,
                $hashedPassword,
                $email,
                $phone_number
            ]);
            $message = "Inscription réussie !";
        }
    } else {
        // Connexion
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $stmt = $pdo->prepare("SELECT * FROM client WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && hash('sha512', $password) === $user['password']) {
            // Connexion réussie
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['first_name'] = $user['first_name'];
            header("Location: index.php");
            exit;
        } else {
            $message = "Email ou mot de passe incorrect.";
        }
    }
}
?>

<div class="container">
    <h1><?= $title ?></h1>

    <?php if ($message): ?>
        <p class="message"><?= $message ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <?php if ($isRegister): ?>
            <div class="form-group">
                <label for="first_name">Prénom</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>

            <div class="form-group">
                <label for="last_name">Nom</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Numéro de téléphone</label>
                <input type="tel" id="phone_number" name="phone_number" required>
            </div>
        <?php else: ?>
            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="text" id="email" name="email" required>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit"><?= $isRegister ? "S'inscrire" : "Se connecter" ?></button>
    </form>

    <p>
        <?php if ($isRegister): ?>
            Vous avez déjà un compte ? <a href="login.php">Se connecter</a>
        <?php else: ?>
            Vous n'avez pas de compte ? <a href="login.php?register">S'inscrire</a>
        <?php endif; ?>
    </p>
</div>

<?php
require "footer.php";
?>

<style>
    body {
        font-family: Arial;
        background: #f5f5f5;
        padding: 30px;
    }

    .container {
        max-width: 400px;
        margin: auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input {
        width: 100%;
        padding: 8px;
    }

    button {
        width: 100%;
        padding: 10px;
        background: #007BFF;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background: #0056b3;
    }

    p.message {
        background: #eee;
        padding: 10px;
        border-radius: 5px;
    }
</style>