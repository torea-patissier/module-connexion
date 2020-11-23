<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet">
    <title>Connexion</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <a class="navlink" href="../index/index.php">Accueil</a>
            <a class="navlink" href="../connexion/connexion.php">Connexion</a>
            <a class="navlink" href="../admin/admin.php">Admin</a>
        </nav>
    </header>
    <main>
        <div class="formulaire2">
            <div class="h1connexion">
                <h1>Connexion</h1>
            </div>
            <form action="connexion.php" method="POST">

            <label for="connexion"></label>
            <input class="identifiant" type="text" name ="login" id="login"placeholder="Nom de compte"> <br>

            <label for="password"></label>
            <input class="password"type="password" name="password" id="password" placeholder="Mot de passe"> <br>

            <label for="seconnecter"></label>
            <a href="../profil/profil.php"><input class="submit"type="submit"value="SE CONNECTER" name="connecter"></a>
        </div>
        </form>
    </main>
    <footer>
    </footer>
</html>

<?php 
if(!empty($_POST)){     
    $username = htmlspecialchars($_POST['login']);    // $ deviens $postlogin  
    $password = htmlspecialchars($_POST['password']);      // $ deviens $postpassword

        $requete = "SELECT * FROM utilisateurs WHERE login = '$username' AND password = '$password' ";    // conxien a sql
        $db = mysqli_connect("localhost", "root", "", "moduleconnexion");     // connexion a la bdd 
        $query = mysqli_query($db,$requete);     // lier connexion et requete
        $users = mysqli_fetch_assoc($query);    // recupere une ligne de resultat sous de tableau associatif   
            if(isset($users)){         
                $_SESSION['id'] = $users['id'];         
                header('Location: http://localhost/Travail/module-connexion/profil/profil.php');     
            }     
            if($username == 'admin' && $password == 'admin')
        {         
                header('Location: http://localhost/Travail/module-connexion/admin/admin.php');     
            }     
            else{echo 'Le login ou le password sont incorrects, veuillez réessayer.';     } } ?>