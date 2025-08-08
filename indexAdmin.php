<?php

// Connexion à la base de données
$host = 'localhost';
$dbname = 'craftdraw';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
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

<body class="backgroundAboutMe sectionPadding">

    <div class="sectionFlex">
        <div>
            <h1 class="typoH2">Panneau d'Administration</h1>

            <?php

            $sql = "SELECT * FROM contact ORDER BY idContact ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($contacts)) {
                echo '<h2 class="typoH2">Messages de contact :</h2>';

                foreach ($contacts as $contact) {
                    echo '<div class="backgroundCardContact sectionPadding marginCom">';

                    echo '<p class="typoContact">Nom: ' . htmlspecialchars($contact['nomContact']) . '</p>';
                    echo '<p class="typoContact">Prénom: ' . htmlspecialchars($contact['prenomContact']) . '</p>';
                    echo '<p class="typoContact">Email: ' . htmlspecialchars($contact['emailContact']) . '</p>';
                    echo '<p class="typoContact">Commentaire: ' . htmlspecialchars($contact['commentaireContact']) . '</p>';
                    echo '</div>';
                }
            }
            ?>

            <div>

                <br>
                <a href="indexConnectAdmin.php" class="typoNav">Déconnexion admin</a>
            </div>
        </div>
    </div>

</body>

</html>