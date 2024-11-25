<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Ma page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/ProjetSprint/mcv/vue/style/styleProjet2.css" />
    <link rel="shortcut icon" href="/ProjetSprint/mcv/vue/image/logoBanque.jpg" />

    <script type="text/javascript">
        function show_liste(str) {
            var text = '\<?php echo $data; ?>\';
            var tab = JSON.parse(text);
            document.getElementById("liste").innerHTML = "<p>Voici la liste des pièces requises : " + str.value + "</p>";
        }
    </script>

</head>

<body>
    <h1>Espace Conseiller</h1>
    <?php echo $contenueNom ?>
    <form id="monForm1" action="Projet.php" method="post">
        <p><input type="submit" value="Deconnexion" name="deconnexion"><input type="submit" name="restconseiller" value="Revenir a l'Accueil"></p>
    </form>
    <?php echo $planning ?>


    <form id="monForm1" action="Projet.php" method="post">
        <fieldset>
            <legend>Actions Conseiller </legend>
            <div class="boutton_du_haut_Conseiller">
                <form id="Agent" action="Projet.php" method="post">
                    <p>
                        <input type="submit" value="Inscrire un client" name="inscrire">
                        <input type="submit" value=" Vendre un contrat" name="vendre">
                        <input type="submit" value="Ouvrir un Compte" name="ouvrir">
                        <input type="submit" value="Modifier un découvert" name="modification_decouvert">
                        <input type="submit" value="Résilier" name="resilier">
                    </p>
                </form>
            </div>
            </header>
        </fieldset>
    </form>
    <?php echo $contenuConseiller2 ?>
</body>

</html>