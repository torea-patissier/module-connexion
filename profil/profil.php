<?php

session_start();

$db = mysqli_connect("localhost", "root", "root", "moduleconnexion"); // Connnexion à MySQL

$requete = "SELECT * FROM utilisateurs WHERE id = '" . $_SESSION['id'] . "'"; // Préparer la requête

$query = mysqli_query($db, $requete); // Lier La connexion, avec la requête
$users = mysqli_fetch_assoc($query); // Récupère une ligne de résultat sous forme de Tab associatif

?>

<!DOCTYPE html>
<html lang="fr">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet">
    <title>Profil</title>
</head>
  
<body>
  
<header>
    <nav class="navbar">
            <a class="navlink" href="index.php">Accueil</a>
            <a class="navlink" href="../inscription/inscription.php">Inscription</a>
            <a class="navlink" href="../admin/admin.php">Admin</a>
        </nav>
    </header>
  
    <div class="formulaire">
                <h1 class="h1profil">Modifier vos information :</h1>
            <form action="profil.php" method="POST">
                <label for="nom">Nom</label> <br>
                <input class="nom"type="text" name="nom" placeholder="<?php echo $users['nom']; ?>"required><br>
                <label for="prenom">Prénom</label><br>
                <input class="prenom"type="text" name="prenom" placeholder="<?php echo $users['prenom'] ?>"required><br>
                <label for="login">Login</label><br>
                <input class="identifiant"type="text" name="login"placeholder="<?php echo $users['login'] ?>"required><br>
                <label for="password">Mot de passe</label><br>
                <input class="password"type="text" name="password"placeholder="<?php echo $users['password'] ?>"required><br>
                <label for="cpassword">Confirmer le mot de passe</label><br>
                <input class="password"type="text" name="cpassword"placeholder="<?php echo $users['password'] ?>"required><br>
                <input class="submit"type="submit" name="send"value="MODIFIER">
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

        if ($_POST['password'] != $_POST['confpass']) { // On vérifie que le MDP est bien le même lors de la confirmation, sinon Echo msg d'erreur
            exit('Modification du mot de passe incorrecte');
        }

    else{
        $requete2 = "UPDATE utilisateurs SET 
        `nom` = '$nom',
         `prenom` = '$prenom' ,
         `login` = '$login',
         `password` = '$password' WHERE `id` = '".$_SESSION['id']."'";
        $query = mysqli_query($db, $requete2); // Lier La connexion, avec la requête
        header('Location: http://localhost:8888//module-connexion/profil/profil.php');// Renvoi sur la page admin
        echo ("Envoyé");
    }
}

?>