<?php
session_start();

$db= mysqli_connect("localhost","root","","moduleconnexion"); // connexion a ma base de donné

$requete= "SELECT * FROM utilisateurs WHERE id='" .$_SESSION['id']."'"; // preparer la demande

$query = mysqli_query($db, $requete); // lier la connexion a la requete
$users = mysqli_fetch_assoc($query); // lis la ligne ID selectionner
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

    if(!isset($_POST)){
        exit("Veuillez remplir tous les champs.");

        }elseif(($_POST['password']) != ($_POST['cpassword'])){
            exit("Vos mots de passe ne correspondent pas");

            }else{
                $requete = "UPDATE `utilisateurs` SET `login` = '$login',  `prenom` = '$prenom', `nom` = '$nom', `password` = '$password' WHERE `id` = '".$_SESSION['id']."'";
                $query = mysqli_query($db, $requete);
                header('location:http://localhost/Travail/module-connexion/profil/profil.php');
                echo "Vos données sont modifié";

    }
}



?>