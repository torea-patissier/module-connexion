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
    <link rel="stylesheet" type="text/css" href="inscription.css" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Profil</title>
</head>

<body>

    <main>
        <form action="profil.php" method="POST">
            <label>Nom</label><br />
            <input type="text" name="nom" placeholder="<?php echo $users['nom'] ?>"required><br />
            <label>Prénom</label><br />
            <input type="text" name="prenom" placeholder="<?php echo $users['prenom'] ?>"required><br />
            <label>Login</label><br />
            <input type="text" name="login" placeholder="<?php echo $users['login'] ?>"required><br />
            <label>Mot de passe</label><br />
            <input type="password" name="password" placeholder="<?php echo $users['password'] ?>"required><br />
            <label>Nouveau mot de passe</label><br />
            <input type="password" name="confpass" placeholder="<?php echo $users['password'] ?>"required><br />
            <input type="submit" value="Modifier" name="modifier">
        </form>
    </main>
    <footer>
    </footer>
</body>

</html>
<?php

if (isset($_POST['modifier'])) { // Si on appuie sur le Modifier

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