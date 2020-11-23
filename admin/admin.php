<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../stylecss/style.css" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Admin</title>
</head>

<body>
    <header>
    <nav class="navbar">
            <a class="navlink" href="../index/index.php">Accueil</a>
            <a class="navlink" href="../profil/profil.php">Profil</a>
            <a class="navlink" href="../admin/admin.php">Admin</a>
        </nav>
</header>
    </header>

    <main>
        
            <h1 class="h1admin">Compte administrateur</h1>

        
    </main>

    <footer>
    </footer>
<?php
session_start();
$db = mysqli_connect("localhost","root","","moduleconnexion"); // Connnexion à MySQL
$requete = "SELECT * FROM utilisateurs"; // Ecrire la requête SQL tel que dans PhpMyAdmin
$query = mysqli_query($db,$requete); // Lier La connexion, avec la requête

    echo '<table>'; //Tableau

    $x = 0; //Création de la $0

    // Tant que var$rés = récup 1 ligne de tableau($query) n'est pas  nul
    // Ou récupère 1 ligne dans le tableau tant qu'il n'est pas = à nul (tant qu'il reste des lignes à récuperer)
        while (($resultat = mysqli_fetch_assoc($query))!= null){ 

            if ($x == 0){ // Si $i égal à 0

                echo '<thead>';
                    foreach($resultat as $key => $value){ // Afficher la clé dans le thead
                        echo '<th>' .$key. '</th>';
                    }
                    echo '</thead>';
                    $x = +1; // Incrémenter $x
            }

            echo '<tbody>';
            foreach($resultat as $value){
                echo '<td>'.$value.'</td>';
            }
            echo '</tbody>';
        }
              ?>
              </body>
</html>
