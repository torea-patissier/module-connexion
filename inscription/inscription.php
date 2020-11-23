<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" rel="stylesheet">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <title>Inscription</title>
</head>

<body>

<header>

<nav class="navbar">
            <a class="navlink" href="index.php">Accueil</a>
            <a class="navlink" href="../inscription/inscription.php">Inscription</a>
            <a class="navlink" href="../admin/admin.php">Admin</a>
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

            </form>
        
<footer>
        <input class="submit"type="submit" name="sinscrire" value="S'INSCRIRE" onclick="alert('Votre compte a été crée avec succès')">
</footer>
    </div>

    <?php


    $dbco = mysqli_connect('localhost', 'root', 'root', 'moduleconnexion'); // Etablir la connexion avec mySql


    if (isset($_POST['sinscrire'])) { // Si on appuie sur Envoyer alors
        $nom = $_POST['nom']; // On associe $nom à $POST
        $prenom = $_POST['prenom']; // On associe $prenom à $POST
        $login = $_POST['login']; // On associe $login à $POST
        // $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // On associe $password à $POST et on hash le MDP pour le crypter dans le Db
        $password = $_POST['password']; // On associe $password à $POST et on hash le MDP pour le crypter dans le Db

        $select = mysqli_query($dbco, "SELECT * FROM `utilisateurs` WHERE `login` = '" . $_POST['login'] . "'"); // On vérifie  si un Login n'est pas déjà existant
        if (mysqli_num_rows($select)) { // SI $SELECT existe alors, un login de ce nom est déjà existant
            exit('Ce login existe déjà'); // Afficher un message
        } // FIN DE LA COMMANDE DE LA L39

        elseif ($_POST['password'] != $_POST['confpass']) { // On vérifie que le MDP est bien le même lors de la confirmation, sinon Echo msg d'erreur
            exit('Mauvais mot de passe');
        } else { // SI le Login n'est pas existant, alors on créer une requête pour envoyer les valeurs saisient par l'utilisateur
            $sql = "INSERT INTO utilisateurs (nom, prenom, login, password) VALUES('$nom','$prenom','$login','$password')"; // Prépare  la requête
            mysqli_query($dbco, $sql) or die('Erreur!' . $sql . '<br/>' . mysqli_connect_error()); // Execute la requête ou affiche message d'erreur
            header('Location:http://localhost:8888/module-connexion/connexion/connexion.php'); // Redirection de Inscription vers Connexion
        }
    }

    ?>

</body>

</html>