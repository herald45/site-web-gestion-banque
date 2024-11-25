<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Ma page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/ProjetSprint/mcv/vue/style/styleProjet2.css" />
    <link rel="shortcut icon" href="/ProjetSprint/mcv/vue/image/logoBanque.jpg" />

</head>

<body>
    <h1> Espace Directeur</h1>
    <?php echo $contenueNom ?>
    <form id="monForm0" action="Projet.php" method="post">

        <p><input type="submit" value="Deconnexion" name="deconnexion"> <input type="submit" name="restA" value="Revenir a l'Accueil"></p>

    </form>
    <form id="monForm1" action="Projet.php" method="post">
        <fieldset>
            <legend>EMPLOYE</legend>
            <?php echo $contenuDir1 ?>
        </fieldset>
    </form>
    <form id="monForm2" action="Projet.php" method="post">
        <fieldset>
            <legend>CONTRAT</legend>
            <?php echo $contenuDir2 ?>
        </fieldset>
    </form>
    <form id="monForm3" action="Projet.php" method="post">
        <fieldset>
            <legend>PIÈCES A FOURNIR</legend>
            <?php echo $contenuDir3 ?>
        </fieldset>
    </form>
    <form id="monForm4" action="Projet.php" method="post">
        <fieldset>
            <legend>STATISTIQUE</legend>
            <?php echo $contenuDir4 ?>
        </fieldset>
    </form>

</body>

</html>