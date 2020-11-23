<!DOCTYPE html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../stylecss/style.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Inscription</title>
</head>

<body>

<?php
$db = mysqli_connect("localhost", "root", "", "moduleconnexion");

//var_dump($_POST);
if (isset($_POST["sinscrire"])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    $select = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login = '" . $_POST["login"] . "'");
    if (mysqli_num_rows($select)) {
        exit('Ce login est déjà utilisé');
    } 
    elseif ($_POST['password'] != $_POST['confpass']) {
        exit('Vos mots de passe ne correspondent pas');
    } else {
        $requete = "INSERT INTO utilisateurs(login, prenom, nom, password) VALUES( '$login', '$prenom', '$nom', '$password')";
        $query = mysqli_query($db, $requete);
        $_SESSION['login'] = $_POST['login'];
        header('Location: http://localhost/module-connexion/connexion/connexion.php');
    }
}

?>
    <header>

        <nav class="navbar">
            <a class="navlink" href="../index/index.php">Accueil</a>
            <a class="navlink" href="../connexion/connexion.php">Connexion</a>
        </nav>
    </header>
    <!-- IMPORTANT mettre action = inscription car les infos récupéré dans le PHP seront envoyé  depuis inscription à la Db -->
    <div class="formulaire">
        <div class="h1inscription">
            <h1>Formulaire d'inscription</h1><br />
        </div>
        <form action="inscription.php" method="post"><br />

            <input class="nom" type="text" name='nom' placeholder="Nom" required><br />

            <input class="prenom" type="text" name='prenom' placeholder="Prénom" required><br />

            <input class="identifiant" type="text" name='login' placeholder="Identifiants" required><br />

            <input class="password" type="password" name='password' placeholder="Mot de passe" required><br />

            <input class="password" type="password" name='confpass' placeholder="Confirmation mot de passe" required><br />

        <footer>
            <a href="../connexion/connexion.php"><input class="submit" type="submit" name="sinscrire" value="S'INSCRIRE" onclick="alert('Votre compte a été crée avec succès')"></a>
        </footer>
        </form>

    </div>

</body>
</html>
