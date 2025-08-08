ECF
Présentation du projet :

Pour ce projet d’artisan, j’ai décidé de partir sur un artisan fictif qui me ressemble, d’où la photo de profil sur le site.
C’est un artiste qui présente ses œuvres et qui les vend.

Il y a une présentation de l’artiste, une présentation de ses œuvres, ses coordonnées ainsi qu’un formulaire de contact pour les utilisateurs.

J’ai pris en compte le responsive pour mobile, tablette et desktop. Cependant, je ne respecte pas encore les conditions en dessous de 500 px.
Je dois également corriger ma galerie avec des balises <img> et des attributs alt, car c’est très important pour le SEO. En voulant aller trop vite, j’ai commis des erreurs lors du développement, notamment pour le MVC. Je m’explique…

J’ai d’abord travaillé sur mon HTML (que j’ai ensuite transformé en PHP) et mon CSS. De là, j’ai lié les fichiers CSS via des balises <link> et les images via leurs URLs. Cependant, après avoir modifié mon MVC, j’ai remarqué que mes fichiers CSS et mes images n’avaient plus le même chemin d’accès dans le dossier assets. Cela a donc cassé tout le visuel. Par manque de temps, j’ai préféré travailler sur autre chose afin d’obtenir quelque chose de fonctionnel.

J’ai passé du temps sur Figma afin d’utiliser au mieux les composants.

J’ai également travaillé le CSS pour avoir un design accessible, sobre et élégant. j'ai fait des overlay sur les images de la gallery, des hover, des transform + transition, j'ai utiliser une typo de google font pour le titre du site.

Concernant le back-end, j’ai choisi de mettre un lien dans le footer vers un panneau d’administration. Lorsqu’on clique dessus, on arrive sur un index permettant de se connecter. Une fois connecté, on accède à l’index du panneau d’administration.

Dans un premier temps, il est possible de consulter les commentaires des utilisateurs.

J’ai sécurisé mon code avec bindParam, htmlspecialchars et un hash pour le mot de passe.

J’ai évidemment créé un dépôt GitHub pour partager mon travail.

Le nom de la base de données est craftdraw.



Instructions d’installation :

Pour l’ensemble du projet, j’ai utilisé :

-GitHub
-VS Code
-Figma
-XAMPP
-AnalyseSI
-phpMyAdmin
-HTML
-CSS
-JavaScript
-PHP

Pour se connecter en ADMIN :

Nom : Romain

Mot de passe : 1234