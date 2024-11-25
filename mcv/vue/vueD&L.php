<?php
class directeurException extends Exception
{
  public function getMsg()
  {
    $contenueNom = '';
    $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
    $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
    $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
    $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';
    $msg = '';
    require_once('gabarit/gabaritDirecteur.php');
    $msg .= '<fieldset><div class="erreur"><p>' . $this->getMessage() . '</p></div></fieldset><p>';
    echo $msg;
  }
}
//vue Login Directeur

function AfficheLogin()
{ //affiche la page des logins
  $contenu = '';
  require_once('gabarit/gabaritAccueil.php');
}
function AfficheDirecteur($employe)
{ //affiche la page du directeur
  $contenueNom = '<h2> Bonjour ' . $employe . '</h2>';
  $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
  $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';
  require_once('gabarit/gabaritDirecteur.php');
}
function AfficherEmploye($employe)
{
  $contenueNom = '';
  $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  $contenuDir1 = '<form id="FormEmploye" action="Projet.php" method="post">';
  $contenuDir1 .= '<table>';
  $contenuDir1 .= '<tr><th class="titre" colspan="5">Liste des EMPLOYE</th></tr>';
  $contenuDir1 .= '<tr><th>Numero</th><th>NOM</th><th>Login</th><th>Mot de passe</th><th>Poste</th></tr>';
  foreach ($employe as $ligne) {
    $contenuDir1 .= '<tr>';
    $contenuDir1 .= '<td> <input type="checkbox" name="' . $ligne->NUMEMPLOYE . '"> ' . $ligne->NUMEMPLOYE . '</td>';
    $contenuDir1 .= '<td> <input type="text" name="nomEmp" readonly value="' . $ligne->NOM . '"/>' . '</td>';
    $contenuDir1 .= '<td> <input type="text" name="loginEmp" readonly value="' . $ligne->LOGIN . '"/>' . '</td>';
    $contenuDir1 .= '<td> <input type="password" name="mdpEmp" readonly value="' . $ligne->MOTDEPASSE . '"/>' . '</td>';
    $contenuDir1 .= '<td> <select name="catEmp" id="cat-select">' . '<option value="">' . $ligne->CATEGORIE . '</option></select>';
    $contenuDir1 .= '</tr>';
  }
  $contenuDir1 .= '</table>';
  $contenuDir1 .= '<p><input type="submit" value="Ajouter" name="ajouter1"/><input type="submit" value="Supprimer" name="supprimer"/><input type="submit" value="Modifier" name="modifie"/></p>';
  $contenuDir1 .= '</form>';
  require_once('gabarit/gabaritDirecteur.php');
}

function AfficherAdj()
{
  $contenueNom = '';
  $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  $contenuDir1 = '<form action="Projet.php" method="POST">
    <fieldset>
      <legend>Ajouter Employe</legend>
      <p>
        <label for="nom">Nom</label>
        <input type="text" name="nom" size="15" maxlength="20" />
      </p>
      <p>
        <label for="login">Login</label>
        <input type="text" name="login" size="15" maxlength="20" />
      </p>
      <p>
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp">
      </p>
      <p>
        <label for="num">Poste</label>
        <select name="cat" id="cat-select"> <option value=" ">-----</option>
        <option value="Directeur">Directeur</option>
        <option value="Agent">Agent</option>
        <option value="Conseiller">Conseiller</option>
        </select>
      </p>';

  $contenuDir1 .= ' <input type="submit" name="ajouter2" value="Ajouter Client">
      <input type="reset" name="effacer" value="tout effacer">
      <input type="submit" name="restE" value="<--">
    </fieldset>';
  $contenuDir1 .= '</form>';
  require_once('gabarit/gabaritDirecteur.php');
}
function AfficherModif($employe)
{
  $contenueNom = '';
  $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  $contenuDir1 = '<form action="Projet.php" method="POST">
  <fieldset>
    <legend>Modifier Employe ' . $employe->NUMEMPLOYE . '</legend>
    <p>
      <label for="key">ID</label>
      <input type="text" name="key" readonly value="' . $employe->NUMEMPLOYE . '" />
    </p>
    <p>
      <label for="nom">Nom</label>
      <input type="text" name="nom" size="15" maxlength="20" value="' . $employe->NOM . '" />
    </p>
    <p>
      <label for="login">Login</label>
      <input type="text" name="login" size="15" maxlength="20" value="' . $employe->LOGIN . '"/>
    </p>
    <p>
      <label for="mdp">Mot de passe</label>
      <input type="password" name="mdp" value="' . $employe->MOTDEPASSE . '">
    </p>
    <p>
      <label for="num">Poste</label>
      <select name="cat" id="cat-select"> <option value="' . $employe->CATEGORIE . '">' . $employe->CATEGORIE . '</option>
      <option value="Directeur">Directeur</option>
      <option value="Agent">Agent</option>
      <option value="Conseiller">Conseiller</option>
      </select>
    </p>';

  $contenuDir1 .= ' <input type="submit" name="modifie2" value="Modifier">
    <input type="submit" name="restE" value="<--">
  </fieldset>';
  $contenuDir1 .= '</form>';
  require_once('gabarit/gabaritDirecteur.php');
}
function AfficherContrat($employe)
{
  $contenueNom = '';
  $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  $contenuDir2 = '<form id="FormContract" action="Projet.php" method="post">';
  $contenuDir2 .= '<table>';
  $contenuDir2 .= '<tr><th class="titre" colspan="2">Liste des Contract</th></tr>';
  foreach ($employe as $ligne) {
    $contenuDir2 .= '<tr>';
    $contenuDir2 .= '<td> <input type="checkbox" name="nomC[]" value="' . $ligne->NOMCONTRAT . '"></td>';
    $contenuDir2 .= '<td> <input type="text" name="nom" readonly value="' . $ligne->NOMCONTRAT . '"/>' . '</td>';
    $contenuDir2 .= '</tr>';
  }
  $contenuDir2 .= '</table>';
  $contenuDir2 .= '<p><input type="submit" value="Ajouter" name="ajouterC1"/><input type="submit" value="Supprimer" name="supprimerC"/><input type="submit" value="Modifier" name="modifieC"/></p>';
  $contenuDir2 .= '</form>';
  require_once('gabarit/gabaritDirecteur.php');
}
function AfficherAdjContrat()
{
  $contenueNom = '';
  $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  $contenuDir2 = '<form action="Projet.php" method="POST">
    <fieldset>
      <legend>Ajouter Un Contrat</legend>
      <p>
        <label for="nom">Nom</label>
        <input type="text" name="nom" size="15" maxlength="20" />
      </p>';
  $contenuDir2 .= ' <input type="submit" name="ajouterC2" value="Ajouter Contrat">
      <input type="reset" name="effacer" value="tout effacer">
      <input type="submit" name="restC" value="<--">
    </fieldset>';
  $contenuDir1 .= '</form>';
  require_once('gabarit/gabaritDirecteur.php');
}
function AfficherModifContrat($key)
{
  $contenueNom = '';
  $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  $contenuDir2 = '<form action="Projet.php" method="POST">
    <fieldset>
      <legend>Modifier Contrat</legend>
      <p>
        <label for="nom">Ancien Nom</label>
        <input type="text" name="nom" size="15" maxlength="20" readonly value="' . $key . '" />
      </p>
      <p>
        <label for="nom">Nouveau Nom</label>
        <input type="text" name="newname" size="15" maxlength="20"" />
      </p>';
  $contenuDir2 .= ' <input type="submit" name="modifieC2" value="Modifier">
      <input type="submit" name="restC" value="<--">
    </fieldset>';
  $contenuDir1 .= '</form>';
  require_once('gabarit/gabaritDirecteur.php');
}
function afficherErreur($erreur)
{ //pour gerer les erreurs 
  $contenu = '<p>' . $erreur . '</p>';
  require_once('gabarit/gabaritAccueil.php');
}
function  AfficherInterfaceListePiece($motif)
{ // dans directeur, interface qui crée/modif/suppr un motif ou des pièces
  $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
  $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  $contenuDir3 = '';
  $contenuDir3 = '<form id="FormContract" action="Projet.php" method="post">';
  $contenuDir3 .= '<table>';
  $contenuDir3 .= '<tr><th class="titre" colspan="3">Liste des Motif</th></tr>';
  $contenuDir3 .= '<tr><th>ID</th><th>Libeller</th><th>Liste des pieces</th></tr>';
  foreach ($motif as $ligne) {
    $contenuDir3 .= '<tr>';
    $contenuDir3 .= '<td> <input type="number" name="nomC" readonly  value="' . $ligne->IDMOTIF . '"/></td>';
    $contenuDir3 .= '<td> <input type="text" name="libelleMotif" readonly value="' . $ligne->LIBELLEMOTIF . '"/>' . '</td>';
    $contenuDir3 .= '<td> <input type="text" name="Liste_piece" readonly value="' . $ligne->LISTEPIECES . '"/>' . '</td>';
    $contenuDir3 .= '</tr>';
  }
  $contenuDir3 .= '</table>';
  $contenuDir3 .= '<p><input type="submit" value="Crée motif" name="adjMotif"/>';
  $contenuDir3 .= '<input type="submit" value="Modifier libeller motif" name="ModifMotif"/>';
  $contenuDir3 .= '<input type="submit" value="Modification liste des pieces" name="Modif2Motif"/>';
  $contenuDir3 .= '<input type="submit" value="Supprimer motif" name="SupprMotif"/></p>';
  $contenuDir3 .= '</form>';
  require_once('gabarit/gabaritDirecteur.php');
  require_once('gabarit/gabaritDirecteur.php');
}

function AfficheradjMotif()
{
  $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
  $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  $contenuDir3 = '';
  $contenuDir3 .= '<fieldset><legend>Crée motif</legend><form id="Directeur" action="Projet.php" method="post" ><p><label>Libelle du motif : </label><input type="text" name="cree_libelle"/></p>
<p><label> liste des pieces : </label><textarea name="cree_liste_de_piece" cols="30" rows="2"></textarea></p>
<div class="boutton_submit"><p><input type="submit" value="Ajouter" name="cree_motif"/><input  type="reset" value="Effacer" name="effacer"/><input type="submit" value="<--" name="restL"/></p></div></form></fieldset>';
  require_once('gabarit/gabaritDirecteur.php');
}
function AfficherModifMotif()
{
  $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
  $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  $contenuDir3 = '';
  $contenuDir3 .= '<fieldset><legend>Modifier libeller motif</legend><form id="Directeur" action="Projet.php" method="post" >
<p><label>Id du motif: </label><input type="text" name="id_motif"></p>
<p><label>Nouveau libelle du motif : </label><input type="text" name="nv_libelle"></p>
<div class="boutton_submit"><p><input type="submit" value="Modifier " name="modif_libeller"/><input  type="reset" value="Effacer" name="effacer"/><input type="submit" value="<--" name="restL"/></p></div></form></fieldset>';
  require_once('gabarit/gabaritDirecteur.php');
}
function AfficherSupprMotif()
{
  $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
  $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  $contenuDir3 = '';
  $contenuDir3 .= '<fieldset><legend>Supprimer motif</legend><form id="Directeur" action="Projet.php" method="post" ><p><label>Id du motif : </label><input type="text" name="suppr_motif"/></p>
<div class="boutton_submit"><p><input type="submit" value="Supprimer " name="supprimer_motif"/><input  type="reset" value="Effacer" name="effacer"/><input type="submit" value="<--" name="restL"/></p></div></form></fieldset>';
  require_once('gabarit/gabaritDirecteur.php');
}
function AfficherModif2Motif()
{
  $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
  $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  $contenuDir3 = '';
  $contenuDir3 .= '<fieldset><legend>Modification liste des pieces</legend><form id="Directeur" action="Projet.php" method="post" >
<p><label>Id Motif : </label><input type="text" name="id_motif"/></p>
<p><label>Nouvelle liste des pieces : </label><textarea name="modif_liste_de_piece" cols="30" rows="2"></textarea></p>
<div class="boutton_submit"><p><input type="submit" value="Modifier" name="modif_piece"/> <input  type="reset" value="Effacer" name="effacer"/><input type="submit" value="<--" name="restL"/></p></div></form></fieldset>';
  require_once('gabarit/gabaritDirecteur.php');
}

function ModificationPhraseDirecteur()
{
  $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
  $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  $modificationDirecteur = '';
  $modificationDirecteur .= '<fieldset><h4>La Modification a été effectué</h4></fieldset>';
  require_once('gabarit/gabaritDirecteur.php');
  echo $modificationDirecteur;
}

function SupprimerphraseDireteur()
{
  $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
  $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  $supprimerDirecteur = '';
  $supprimerDirecteur .= '<fieldset><h4>Motif Supprimer</h4></fieldset>';
  require_once('gabarit/gabaritDirecteur.php');
  echo $supprimerDirecteur;
}
function AfficherInterfaceSatistique()
{ // dans directeur, interface pour voir les stas(rdv,contrat,solde...)
  $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
  $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  $contenuDir4 = '';
  $contenuDir4 .= '<fieldset><legend>Nombre de rdv entre 2 dates</legend><form id="Directeur" action="Projet.php" method="post" ><p><label>Date début : </label><input type="date" name="date_debut"/></p>
<p><label>Date fin : </label><input  type="date" name="date_fin"/></p>
<div class="boutton_submit"><p><input type="submit" value="Afficher le nombre de rdv " name="afficher_nombre_rdv"/> <input  type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';

  $contenuDir4 .= '<fieldset><legend>Nombre de contrat souscris entre 2 dates </legend><form id="Directeur" action="Projet.php" method="post" ><p><label>Date début : </label><input type="date" name="date_debut_contrat"/></p>
<p><label>Date fin : </label><input  type="date" name="date_fin_contrat"/></p>
<div class="boutton_submit"><p><input type="submit" value="Afficher le nombre de contrat " name="afficher_nombre_contrat"/> <input  type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';

  $contenuDir4 .= '<fieldset><legend>Nombre total de client</legend><form id="Directeur" action="Projet.php" method="post" ><p><label>Total client à une date:  </label><input type="date" name="total"/></p>
<div class="boutton_submit"><p><input type="submit" value="Afficher total " name="afficher_total"/> <input  type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';

  $contenuDir4 .= '<fieldset><legend>Solde total</legend><form id="Directeur" action="Projet.php" method="post" ><p><label>Solde Total à une date :  </label><input type="date" name="date_total_solde"/></p>
<div class="boutton_submit"><p><input type="submit" value="Afficher total solde " name="afficher_total_solde"/> <input  type="reset" value="Effacer" name="effacer"/></p></div></form></fieldset>';

  require_once('gabarit/gabaritDirecteur.php');
}

function afficherNbRdv($nombrerdv)
{
  $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
  $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  foreach ($nombrerdv as $ligne) {
    $contenuDir4 .= '<fieldset><h4>Le Nombre de rdv pris  entre les 2 dates indiqué est de ' . $ligne . '</h4></fieldset>';
  }
  require_once('gabarit/gabaritDirecteur.php');
}

function  afficherNbContrat($nbcontrat)
{
  $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
  $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  foreach ($nbcontrat as $ligne) {
    $contenuDir4 .= '<fieldset><h4>Le Nombre de contrat souscris entre les 2 dates indiqué est de ' . $ligne . '</h4></fieldset>';
  }
  require_once('gabarit/gabaritDirecteur.php');
}

function afficherNbClient($nbclient)
{
  $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
  $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  foreach ($nbclient as $ligne) {
    $contenuDir4 .= '<fieldset><h4>Le Nombre de client possédant soit compte ou un contrat à la date indiquée ou antérieur est de ' . $ligne . '</h4></fieldset>';
  }
  require_once('gabarit/gabaritDirecteur.php');
}

function afficherSoldeTotal($total)
{
  $contenuDir1 = '<p><input type="submit" value="Afficher liste Employe" name="afficher" /></p>';
  $contenuDir2 = '<p><input type="submit" value="Afficher liste Contract" name="afficher2" /></p>';
  $contenuDir3 = '<p><input type="submit" value="Afficher liste Motif" name="afficher3" /></p>';
  $contenuDir4 = '<p><input type="submit" value="Afficher Statistique de la banque" name="afficher4" /></p>';

  if ($total->STTC != 0) {
    $contenuDir4 .= '<fieldset><h4>Le Solde total selon la date indiqué est de ' . $total->STTC . ' euros</h4></fieldset>';
  } else {
    $contenuDir4 .= '<fieldset><h4>Le Solde total selon la date indiqué est de 0 euros</h4></fieldset>';
  }
  require_once('gabarit/gabaritDirecteur.php');
}
