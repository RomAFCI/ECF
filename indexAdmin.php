<?php
// Vérification si admin connecté
session_start();
if (!isset($_SESSION['adminConnected'])) {
    header('Location: indexConnectAdmin.php');
    
}

$host = 'localhost';
$dbname = 'craft&draw';
$user = 'root';
$password = '';

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Gestion des pages
if (isset($_GET['page']) && $_GET['page'] == 'viewMessages') {
    $sqlMessages = "SELECT * FROM contact ORDER BY idContact DESC";
    $stmtMessages = $pdo->prepare($sqlMessages);
    $stmtMessages->execute();
    $resultsMessages = $stmtMessages->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<h3>Messages de contact reçus</h3>";
    
    if (count($resultsMessages) > 0) {
        foreach ($resultsMessages as $message) {
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px 0;'>
                    <strong>Nom :</strong> " . htmlspecialchars($message['nomContact']) . "<br>
                    <strong>Prénom :</strong> " . htmlspecialchars($message['prenomContact']) . "<br>
                    <strong>Email :</strong> " . htmlspecialchars($message['emailContact']) . "<br>
                    <strong>Message :</strong><br>" . htmlspecialchars($message['commentaireContact']) . "
                  </div><br>";
        }
    } else {
        echo "<p>Aucun message de contact pour le moment.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panneau Administration - Craft & Draw</title>
</head>
<body>
    <h1>Panneau d'Administration</h1>
    <p>Bienvenue <?php echo $_SESSION['nomAdmin']; ?></p>
    
    <hr>
    
    
    <a href="?page=viewMessages">Voir les messages</a>
    
    
    
    <hr>
    <a href="index.php">Déconnexion</a>
</body>
</html>