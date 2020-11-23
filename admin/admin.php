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
    echo '</table>';




?>