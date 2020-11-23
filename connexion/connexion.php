<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="inscription.css" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Connexion</title>
</head>

<body>
    <header>
        <h1>Connexion</h1>
    </header>
    <main>
        <form action="connexion.php" method="POST">

            <label for="connexion">Nom de compte</label>
            <input type="text" name="login" id="login">

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">

            <label for="seconnecter"></label>
            <input type="submit" value="Se connecter" name="connecter">
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