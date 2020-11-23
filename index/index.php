<?php 
session_start();
if(isset($_SESSION['id']) AND 'id' == TRUE){
echo '    <header>
<nav class="navbar">
        <a class="navlink" href="../index/index.php">Accueil</a>
        <a class="navlink" href="../profil/profil.php">Profil</a>
    </nav>
</header>';
}
else{
    echo '    <header>
    <nav class="navbar">
            <a class="navlink" href="../index/index.php">Accueil</a>
            <a class="navlink" href="../connexion/connexion.php">Connexion</a>
        </nav>
    </header>';
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../stylecss/style.css" rel="stylesheet">
    <title>Page d'acceuil</title>
</head>

<body class="body">
    <header>
    </header>
    <main>
        <div class="img-netflix">
            <img src="../image/netflix.png" alt="">
        </div>
        <div>
            <h1 class="h1accueil">Films, séries TV et bien plus en illimité.</h1>
        </div>
        <div class="paccueil">
            <p>Où que vous soyez. Annulez à tout moment. Prêt à regarder Netflix ? Saisissez votre adresse e-mail pour vous
            abonner ou réactiver votre abonnement.</p>
        </div>
    </main>
    <footer>
        <div class="bouton3">
            <div class="button1">
                <label for="input"></label>
                <a href="../connexion/connexion.php"><input type="button" class="button" value="S'IDENTIFIER"></a>
            </div>
            <div class="button2"></div>
                <label for="input"></label>
                <a href="../inscription/inscription.php"><input type="button" class="button" value="S'INSCRIRE"></a>
            </div>
        </div>
    </footer>
</body>

</html>

