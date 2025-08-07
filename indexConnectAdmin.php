<?php

$host = 'localhost';
$dbname = 'craft&draw';
$user = 'root';
$password = '';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erreur de connexion : " . $e->getMessage();
}

$error = '';

// Traitement du formulaire de connexion
if (isset($_POST['connection'])) {
    $nomAdmin = trim($_POST['nomAdmin']);
    $passwordAdmin = $_POST['passwordAdmin'];
    
    if (!empty($nomAdmin) && !empty($passwordAdmin)) {
        try {
            // Requête pour récupérer l'admin
            $stmt = $pdo->prepare("SELECT * FROM admin WHERE nomAdmin = :nomAdmin");
            $stmt->bindParam(':nomAdmin', $nomAdmin);
            $stmt->execute();
            
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($admin && $admin['passwordAdmin'] === $passwordAdmin) {
                // Connexion réussie - démarrer la session
                session_start();
                $_SESSION['admin_logged'] = true;
                $_SESSION['admin_name'] = $admin['nomAdmin'];
                
                // Redirection vers le panneau d'administration
                header('Location: indexAdmin.php');
                exit();
            } else {
                $error = 'Nom d\'utilisateur ou mot de passe incorrect.';
            }
        } catch (PDOException $e) {
            $error = 'Erreur lors de la connexion : ' . $e->getMessage();
        }
    } else {
        $error = 'Veuillez remplir tous les champs.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/favicon.png" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="reset.css" />
    <title>Admin - Craft & Draw</title>
</head>

<body class="sectionFlex sectionPadding backgroundAboutMe">


    <div class="cardFormAdmin sectionPadding">

        <form class="formFlex typoContact" method="POST">
            <label>Nom</label>
            <input class="input" type="text" name="nomAdmin" value="" placeholder="Nom" required>
            <label>Mot de passe</label>
            <input class="input" type="password" name="passwordAdmin" value="" placeholder="Mot de passe" required>
            <input class="input" type="submit" name="connection" value="Se connecter">
        </form>
    </div>
<script src="js.js"></script>
</body>

</html>