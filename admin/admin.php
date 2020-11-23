
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Admin</title>
</head>

<body>

    <main>
        
            <h1>Compte administrateur</h1>

        
    </main>

    <footer>
    </footer>
</body>
</html>
<?php
session_start();
$db = mysqli_connect("localhost","root","root","moduleconnexion"); // Connnexion à MySQL
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
            foreach($resultat as $value){ // Afficher la Valeur dans le body

<?php

$db = mysqli_connect("localhost","root","","moduleconnexion");
$requete = "SELECT * FROM utilisateurs;";
$query = mysqli_query($db,$requete);

    echo '<table>';
    $x = 0;
        while (($resultat = mysqli_fetch_assoc($query))!= null){
            if ($x == 0){
                echo '<thead>';
                    foreach($resultat as $key => $value){
                        echo '<th>' .$key. '</th>';
                    }
                    echo '</thead>';
                    $x = +1;
            }
            echo '<tbody>';
            foreach($resultat as $value){
                echo '<td>'.$value.'</td>';
            }
            echo '</tbody>';
        }
              ?>