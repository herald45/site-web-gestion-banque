<?php

class conseillerException extends Exception
{
    public function getMsg()
    {
        $msg = '';
        require_once('gabarit/gabaritConseiller.php');
        $msg .= '<fieldset><div class="erreur"><p>' . $this->getMessage() . '</p></div></fieldset><p>';
        echo $msg;
    }
}

//vue Conseiller

function  AfficheConseiller($id, $rdv, $nom)
{ //affiche la page du conseiller
    $contenuConseiller2 = '';
    $contenueNom = '<h2> Bonjour ' . $nom . '</h2>';

    $planning = '';

    $jour = date("w") - 1; // numéro du jour actuel

    $nom_mois = date("F", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));
    $annee =  date("Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));
    $num_week = date("W", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));

    $dateDebSemaineFr = date("d/m/Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));
    $dateFinSemaineFr = date("d/m/Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 7, date("y")));

    $planning .= '<form id="agent" action="Projet.php" method="post"/> <div id="titreMois" align="center"><input type="hidden" value="' . $jour . '" name="ghost"/>
   <input type="submit" value="Semaine precedent" name="prec_conseiller"> Semaine ' . $num_week . ' <input type="submit" value="Semaine suivante" name="next_conseiller"><input type="hidden" value="' . $id . '" name="ghostrdv"/><br/>
    du ' . $dateDebSemaineFr . ' au ' . $dateFinSemaineFr . '
</div>';

    $jourTexte = array('', 1 => 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    $plageH = array(9 => '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00');

    switch ($nom_mois) {
        case 'January':
            $nom_mois = 'Janvier';
            break;
        case 'February':
            $nom_mois = 'Février';
            break;
        case 'March':
            $nom_mois = 'Mars';
            break;
        case 'April':
            $nom_mois = 'Avril';
            break;
        case 'May':
            $nom_mois = 'Mai';
            break;
        case 'June':
            $nom_mois = 'Juin';
            break;
        case 'July':
            $nom_mois = 'Juillet';
            break;
        case 'August':
            $nom_mois = 'Août';
            break;
        case 'September':
            $nom_mois = 'Septembre';
            break;
        case 'October':
            $nom_mois = 'Otober';
            break;
        case 'November':
            $nom_mois = 'Novembre';
            break;
        case 'December':
            $nom_mois = 'Décembre';
            break;
    }

    $planning .= '<br/>
<div id="titreMois" align="center">
    <h2>' . $nom_mois . ' ' . $annee . '</h2>
</div></form>';

    $planning .= '<table border="1" align="center">';

    // en tête de colonne
    $planning .= '<tr>';
    for ($k = 0; $k < 6; $k++) {
        if ($k == 0)
            $planning .= '<th>' . $jourTexte[$k] . '</th>';
        else
            $planning .= '<th><div>' . $jourTexte[$k] . ' ' . date("d", mktime(0, 0, 0, date("n"), date("d") - $jour + $k, date("y"))) . '</div></th>';
    }
    $planning .= '</tr>';

    $tour = 1;
    $size = count($rdv);

    // les 2 plages horaires : matin - midi
    for ($h = 9; $h < 20; $h++) {
        $planning .= '<tr>
        <th>
            <div>' . $plageH[$h] . '</div>
        </th>';
        $planning .= '<form id="Conseiller" action="Projet.php" method="post">';
        // les infos pour chaque jour
        for ($j = 1; $j < 6; $j++) {
            for ($c = 0; $c < $size; $c++) {
                $RDV = date_parse($rdv[$c]->DATERDV);
                if ($RDV['hour'] ==  $h && $RDV['day'] == date("j", mktime(0, 0, 0, date("n"), date("d") - $jour + $j, date("y"))) && date("Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y"))) == $RDV['year'] && date("n", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y"))) == $RDV['month']) {
                    $planning .= '<td><div class="boutton_submit_plann"><input type="submit"  value="Rendez-Vous" name="affiche_rdv"/><input type="hidden" value="' . $rdv[$c]->DATERDV . '" name="ghost_rdv"/><input type="hidden" value="' . $id . '" name="ghost_id"/></div></td>';
                    $tour = 0;
                }
            }
            if ($tour == 1) {
                $planning .= '<td></td>';
            }
            $tour = 1;
        }

        $planning .= '</td></form>
            </tr>';
    }
    $planning .= '</table>';
    require_once('gabarit/gabaritConseiller.php');
}
function AfficherPlanningConseiller2($id, $date, $rdv)
{
    $contenueNom = '<h2> Bonjour </h2>';
    $contenuConseiller2 = '';


    $planning = '';

    $jour = $date; // numéro du jour actuel

    $nom_mois = date("F", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));
    $annee =  date("Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));
    $num_week = date("W", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));

    $dateDebSemaineFr = date("d/m/Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));
    $dateFinSemaineFr = date("d/m/Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 7, date("y")));

    $planning .= '<form id="agent" action="Projet.php" method="post"/> <div id="titreMois" align="center"><input type="hidden" value="' . $jour . '" name="ghost"/>
   <input type="submit" value="Semaine precedent" name="prec_conseiller"> Semaine ' . $num_week . ' <input type="submit" value="Semaine suivante" name="next_conseiller"><input type="hidden" value="' . $id . '" name="ghostrdv"/><br/>
    du ' . $dateDebSemaineFr . ' au ' . $dateFinSemaineFr . '
</div>';

    $jourTexte = array('', 1 => 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    $plageH = array(9 => '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00');

    switch ($nom_mois) {
        case 'January':
            $nom_mois = 'Janvier';
            break;
        case 'February':
            $nom_mois = 'Février';
            break;
        case 'March':
            $nom_mois = 'Mars';
            break;
        case 'April':
            $nom_mois = 'Avril';
            break;
        case 'May':
            $nom_mois = 'Mai';
            break;
        case 'June':
            $nom_mois = 'Juin';
            break;
        case 'July':
            $nom_mois = 'Juillet';
            break;
        case 'August':
            $nom_mois = 'Août';
            break;
        case 'September':
            $nom_mois = 'Septembre';
            break;
        case 'October':
            $nom_mois = 'Otober';
            break;
        case 'November':
            $nom_mois = 'Novembre';
            break;
        case 'December':
            $nom_mois = 'Décembre';
            break;
    }

    $planning .= '<br/>
<div id="titreMois" align="center">
    <h2>' . $nom_mois . ' ' . $annee . '</h2>
</div></form>';

    $planning .= '<table border="1" align="center">';

    // en tête de colonne
    $planning .= '<tr>';
    for ($k = 0; $k < 6; $k++) {
        if ($k == 0)
            $planning .= '<th>' . $jourTexte[$k] . '</th>';
        else
            $planning .= '<th><div>' . $jourTexte[$k] . ' ' . date("d", mktime(0, 0, 0, date("n"), date("d") - $jour + $k, date("y"))) . '</div></th>';
    }
    $planning .= '</tr>';

    $tour = 1;
    $size = count($rdv);

    // les 2 plages horaires : matin - midi
    for ($h = 9; $h < 20; $h++) {
        $planning .= '<tr>
        <th>
            <div>' . $plageH[$h] . '</div>
        </th>';
        $planning .= '<form id="Conseiller" action="Projet.php" method="post">';
        // les infos pour chaque jour
        for ($j = 1; $j < 6; $j++) {
            for ($c = 0; $c < $size; $c++) {
                $RDV = date_parse($rdv[$c]->DATERDV);
                if ($RDV['hour'] ==  $h && $RDV['day'] == date("j", mktime(0, 0, 0, date("n"), date("d") - $jour + $j, date("y"))) && date("Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y"))) == $RDV['year'] && date("n", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y"))) == $RDV['month']) {
                    $planning .= '<td><div class="boutton_submit_plann"><input type="submit"  value="Rendez-Vous" name="affiche_rdv"/><input type="hidden" value="' . $rdv[$c]->DATERDV . '" name="ghost_rdv"/><input type="hidden" value="' . $id . '" name="ghost_id"/></div></td>';
                    $tour = 0;
                }
            }
            if ($tour == 1) {
                $planning .= '<td></td>';
            }
            $tour = 1;
        }

        $planning .= '</td></form>
            </tr>';
    }
    $planning .= '</table>';
    require_once('gabarit/gabaritConseiller.php');
}
function afficherInformationClient2($identite, $motif, $id, $rdv)
{
    $contenuConseiller2 = '';
    $contenueNom = '<h2> Bonjour </h2>';

    $planning = '';

    $jour = date("w") - 1; // numéro du jour actuel

    $nom_mois = date("F", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));
    $annee =  date("Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));
    $num_week = date("W", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));

    $dateDebSemaineFr = date("d/m/Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));
    $dateFinSemaineFr = date("d/m/Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 7, date("y")));

    $planning .= '<form id="agent" action="Projet.php" method="post"/> <div id="titreMois" align="center"><input type="hidden" value="' . $jour . '" name="ghost"/>
   <input type="submit" value="Semaine precedent" name="prec_conseiller"> Semaine ' . $num_week . ' <input type="submit" value="Semaine suivante" name="next_conseiller"><input type="hidden" value="' . $id . '" name="ghostrdv"/><br/>
    du ' . $dateDebSemaineFr . ' au ' . $dateFinSemaineFr . '
</div>';

    $jourTexte = array('', 1 => 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    $plageH = array(9 => '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00');

    switch ($nom_mois) {
        case 'January':
            $nom_mois = 'Janvier';
            break;
        case 'February':
            $nom_mois = 'Février';
            break;
        case 'March':
            $nom_mois = 'Mars';
            break;
        case 'April':
            $nom_mois = 'Avril';
            break;
        case 'May':
            $nom_mois = 'Mai';
            break;
        case 'June':
            $nom_mois = 'Juin';
            break;
        case 'July':
            $nom_mois = 'Juillet';
            break;
        case 'August':
            $nom_mois = 'Août';
            break;
        case 'September':
            $nom_mois = 'Septembre';
            break;
        case 'October':
            $nom_mois = 'Otober';
            break;
        case 'November':
            $nom_mois = 'Novembre';
            break;
        case 'December':
            $nom_mois = 'Décembre';
            break;
    }

    $planning .= '<br/>
<div id="titreMois" align="center">
    <h2>' . $nom_mois . ' ' . $annee . '</h2>
</div></form>';

    $planning .= '<table border="1" align="center">';

    // en tête de colonne
    $planning .= '<tr>';
    for ($k = 0; $k < 6; $k++) {
        if ($k == 0)
            $planning .= '<th>' . $jourTexte[$k] . '</th>';
        else
            $planning .= '<th><div>' . $jourTexte[$k] . ' ' . date("d", mktime(0, 0, 0, date("n"), date("d") - $jour + $k, date("y"))) . '</div></th>';
    }
    $planning .= '</tr>';

    $tour = 1;
    $size = count($rdv);

    // les 2 plages horaires : matin - midi
    for ($h = 9; $h < 20; $h++) {
        $planning .= '<tr>
        <th>
            <div>' . $plageH[$h] . '</div>
        </th>';
        $planning .= '<form id="Conseiller" action="Projet.php" method="post">';
        // les infos pour chaque jour
        for ($j = 1; $j < 6; $j++) {
            for ($c = 0; $c < $size; $c++) {
                $RDV = date_parse($rdv[$c]->DATERDV);
                if ($RDV['hour'] ==  $h && $RDV['day'] == date("j", mktime(0, 0, 0, date("n"), date("d") - $jour + $j, date("y"))) && date("Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y"))) == $RDV['year'] && date("n", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y"))) == $RDV['month']) {
                    $planning .= '<td><div class="boutton_submit_plann"><input type="submit"  value="Rendez-Vous" name="affiche_rdv"/><input type="hidden" value="' . $rdv[$c]->DATERDV . '" name="ghost_rdv"/><input type="hidden" value="' . $id . '" name="ghost_id"/></div></td>';
                    $tour = 0;
                }
            }
            if ($tour == 1) {
                $planning .= '<td></td>';
            }
            $tour = 1;
        }

        $planning .= '</td></form>
            </tr>';
    }
    $planning .= '</table>';


    foreach ($identite as $ligne) {
        $contenuConseiller2 .= '<fieldset><legend>Information du Client</legend><form name="formu" action="Projet.php" method="post"><p><label>Nom : </label><input type="text" name="nomcli" value="' . $ligne->NOM . '"readonly="readonly"/></p>
                            <p><label>Prenom : </label><input type="text" name="prenomcli" value="' . $ligne->PRENOM . '"readonly="readonly"/></p><p><label>Numero client : </label><input type="text" name="numcli" value="' . $ligne->NUMCLIENT . '"readonly="readonly"/></p>
                            <p><label>Numero conseiller : </label><input type="text" name="nomemp" value="' . $ligne->NUMEMPLOYE . '"readonly="readonly"/></p><p><label>Adresse : </label><input type="text" name="adresse" value="' . $ligne->ADRESSE . '"/></p>
                            <p><label>Date de naissance : </label><input type="text" name="datenaiss" value="' . $ligne->DATE_NAISS . '"readonly="readonly"/></p>
                            <p><label>Numero tel : </label><input type="tel" name="numtel" value="' . $ligne->NUMTEL . '" pattern="[0]{1}[0-9]{9}" /></p>
                            <p><label>Profession : </label><input type="text" name="profession" value="' . $ligne->PROFESSION . '"/></p>
                            <p><label>Mail : </label><input type="email" name="mail" value="' . $ligne->MAIL . ' "pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$""/></p>
                            <p><label>Situation : </label><input type="text" name="situation" value="' . $ligne->SITUATION . '"/></p>
                           <div class="boutton_submit"> <p><input type="submit" value="Modifier" name="modif_info"/> <input type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';
    }
    foreach ($motif as $ligne) {
        $contenuConseiller2 .= '<fieldset><legend>Information Motif</legend><p><label>Libelle Motif : </label><input type="text" value="' . $ligne->LIBELLEMOTIF . '" readonly="readonly"/></p>
<p><label>Liste des pieces : </label><input type="text" value=" ' . $ligne->LISTEPIECES . '" readonly="readonly"/></p></fieldset>';
    }
    require_once('gabarit/gabaritConseiller.php');
}
function afficherInterfaceInscrire()
{ // dans conseiller, affiche l'interface pour crée un client 
    $contenuConseiller2 = '<fieldset><legend>Inscrire un Client</legend><form id="Conseiller" action="Projet.php"  method="post"> <p><label> Nom : </label> <input type="text" name="nomclient" required /></p>
    <p><label> Prénom : </label> <input type="text" name="prenomclient" required /></p>
    <p><label> Numéro Employe : </label> <input type="text" name="numemploye" required /></p>
    <p><label> Adresse : </label> <input type="text" name="adresseclient" required /></p><p><label> Mail : </label> <input type="email" name="mailclient" required /></p>
    <p><label> Numéro de téléphone : </label> <input type="tel" name="numtel" required /></p><p><label> Situation : </label> <input type="text" name="situationclient" required /></p>
    <p><label> Profession : </label><input type="text" name="professionclient" required /></p><p><label> Date de Naissance : </label> <input type="date" name="datenaiss" required /></p>
    <div class="boutton_submit"><p><input  type="submit" value="Valider" name="valider_inscription"/><input type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';
    require_once('gabarit/gabaritConseiller.php');
}

function afficherInterfaceVendreContrat()
{ // dans conseiller, interface pour vendre un contrat
    $contenueNom = '<h2> Bonjour </h2>';

    $planning = '';
    $contenuConseiller2 = '<fieldset><legend>Vendre un Contrat </legend><form id="Conseiller" action="Projet.php" method="post"><p><label>Numéro du Client : </label><input type="text" name="num_client"></p>
<p><label>Nom Contrat : </label><input type="text" name="nomcontrat"></p>
<p><label>Tarif Mensuel : </label><input type="text" name="tarif_mensuel"></p><div class="boutton_submit"><p><input  type="submit" value="Valider" name="valider_contrat"/><input type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';
    require_once('gabarit/gabaritConseiller.php');
}

function afficherInterfaceOuvrirCompte()
{ // dans conseiller, Interface ouvrir un compte
    $contenueNom = '<h2> Bonjour </h2>';

    $planning = '';
    $contenuConseiller2 = '<fieldset><legend>Ouvrir Compte </legend><form id="Conseiller" action="Projet.php" method="post"><p><label>Numéro du client : </label><input type="text" name="num_client"></p>
<p><label>Nom du compte : </label><input type="text" name="nomcompte"></p>
<p><label>Solde : </label><input type="text" name="solde"></p><p><label>Montant du découvert : </label><input type="text" name="montant_decouvert"></p>
<div class="boutton_submit"><p><input  type="submit" value="Valider" name="valider_compte"/><input type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';
    require_once('gabarit/gabaritConseiller.php');
}

function afficherInterfaceDecouvert()
{ // dans conseiller, interface pour modifier le decouvert
    $contenueNom = '<h2> Bonjour </h2>';

    $planning = '';
    $contenuConseiller2 = '<fieldset><legend>Modification Montant du découvert </legend><form id="Conseiller" action="Projet.php" method="post"><p><label>Numéro du client : </label><input type="text" name="num_client"></p>
<p><label>Nom du compte : </label><input type="text" name="nomcompte"></p><p><label>Nouveau montant du découvert : </label><input type="text" name="nouveau_montant"></p>
<p><div class="boutton_submit"><p><input  type="submit" value="Valider" name="valider_modification_decouvert"/><input type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';
    require_once('gabarit/gabaritConseiller.php');
}

function afficherInterfaceResilier()
{ // dans conseiller, interface pour resilier un compte/contrat
    $contenueNom = '<h2> Bonjour </h2>';

    $planning = '';
    $contenuConseiller2 = '';
    $contenuConseiller2 .= '<fieldset><legend>Resilier Compte </legend><form id="Conseiller" action="Projet.php" method="post"><p><label>Numéro du client : </label><input type="text" name="num_client"></p>
<p><label>Nom du compte : </label><input type="text" name="nomcompte"></p><div class="boutton_submit"><p><input  type="submit" value="Valider" name="valider_resilier_compte"/><input type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';

    $contenuConseiller2 .= '<fieldset><legend>Resilier Contrat </legend><form id="Conseiller" action="Projet.php" method="post"><p><label>Numéro du client : </label><input type="text" name="num_client"></p>
<p><label>Nom du contrat : </label><input type="text" name="nomcontrat"></p><div class="boutton_submit"><p><input  type="submit" value="Valider" name="valider_resilier_contrat"/><input type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';

    require_once('gabarit/gabaritConseiller.php');
}
function ModificationPhraseC()
{
    $contenueNom = '<h2> Bonjour </h2>';

    $planning = '';
    $modificationAgent = '';
    $modificationAgent .= '<fieldset><h4>La Modification a été effectué</h4></fieldset>';
    require_once('gabarit/gabaritConseiller.php');
    echo $modificationAgent;
}
