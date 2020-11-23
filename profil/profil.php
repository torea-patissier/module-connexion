<?php

session_start();

$db = mysqli_connect("localhost", "root", "", "moduleconnexion"); // Connnexion à MySQL

$requete = "SELECT * FROM utilisateurs WHERE id = '" . $_SESSION['id'] . "'"; // Préparer la requête

$query = mysqli_query($db, $requete); // Lier La connexion, avec la requête
$users = mysqli_fetch_assoc($query); // Récupère une ligne de résultat sous forme de Tab associatif

?>

<!DOCTYPE html>
<html lang="fr">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../stylecss/style.css" rel="stylesheet">
    <title>Profil</title>
</head>
  
<body>
  
<header>
        <nav class="navbar">
            <a class="navlink" href="../index/index.php">Accueil</a>
        </nav>
    </header>
  
    <div class="formulaire">
                <h1 class="h1profil">Profil</h1>
            <form action="profil.php" method="POST">
                <label for="nom">Nom</label> <br>
                <input class="nom"type="text" name="nom" placeholder="<?php echo $users['nom']; ?>"><br>
                <label for="prenom">Prénom</label><br>
                <input class="prenom"type="text" name="prenom" placeholder="<?php echo $users['prenom'] ?>"><br>
                <label for="login">Login</label><br>
                <input class="identifiant"type="text" name="login"placeholder="<?php echo $users['login'] ?>"><br>
                <label for="password">Mot de passe</label><br>
                <input class="password"type="text" name="password"placeholder="<?php echo $users['password'] ?>"><br>
                <label for="cpassword">Confirmer le mot de passe</label><br>
                <input class="password"type="text" name="cpassword"placeholder="<?php echo $users['password'] ?>"><br>
                <input class="submit"type="submit" name="send"value="MODIFIER">
                <input class="submit"type="submit" name="deco"value="DECONNEXION" onclick="alert('Vous êtes déconnecté')">

            </form>
    </div>
  
</body>
</html>

<?php 

if(isset($_POST['send'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    if(!isset($_POST)){
        exit("Veuillez remplir tous les champs.");

        }elseif(($_POST['password']) != ($_POST['cpassword'])){
            exit("Vos mots de passe ne correspondent pas");

            }else{
                $requete = "UPDATE utilisateurs SET login = '$login',  prenom = '$prenom', nom = '$nom', password = '$password' WHERE id = '".$_SESSION['id']."'";
                $query = mysqli_query($db, $requete);
                header('location:http://localhost/module-connexion/profil/profil.php');
                echo "Vos données sont modifié";
    }
}
if(isset($_POST['deco'])){
    session_destroy();
    header('location:http://localhost/module-connexion/index/index.php');
}

?>