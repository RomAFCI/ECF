<?php



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