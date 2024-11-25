<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Ma page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/ProjetSprint/mcv/vue/style/styleProjet2.css" />
    <link rel="shortcut icon" href="/ProjetSprint/mcv/vue/image/logoBanque.jpg" />

</head>

<body>
    <h1>Espace Agent</h1>
    <?php echo $contenueNom ?>
    <form id="monForm1" action="Projet.php" method="post">

        <p><input type="submit" value="Deconnexion" name="deconnexion"><input type="submit" name="restAgent" value="Revenir a l'Accueil"></p>

    </form>
    <form id="monForm1" action="Projet.php" method="post">
        <fieldset>
            <legend>Information Client</legend>
            <?php echo $contenuAgent1 ?>
        </fieldset>
    </form>
    <form id="monForm2" action="Projet.php" method="post">
        <fieldset>
            <legend>Synthèse Client</legend>
            <?php echo $contenuAgent2 ?>
        </fieldset>
    </form>
    <form id="monForm3" action="Projet.php" method="post">
        <fieldset>
            <legend>Depôt ou Retrait</legend>
            <?php echo $contenuAgent3 ?>
        </fieldset>
    </form>
    <form id="monForm4" action="Projet.php" method="post">
        <fieldset>
            <legend>Rendez-vous</legend>
            <?php echo $contenuAgent4 ?>
        </fieldset>
    </form>

</body>

</html>