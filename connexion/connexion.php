<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="inscription.css" />
    <link href="../style.css" rel="stylesheet">
    <title>Connexion</title>
</head>
<body>
    <header>
    <nav class="navbar">
            <a class="navlink" href="index.php">Accueil</a>
            <a class="navlink" href="../inscription/inscription.php">Inscription</a>
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
            <input class="submit"type="submit"value="SE CONNECTER" name="connecter">
        </div>
        </form>
    </main>
    <footer>
    </footer>
</body>
</html>

<?php 


if (!empty($_POST)) { // Si POST n'est pas vide
    $username = htmlspecialchars($_POST['login']); //$ devient $PLogin
    $password = htmlspecialchars($_POST['password']); // $ devient PPwd

    $db = mysqli_connect("localhost", "root", "root", "moduleconnexion"); //Connexion à la Db
    $requete = "SELECT * FROM utilisateurs WHERE login = '$username' AND password = '$password' "; // Requête SQL
    $query = mysqli_query($db, $requete); // Lier Connexion et requête
    $users = mysqli_fetch_assoc($query); // Récupère une ligne de résultat sous forme de Tab associatif

    if (isset($users)) { // Si l'user se connecte
        $_SESSION['id'] = $users['id']; 
        header('Location: http://localhost:8888//module-connexion/profil/profil.php'); // Renvoi sur la page profil
    }
    if ($username == 'admin' && $password == 'admin') { // Si l'ID et PwD = admin
        header('Location: http://localhost:8888//module-connexion/admin/admin.php');// Renvoi sur la page admin
    } else {
        echo 'Le login ou le password sont incorrects, veuillez réessayer.';
    }
} ?>
