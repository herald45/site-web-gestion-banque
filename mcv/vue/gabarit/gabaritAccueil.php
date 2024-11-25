<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Ma page</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="/ProjetSprint/mcv/vue/image/logoBanque.jpg" />
    <link rel="stylesheet" href="/ProjetSprint/mcv/vue/style/styleProjet2.css" />

</head>

<body>
    <form action="Projet.php" method="post">
        <fieldset>
            <legend>Bienvenue</legend>

            <p><label> Login : </label><input type="text" name="login" /></p>
            <p><label> Mot de passe : </label><input type="password" name="mdp"></p>
            <p> <input type="submit" value="Connexion" name="connexion"><input type="reset" value="Effacer"> </p>
        </fieldset>
    </form>
    <?php echo $contenu ?>
</body>

</html>