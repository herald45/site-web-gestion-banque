<?php
class agentException extends Exception
{
    public function getMsg()
    {
        $contenuAgent1 = '<p><input type="submit" value="Afficher Information Client" name="info"></p>';
        $contenuAgent2 = '<p><input type="submit" value=" Synthèse Client" name="synthese"></p>';
        $contenuAgent3 = '<p><input type="submit" value="Depôt ou Retrait" name="depot_retrait"></p>';
        $contenuAgent4 = '<p><input type="submit" value="Rendez-vous" name="rdv"></p>';
        $msg = '';
        require_once('gabarit/gabaritAgents.php');
        $msg .= '<fieldset><div class="erreur"> <p>' . $this->getMessage() . '</p></div></fieldset><p>';
        echo $msg;
    }
}

// vue agant 

function AfficheAgent($employe)
{ //affiche la page du Angent
    $contenueNom = '<h2> Bonjour ' . $employe . '</h2>';
    $contenuAgent1 = '<p><input type="submit" value="Afficher Information Client" name="info"></p>';
    $contenuAgent2 = '<p><input type="submit" value=" Synthèse Client" name="synthese"></p>';
    $contenuAgent3 = '<p><input type="submit" value="Faire Un Depôt ou un Retrait" name="depot_retrait"></p>';
    $contenuAgent4 = '<p><input type="submit" value="Rendez-vous" name="rdv"></p>';
    require_once('gabarit/gabaritAgents.php');
}
function afficherinfo()
{ // partie Info client/recup du num client
    $contenuAgent1 = '<p><input type="submit" value="Afficher Information Client" name="info"></p>';
    $contenuAgent2 = '<p><input type="submit" value=" Synthèse Client" name="synthese"></p>';
    $contenuAgent3 = '<p><input type="submit" value="Depôt ou Retrait" name="depot_retrait"></p>';
    $contenuAgent4 = '<p><input type="submit" value="Rendez-vous" name="rdv"></p>';

    $contenuAgent1 = '';

    $contenuAgent1 .= '<fieldset><legend>Information </legend> <form id="r" action="Projet.php" method="post"><p><label> Identifiant client : </label> <input type="text" name="infocli" required/></p>
       <div class="boutton_submit"> <p><input type="submit" value="Valider" name="infoclient"><input type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';

    $contenuAgent1 .= '<fieldset><legend>Récuperer le numéro client</legend><form id="Agent" action="Projet.php" method="post" <p><label>Nom : </label><input type="text" name="nom_client"/></p>
    <p><label>Date de naissance : </label><input type="date" name="date_naiss"/></p><div class="boutton_submit"><p><input type="submit" value="Valider" name="recuperer"><input type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';

    require_once('gabarit/gabaritAgents.php');
}

function afficherSynthese()
{ //partie synthese
    $contenuAgent1 = '<p><input type="submit" value="Afficher Information Client" name="info"></p>';
    $contenuAgent2 = '<p><input type="submit" value=" Synthèse Client" name="synthese"></p>';
    $contenuAgent3 = '<p><input type="submit" value="Depôt ou Retrait" name="depot_retrait"></p>';
    $contenuAgent4 = '<p><input type="submit" value="Rendez-vous" name="rdv"></p>';

    $contenuAgent2 = '';


    $contenuAgent2 = '<fieldset><legend> Synthèse Client </legend><form id="r" action="Projet.php" method="post"><p><label> Identifiant Client : </label><input type="text" name="idsynthese" required/></p>
        <div class="boutton_submit"><p><input type="submit" value="Synthèse Client" name="synthese_client"/><input type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';


    require_once('gabarit/gabaritAgents.php');
}

function afficherDepotRetrait()
{ // partie Depot/Retrait
    $contenuAgent1 = '<p><input type="submit" value="Afficher Information Client" name="info"></p>';
    $contenuAgent2 = '<p><input type="submit" value=" Synthèse Client" name="synthese"></p>';
    $contenuAgent3 = '<p><input type="submit" value="Depôt ou Retrait" name="depot_retrait"></p>';
    $contenuAgent4 = '<p><input type="submit" value="Rendez-vous" name="rdv"></p>';

    $contenuAgent3 = '';

    $contenuAgent3 .= '<fieldset><legend> Depôt </legend><form id="r" action="Projet.php" method="post"><p><label> Identifiant Client : </label><input type="text" name="identifiant_depot" required/></p>
        <p><label> Somme du depot : </label><input type="text" name="depot" required/></p><p><label> Compte : </label><input type="text" name="compte_depot" required /></p>
     <div class="boutton_submit">   <p><input type="submit" value="Valider" name="valider_depot"/><input type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';


    $contenuAgent3 .= '<fieldset><legend> Retrait </legend><form id="r" action="Projet.php" method="post"><p><label> Identifiant Client : </label><input type="text" name="identifiant_retrait" required/></p>
        <p><label> Somme du retrait : </label><input type="text" name="retrait" required/></p><p><label> Compte : </label><input type="text" name="compte_retrait" required/></p>
    <div class="boutton_submit"><p><input  type="submit" value="Valider" name="valider_retrait"/><input type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';

    require_once('gabarit/gabaritAgents.php');
}

function afficherRDV()
{ // partie rdv

    $contenuAgent1 = '<p><input type="submit" value="Afficher Information Client" name="info"></p>';
    $contenuAgent2 = '<p><input type="submit" value=" Synthèse Client" name="synthese"></p>';
    $contenuAgent3 = '<p><input type="submit" value="Depôt ou Retrait" name="depot_retrait"></p>';
    $contenuAgent4 = '<p><input type="submit" value="Rendez-vous" name="rdv"></p>';

    $contenuAgent4 = '<fieldset>
        <legend> Rendez-vous </legend><form id="rdv" action="Projet.php" method="post"><p><label> Identifiant du conseiller chargé client: </label> <input type="text" name="idcharge"/></p><div class="boutton_submit"><p><input type="submit" value="Valider" name="rdv_rdv"/>
            <input type="reset" value="Effacer" name="effacer"/></p></div></fieldset>';
    require_once('gabarit/gabaritAgents.php');
}
function afficherInformationClient($identite)
{ // afficher les infos du client
    $contenuAgent1 = '<p><input type="submit" value="Afficher Information Client" name="info"></p>';
    $contenuAgent2 = '<p><input type="submit" value=" Synthèse Client" name="synthese"></p>';
    $contenuAgent3 = '<p><input type="submit" value="Depôt ou Retrait" name="depot_retrait"></p>';
    $contenuAgent4 = '<p><input type="submit" value="Rendez-vous" name="rdv"></p>';

    $contenuAgent1 = '';
    foreach ($identite as $ligne) {
        $contenuAgent1 .= '<fieldset><legend>Information du Client</legend><form name="formu" action="Projet.php" method="post"><p><label>Nom : </label><input type="text" name="nomcli" value="' . $ligne->NOM . '"readonly="readonly"/></p>
                        <p><label>Prenom : </label><input type="text" name="prenomcli" value="' . $ligne->PRENOM . '"readonly="readonly"/></p><p><label>Numero client : </label><input type="text" name="numcli" value="' . $ligne->NUMCLIENT . '"readonly="readonly"/></p>
                        <p><label>Numero conseiller : </label><input type="text" name="nomemp" value="' . $ligne->NUMEMPLOYE . '"readonly="readonly"/></p><p><label>Adresse : </label><input type="text" name="adresse" value="' . $ligne->ADRESSE . '"/></p>
                        <p><label>Date de naissance : </label><input type="text" name="datenaiss" value="' . $ligne->DATE_NAISS . '"readonly="readonly"/></p>
                        <p><label>Numero tel : </label><input type="tel" name="numtel" value="' . $ligne->NUMTEL . '" pattern="[0]{1}[0-9]{9}" required/></p>
                        <p><label>Profession : </label><input type="text" name="profession" value="' . $ligne->PROFESSION . '"/></p>
                        <p><label>Mail : </label><input type="email" name="mail" value="' . $ligne->MAIL . ' "pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"" required/></p>
                        <p><label>Situation : </label><input type="text" name="situation" value="' . $ligne->SITUATION . '"required/></p>
                        <div class="boutton_submit"><p><input type="submit" value="Modifier" name="modif_info"/> <input type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';
        require_once('gabarit/gabaritAgents.php');
    }
}

function afficherSyntheseTotal($syntheseIdentite, $syntheseCompte, $syntheseContrat)
{ // affiche la synthese TOTAL du client
    $contenuAgent1 = '<p><input type="submit" value="Afficher Information Client" name="info"></p>';
    $contenuAgent2 = '<p><input type="submit" value=" Synthèse Client" name="synthese"></p>';
    $contenuAgent3 = '<p><input type="submit" value="Depôt ou Retrait" name="depot_retrait"></p>';
    $contenuAgent4 = '<p><input type="submit" value="Rendez-vous" name="rdv"></p>';

    $contenuAgent2 = '';
    foreach ($syntheseIdentite as $ligne) { // synthese des infos perso (nom,prenom...)
        $contenuAgent2 .= '<fieldset><legend>Synthèse du Client</legend><p><label>Nom : </label><input type="text" name="synthesecli" value="' . $ligne->NOM . '"readonly="readonly"/></p>
                        <p><label>Prenom : </label><input type="text" name="synthesecli" value="' . $ligne->PRENOM . '"readonly="readonly"/></p><p><label>Numero client : </label><input type="text" name="synthesecli" value="' . $ligne->NUMCLIENT . '"readonly="readonly"/></p>
                        <p><label>Numero conseiller : </label><input type="text" name="synthesecli" value="' . $ligne->NUMEMPLOYE . '"readonly="readonly"/></p><p><label>Adresse : </label><input type="text" name="synthesecli" value="' . $ligne->ADRESSE . '"readonly="readonly"/></p>
                        <p><label>Date de naissance : </label><input type="text" name="synthesecli" value="' . $ligne->DATE_NAISS . '"readonly="readonly"/></p>
                        <p><label>Numero tel : </label><input type="tel" name="synthesecli" value="' . $ligne->NUMTEL . '" pattern="[0]{1}[0-9]{9}"readonly="readonly"/></p>
                        <p><label>Profession : </label><input type="text" name="synthesecli" value="' . $ligne->PROFESSION . '"readonly="readonly"/></p>
                        <p><label>Mail : </label><input type="email" name="synthesecli" value="' . $ligne->MAIL . '"pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"readonly="readonly"/></p>
                        <p><label>Situation : </label><input type="text" name="synthesecli" value="' . $ligne->SITUATION . '"readonly="readonly"/></p>';
    }
    foreach ($syntheseCompte as $ligne) { // synthese des comptes du client
        $contenuAgent2 .= '<p><label>Nom du compte : </label><input type="text" name="synthesecli" value="' . $ligne->NOMCOMPTE . '"readonly="readonly"/></p>
                        <p><label>Date Ouverture du compte : </label><input type="text" name="synthesecli" value="' . $ligne->DATEOUVERTURE . '"readonly="readonly"/></p>
                         <p><label>Solde : </label><input type="text" name="synthesecli" value="' . $ligne->SOLDE . '"readonly="readonly"/></p>
                         <p><label>Montant du découvert : </label><input type="text" name="synthesecli" value="' . $ligne->MONTANTDECOUVERT . '"readonly="readonly"/></p>';
    }
    foreach ($syntheseContrat as $ligne) { // synthese des contrats du client
        $contenuAgent2 .= '<p><label>Nom du contrat : </label><input type="text" name="synthesecli" value="' . $ligne->NOMCONTRAT . '"readonly="readonly"/></p>
                        <p><label>Date Ouverture du contrat : </label><input type="text" name="synthesecli" value="' . $ligne->DATEOUVERTURECONTRAT . '"readonly="readonly"/></p>
                         <p><label>Tarif Mensuel : </label><input type="text" name="synthesecli" value="' . $ligne->TARIFMENSUEL . '"readonly="readonly"/></p></fieldset>';
    }
    require_once('gabarit/gabaritAgents.php');
}
function AfficherNumCli($client)
{ // dans client, afficher num client
    $contenuAgent1 = '<p><input type="submit" value="Afficher Information Client" name="info"></p>';
    $contenuAgent2 = '<p><input type="submit" value=" Synthèse Client" name="synthese"></p>';
    $contenuAgent3 = '<p><input type="submit" value="Depôt ou Retrait" name="depot_retrait"></p>';
    $contenuAgent4 = '<p><input type="submit" value="Rendez-vous" name="rdv"></p>';

    foreach ($client as $ligne) {
        $contenuAgent1 .= '<fieldset><p>Le numéro du client est ' . $ligne->NUMCLIENT . '</p></fieldset>';
        require_once('gabarit/gabaritAgents.php');
    }
}
function ModificationPhrase()
{
    $contenuAgent1 = '<p><input type="submit" value="Afficher Information Client" name="info"></p>';
    $contenuAgent2 = '<p><input type="submit" value=" Synthèse Client" name="synthese"></p>';
    $contenuAgent3 = '<p><input type="submit" value="Depôt ou Retrait" name="depot_retrait"></p>';
    $contenuAgent4 = '<p><input type="submit" value="Rendez-vous" name="rdv"></p>';

    $modificationAgent = '';
    $modificationAgent .= '<fieldset><h4>La Modification a été effectué</h4></fieldset>';
    require_once('gabarit/gabaritAgents.php');
    echo $modificationAgent;
}
function PrendreRdv($vue)
{
    $contenuAgent1 = '<p><input type="submit" value="Afficher Information Client" name="info"></p>';
    $contenuAgent2 = '<p><input type="submit" value=" Synthèse Client" name="synthese"></p>';
    $contenuAgent3 = '<p><input type="submit" value="Depôt ou Retrait" name="depot_retrait"></p>';
    $contenuAgent4 = '<p><input type="submit" value="Rendez-vous" name="rdv"></p>';

    $contenuAgent = '';

    foreach ($vue as $ligne) {
        $return[$ligne->IDMOTIF] = "$ligne->LISTEPIECES";
    }

    $data = json_encode($return);

    $contenuAgent .= '<script type="text/javascript"> 
	function show_liste(str){
		var text = ' . $data . ';
		document.getElementById("liste").innerHTML = "<p>Voici la liste des pièces requises : "+text[str]+"</p>";
	}
	</script>';

    $contenuAgent .= '<fieldset><legend>Prendre rdv</legend><form id="Agent" action="Projet.php"  method="post"><p><label>Numéro du client : </label><input  type="text" name="numclient"></p>
<p><label>Id du chargé : </label><input type="text" name="id_charge"></p><p>
<label>Date du rdv: </label><input type="datetime-local" value="yyyy-MM-ddThh:mm" name="date_rdv"></p>
<p><label>Le motif : </label><select name="motif" onChange="show_liste(this.value)">
<option value="" selected>Choisissez un motif</option>';

    foreach ($vue as $ligne) {
        $contenuAgent .= '<option value="' . $ligne->IDMOTIF . '">' . $ligne->LIBELLEMOTIF . '</option>';
    }

    $contenuAgent .= '</select>';

    $contenuAgent .= '</p><div class="boutton_submit"><p><input type="submit"  name="ajouter_rdv" value="Ajouter"> <input type="reset" value="Effacer"></p></div></form></fieldset>';

    $contenuAgent .= '<div id="liste"></div>';

    require_once('gabarit/gabaritAgents.php');
    echo $contenuAgent;
}

function AfficherPlanning($id, $rdv)
{ // dans agent, afficher le planning pour prendre rdv
    $contenuAgent1 = '<p><input type="submit" value="Afficher Information Client" name="info"></p>';
    $contenuAgent2 = '<p><input type="submit" value=" Synthèse Client" name="synthese"></p>';
    $contenuAgent3 = '<p><input type="submit" value="Depôt ou Retrait" name="depot_retrait"></p>';

    $contenuAgent = '';

    $jour = date("w") - 1; // numéro du jour actuel

    $nom_mois = date("F", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));
    $annee =  date("Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));
    $num_week = date("W", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));

    $dateDebSemaineFr = date("d/m/Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));
    $dateFinSemaineFr = date("d/m/Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 7, date("y")));

    $contenuAgent .= '<form id="agent" action="Projet.php" method="post"/> <div id="titreMois" align="center"><input type="hidden" value="' . $jour . '" name="ghost"/>
   <input type="submit" value="Semaine precedent" name="prec"> Semaine ' . $num_week . ' <input type="submit" value="Semaine suivante" name="next"><input type="hidden" value="' . $id . '" name="ghostrdv"/><br/>
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

    $contenuAgent .= '<br/>
<div id="titreMois" align="center">
    <h2>' . $nom_mois . ' ' . $annee . '</h2>
</div></form>';

    $contenuAgent .= '<table border="1" align="center">';

    // en tête de colonne
    $contenuAgent .= '<tr>';
    for ($k = 0; $k < 6; $k++) {
        if ($k == 0)
            $contenuAgent .= '<th>' . $jourTexte[$k] . '</th>';
        else
            $contenuAgent .= '<th><div>' . $jourTexte[$k] . ' ' . date("d", mktime(0, 0, 0, date("n"), date("d") - $jour + $k, date("y"))) . '</div></th>';
    }
    $contenuAgent .= '</tr>';

    $tour = 1;
    $size = count($rdv);

    // les 2 plages horaires : matin - midi
    for ($h = 9; $h < 20; $h++) {
        $contenuAgent .= '<tr>
        <th>
            <div>' . $plageH[$h] . '</div>
        </th>';

        // les infos pour chaque jour
        for ($j = 1; $j < 6; $j++) {
            for ($c = 0; $c < $size; $c++) {
                $RDV = date_parse($rdv[$c]->DATERDV);
                if ($RDV['hour'] ==  $h && $RDV['day'] == date("j", mktime(0, 0, 0, date("n"), date("d") - $jour + $j, date("y"))) && date("Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y"))) == $RDV['year'] && date("n", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y"))) == $RDV['month']) {
                    $contenuAgent .= '<td>Occupé</td>';
                    $tour = 0;
                }
            }
            if ($tour == 1) {
                $contenuAgent .= '<td></td>';
            }
            $tour = 1;
        }
        $contenuAgent .= '</td>
            </tr>';
    }
    $contenuAgent .= '</table>';
    require_once('gabarit/gabaritAgents.php');
    echo $contenuAgent;
}
function AfficherPlann($id, $rdv, $date)
{
    $contenuAgent1 = '<p><input type="submit" value="Afficher Information Client" name="info"></p>';
    $contenuAgent2 = '<p><input type="submit" value=" Synthèse Client" name="synthese"></p>';
    $contenuAgent3 = '<p><input type="submit" value="Depôt ou Retrait" name="depot_retrait"></p>';

    $contenurdv = '';

    $jour = $date; // numéro du jour actuel

    $nom_mois = date("F", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));
    $annee =  date("Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));
    $num_week = date("W", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));

    $dateDebSemaineFr = date("d/m/Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));
    $dateFinSemaineFr = date("d/m/Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 7, date("y")));

    $contenurdv .= '<form id="Agent" action="Projet.php" method="post"> <div id="titreMois" align="center"><input type="hidden" value="' . $jour . '" name="ghost" />
   <input type="submit" value="Semaine precedent" name="prec"> Semaine ' . $num_week . ' <input type="submit" value="Semaine suivante" name="next"><input type="hidden" value="' . $id . '" name="ghostrdv"/><br/>
    du ' . $dateDebSemaineFr . ' au ' . $dateFinSemaineFr . '
</form></div>';

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

    $contenurdv .= '<br/>
<div id="titreMois" align="center">
    <h2>' . $nom_mois . ' ' . $annee . '</h2>
</div></form>';

    $contenurdv .= '<table border="1" align="center">';

    // en tête de colonne
    $contenurdv .= '<tr>';
    for ($k = 0; $k < 6; $k++) {
        if ($k == 0)
            $contenurdv .= '<th>' . $jourTexte[$k] . '</th>';
        else
            $contenurdv .= '<th><div>' . $jourTexte[$k] . ' ' . date("d", mktime(0, 0, 0, date("n"), date("d") - $jour + $k, date("y"))) . '</div></th>';
    }
    $contenurdv .= '</tr>';

    $tour = 1;
    $size = count($rdv);

    // les 2 plages horaires : matin - midi
    for ($h = 9; $h < 20; $h++) {
        $contenurdv .= '<tr>
        <th>
            <div>' . $plageH[$h] . '</div>
        </th>';

        // les infos pour chaque jour
        for ($j = 1; $j < 6; $j++) {
            for ($c = 0; $c < $size; $c++) {
                $RDV = date_parse($rdv[$c]->DATERDV);
                if ($RDV['hour'] ==  $h && $RDV['day'] == date("j", mktime(0, 0, 0, date("n"), date("d") - $jour + $j, date("y"))) && date("Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y"))) == $RDV['year'] && date("n", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y"))) == $RDV['month']) {
                    $contenurdv .= '<td>Occupé</td>';
                    $tour = 0;
                }
            }
            if ($tour == 1) {
                $contenurdv .= '<td></td>';
            }
            $tour = 1;
        }
        $contenurdv .= '</td>
            </tr>';
    }

    $contenurdv .= '</table>';

    require_once('gabarit/gabaritAgents.php');
    echo $contenurdv;
}
