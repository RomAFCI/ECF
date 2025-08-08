<?php
$host = 'localhost';
$dbname = 'craftdraw';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    // Active les erreurs PDO en exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

if (isset($_POST['connection'])) {
    $nomAdmin = $_POST['nomAdmin'];
    $passwordAdmin = $_POST['passwordAdmin'];

    if (!empty($nomAdmin) && !empty($passwordAdmin)) {

        $stmt = $pdo->prepare("SELECT * FROM admin WHERE nomAdmin = :nomAdmin");
        $stmt->bindParam(':nomAdmin', $nomAdmin);
        $stmt->execute();

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($passwordAdmin, $admin['passwordAdmin'])) {

            session_start();
            $_SESSION['adminConnected'] = true;
            $_SESSION['nomAdmin'] = $admin['nomAdmin'];

            header('Location: indexAdmin.php');
        }
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
        <a class="typoContact sectionPadding" href="index.php">Retour sur le site</a>
    </div>
</body>

</html>