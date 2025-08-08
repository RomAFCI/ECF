<?php
// Affiche toutes les erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Test : affiche ce qui est posté
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
}
?>



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

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="./images/favicon.png" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="reset.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Cherish&display=swap"
    rel="stylesheet" />
  <title>Craft & Draw</title>
</head>

<body>
  <section>
    <header class="headerFlex paddingHeader backgroundHeader">
      <div class="logo"><a href=""></a></div>
      <h1 class="typoTitle title">Craft & Draw</h1>
      <nav class="navHeader typoNav">
        <ul class="headerFlex">
          <li><a href="#aboutme">À propos de moi</a></li>
          <li><a href="#gallery">Galerie</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>

      <div class="menuBurger"></div>
    </header>
  </section>
  <main>
    <section class="backgroundAboutMe sectionPadding">
      <div class="sectionFlex sectionPadding">
        <div class="profilPics"></div>
        <div class="containerText">
          <h2 class="typoH2" id="aboutme">À propos de moi :</h2>
          <p class="typoText">
            Dessinateur depuis toujours, passionné par le dessin depuis tout
            petit, l'art, les différents univers etc... Lorem ipsum dolor, sit
            amet consectetur adipisicing elit. Molestiae rem quas quia? Cumque
            voluptatibus ipsa dolorum ea nisi tempore, deleniti accusamus
            dolor eum amCumque voluptatibus ipsa dolorum ea nisi tempore,
            deleniti accusamus dolor eum amet voluptatem suscipit facere,
            doloremque officia cum. Lorem, ipsum dolor sit amet consectetur
            adipisicing elit. Nam eaque cum saepe deleniti, iure aut
            temporibus
          </p>
        </div>
      </div>
    </section>
    <section class="galleryFlex backgroundGallery sectionPadding">
      <h2 class="typoH2" id="gallery">Galerie :</h2>
      <div class="gridGallery sectionPadding">
        <!-- 
        A CORRIGER 
           <img class="pics1 pics" src="./images/pics1.png" alt="Craft&Draw"> 
           -->
        <div class="pics1 pics"></div>
        <div class="pics2 pics"></div>
        <div class="pics3 pics"></div>
        <div class="pics4 pics"></div>
        <div class="pics5 pics"></div>
        <div class="pics6 pics"></div>
      </div>
    </section>
    <section class="backgroundContact sectionPadding contactFlex">
      <h2 class="typoH2" id="contact">Contacts :</h2>
      <div class="containerFooterFlex">
        <div
          class="card cardTextFlex backgroundCardContact sectionPadding typoContact">
          <div class="cardFooterFlex">
            <div class="icon icon1"></div>
            <p>Roger DUMOULIN</p>
          </div>
          <div class="cardFooterFlex">
            <div class="icon icon2"></div>
            <p>Tél: 01.02.03.04.05</p>
          </div>
          <div class="cardFooterFlex">
            <div class="icon icon3"></div>
            <p>Adresse: 520 rue dumoulin 59495 DUNKERQUE</p>
          </div>
          <div class="cardFooterFlex">
            <div class="icon icon4"></div>
            <p>Mail: Craft&Draw@gmail.com</p>
          </div>
          <div class="cardFooterFlex">
            <div class="icon icon5"></div>
            <p>Instagram: Craft&Draw</p>
          </div>
        </div>
        <div class="cardForm sectionPadding">
          <form class="formFlex typoContact" method="POST">
    <label>Nom</label>
    <input class="input" type="text" name="nomContact" placeholder="Nom" required />
    
    <label>Prénom</label>
    <input class="input" type="text" name="prenomContact" placeholder="Prénom" required />
    
    <label>Mail</label>
    <input class="input" type="email" name="emailContact" placeholder="Email" required />
    
    <label>Commentaires</label>
    <textarea class="input" name="commentaireContact" placeholder="Votre message..."></textarea>
    
    <input class="input button" type="submit" name="submitContact" value="Envoyer" />
</form>
        </div>
      </div>
    </section>
  </main>
  <footer class="backgroundFooter sectionPadding footerFlex">
    <div>
      <nav class="typoNav">
        <ul class="navFooterFlex">
          <li><a href="#aboutme">À propos de moi</a></li>
          <li><a href="#gallery">Galerie</a></li>
          <li><a href="#contact">Contact</a></li>

        </ul>
      </nav>
    </div>
    <div>
      <p class="typoFooter">Tous droits réservés - ©Craft&Draw - 2025</p>
    </div>
    <div class="typoFooter">
      <a href="indexConnectAdmin.php">Panneau Administrateur</a>
    </div>
  </footer>
  <script src="js.js"></script>
</body>

</html>

<?php
var_dump($_POST);

// Traitement du formulaire de contact
if (isset($_POST['submitContact'])) {
    $nomContact = $_POST['nomContact'];
    $prenomContact = $_POST['prenomContact'];
    $emailContact = $_POST['emailContact'];
    $commentaireContact = $_POST['commentaireContact'];
    
    $sqlContact = "INSERT INTO `contact`(`nomContact`, `prenomContact`, `emailContact`, `commentaireContact`) 
        VALUES (:nom, :prenom, :email, :commentaire)";
    $stmtContact = $pdo->prepare($sqlContact);
    $stmtContact->bindParam(':nom', $nomContact);
    $stmtContact->bindParam(':prenom', $prenomContact);
    $stmtContact->bindParam(':email', $emailContact);
    $stmtContact->bindParam(':commentaire', $commentaireContact);
    $stmtContact->execute();
    
    echo "<p>Votre message a été envoyé avec succès !</p>";
}

?>