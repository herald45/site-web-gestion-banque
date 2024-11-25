<?php
require_once("connect.php");
function getConnect()
{
    $connexion = new PDO('mysql:host=' . SERVEUR . ';dbname=' . BDD, USER, PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->query('SET NAMES UTF8');
    return $connexion;
}
function checkUser($login, $mdp)
{ //check les logins pour la connexion et recupere la categorie associe aux login
    $connexion = getConnect();
    $requete = "SELECT CATEGORIE,NOM,NUMEMPLOYE from EMPLOYE where LOGIN='$login' and MOTDEPASSE='$mdp'";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $categorie = $resultat->fetch();
    $resultat->closeCursor();
    return $categorie;
}
function checkCompte($nom, $login, $mdp, $cat)
{
    $connexion = getConnect();
    $requete = "SELECT * FROM EMPLOYE where NOM='$nom' and LOGIN='$login' and MOTDEPASSE='$mdp' and CATEGORIE='$cat' ";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}
function getEmploye()
{ //recupere les infos des employe
    $connexion = getConnect();
    $requete = "select * from Employe";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $Employe = $resultat->fetchall();
    $resultat->closeCursor();
    return $Employe;
}
function getIDEmploye($key)
{ //recupere les infos des employe
    $connexion = getConnect();
    $requete = "SELECT * FROM EMPLOYE where NUMEMPLOYE=$key ";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $Employe = $resultat->fetch();
    $resultat->closeCursor();
    return $Employe;
}
function SuprimerEmploye($key)
{
    $connexion = getConnect();
    $requete = "DELETE FROM EMPLOYE where NUMEMPLOYE=$key ";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
function ajouterEmploye($nom, $login, $mdp, $cat)
{
    $connexion = getConnect();
    $requete = "INSERT INTO EMPLOYE VALUES(0,'$nom', '$login', '$mdp', '$cat')";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
function ModifierEmploye($nom, $login, $mdp, $cat, $key)
{
    $connexion = getConnect();
    $requete = "UPDATE `EMPLOYE` SET  NOM='$nom',LOGIN='$login',MOTDEPASSE='$mdp',CATEGORIE='$cat'WHERE `NUMEMPLOYE`=$key ";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
function getContrat()
{ //recupere les infos des contrat
    $connexion = getConnect();
    $requete = "select * from CONTRAT";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $Employe = $resultat->fetchall();
    $resultat->closeCursor();
    return $Employe;
}
function checkContrat($nom)
{
    $connexion = getConnect();
    $requete = "SELECT * FROM CONTRAT where NOMCONTRAT='$nom'";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}
function AjouterContrat($nom)
{
    $connexion = getConnect();
    $requete = "INSERT INTO CONTRAT VALUES('$nom')";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
function SuprimerContrat($key)
{
    $connexion = getConnect();
    $requete = "DELETE FROM CONTRAT where NOMCONTRAT='$key' ";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
function ModifierContrat($ancien, $nouveau)
{
    $connexion = getConnect();
    $requete = "UPDATE CONTRAT SET  NOMCONTRAT='$nouveau' WHERE `NOMCONTRAT`='$ancien' ";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
// crée un motif pour un rdv avec la liste des pieces à avoir
function creemotif($nommotif, $listepiece)
{
    $connexion = getConnect();
    $requete = "INSERT INTO MOTIF VALUES(0,'$nommotif','$listepiece')";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
// modifie le libellé du motif à partir de l'id du motif
function modifLibeller($idmotif, $libeller)
{
    $connexion = getConnect();
    $requete = "Update motif set LIBELLEMOTIF='$libeller' where IDMOTIF = '$idmotif' ";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
// supprime un motif
function supprimerMotif($idmotif)
{
    $connexion = getConnect();
    $requete = "delete from motif where IDMOTIF = '$idmotif' ";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
// modifie la liste des pièces à fournir à partir de l'id du motif
function modiflistepieces($idmotif, $nvlistepieces)
{
    $connexion = getConnect();
    $requete = "Update motif set LISTEPIECES='$nvlistepieces' where IDMOTIF = '$idmotif' ";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
// verifie si le libellé existe 
function checkLibeller($libeller)
{
    $connexion = getConnect();
    $requete = "select * from motif where LIBELLEMOTIF='$libeller'";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}
// verifie si le id du motif existe 
function checkIdMotif($id)
{
    $connexion = getConnect();
    $requete = "select * from motif where IDMOTIF='$id'";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}
//retourne le motif(id,libellé,pièces) à partir de l'id
function checkMotif2($id)
{
    $connexion = getConnect();
    $requete = "select * from motif where IDMOTIF='$id'";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}
function getMotif()
{ //recupere les infos des motif
    $connexion = getConnect();
    $requete = "select * from MOTIF";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $Employe = $resultat->fetchall();
    $resultat->closeCursor();
    return $Employe;
}
// retourne le nb de contrats souscris entre 2 dates
function nbContratSouscris($date1, $date2)
{
    $connexion = getConnect();
    $requete = "SELECT COUNT(*) FROM contratclient where DATEOUVERTURECONTRAT >= '$date1' and DATEOUVERTURECONTRAT < '$date2'";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetch();
    $resultat->closeCursor();
    return $ligne;
}
// retourne le nb de rdv entre 2 dates
function nbRDV($date1, $date2)
{
    $connexion = getConnect();
    $requete = "SELECT COUNT(*) FROM rdv where DATERDV >= '$date1' and DATERDV < '$date2'";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetch();
    $resultat->closeCursor();
    return $ligne;
}
// retourne le nb de client avant une date
function nbClients($date)
{
    $connexion = getConnect();
    $requete = "SELECT COUNT(DISTINCT NUMCLIENT) FROM (SELECT NUMCLIENT FROM compteclient where DATEOUVERTURE <= '$date') as T1 UNION (SELECT numCLIENT FROM contratclient where dateouvertureContrat <= '$date')";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetch();
    $resultat->closeCursor();
    return $ligne;
}
// retourne la solde total de tout les clients avant une date
function soldeTotalTousClient($date)
{
    $connexion = getConnect();
    $requete = "SELECT SUM(solde) as STTC FROM compteclient where DATEOUVERTURE <= '$date' ";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetch();
    $resultat->closeCursor();
    return $ligne;
}

//page Agent 
function miseAJourClient($id, $adresse, $profession, $numtel, $mail, $situation)
{
    $connexion = getConnect();
    $requete = "UPDATE CLIENT SET ADRESSE='$adresse', PROFESSION='$profession', NUMTEL='$numtel', MAIL='$mail', SITUATION='$situation' WHERE NUMCLIENT=$id";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
// synthese du client son Identité/ses Comptes/ses Contrats
function syntheseClientIdentite($id)
{
    $connexion = getConnect();
    $requete = "SELECT * FROM client where NUMCLIENT = $id";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}

function syntheseClientCompte($id)
{
    $connexion = getConnect();
    $requete = "SELECT * FROM compteclient where NUMCLIENT = $id";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}

function syntheseClientContrat($id)
{
    $connexion = getConnect();
    $requete = "SELECT * FROM contratclient where NUMCLIENT = $id";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}

// verifie si un compte existe dans la BDD à partir d'un nom de compte
function checkNomCompteClient($nom)
{
    $connexion = getConnect();
    $requete = "SELECT * FROM compteclient where NOMCOMPTE='$nom'";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}
// verifie si un contrat existe dans la BDD à partir d'un nom de contrat
function checkNomContratClient($nom)
{
    $connexion = getConnect();
    $requete = "SELECT * FROM contratclient where NOMCONTRAT='$nom'";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}
// verifer si un client existe dans la BDD à partir du nom et de la date de naissance information
function checkClient($nom, $datenaissance)
{
    $datenaissance = date('Y-m-d', strtotime($datenaissance));
    $connexion = getConnect();
    $requete = "SELECT * FROM CLIENT WHERE NOM='$nom' AND DATE_NAISS='$datenaissance'";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchAll();
    $resultat->closeCursor();
    return $ligne;
}

// verifer si un client existe dans la BDD à partir de l'id du client information 
function checkClientClient($id)
{
    $connexion = getConnect();
    $requete = "SELECT * FROM client where NUMCLIENT=$id";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}
// verifier un compte client à partir de l'id du client 
function checkClientCompte($id)
{
    $connexion = getConnect();
    $requete = "SELECT * FROM compteclient where NUMCLIENT=$id";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}
function checkClientContrat($id)
{
    $connexion = getConnect();
    $requete = "SELECT * FROM contratclient where NUMCLIENT=$id";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}
function checkCompte2($nomcompte)
{
    $connexion = getConnect();
    $requete = "select * from compte where NOMCOMPTE='$nomcompte'";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}
// depot une somme dans un compte client à partir d'un id et du type du compte
function depot($id, $somme, $nomcompte)
{
    $connexion = getConnect();
    $requete = "update compteclient set SOLDE=SOLDE+$somme where NUMCLIENT=$id and NOMCOMPTE='$nomcompte'";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
    $requete = "insert into operation  VALUES(0,$id,'$nomcompte',$somme,'depot')";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
// depot une somme dans un compte client à partir d'un id et du type du compte 
function retrait($id, $somme, $nomcompte)
{
    $connexion = getConnect();
    $requete = "update compteclient set SOLDE=SOLDE-$somme  where NUMCLIENT=$id and NOMCOMPTE='$nomcompte'";
    $resultat = $connexion->query($requete);
    $requete = "insert into operation  VALUES(0,$id,'$nomcompte',$somme,'retrait')";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
// depot une somme dans un compte client à partir d'un id et du type du compte puis retourne Solde - retrait
function retrait2($id, $retrait_somme, $compte)
{
    $connexion = getConnect();
    $requete = "SELECT SOLDE-'$retrait_somme' as res FROM compteclient where NUMCLIENT=$id and NOMCOMPTE='$compte' ";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetch();
    $resultat->closeCursor();
    return $ligne;
}
// affiche le montant d'un compte client à partir de l'id
function RecupDecouvert($id)
{
    $connexion = getConnect();
    $requete = "SELECT MONTANTDECOUVERT FROM compteclient where NUMCLIENT=$id ";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetch();
    $resultat->closeCursor();
    return $ligne;
}
function getRDV($id)
{
    $connexion = getConnect();
    $requete = "select DATERDV from rdv where NUMEMPLOYE='$id' order by DATERDV ASC";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}
function checkConseiller($numemploye)
{
    $connexion = getConnect();
    $requete = "select * from employe where CATEGORIE='Conseiller' and NUMEMPLOYE='$numemploye'";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetch();
    $resultat->closeCursor();
    return $ligne;
}
function rdv()
{
    $connexion = getConnect();
    $requete = "select * from motif";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}
function checkRDV($date)
{
    $connexion = getConnect();
    $requete = "select * from rdv where (DATE(DATERDV) = DATE('$date') and DATE_FORMAT(DATERDV,'%H') = DATE_FORMAT('$date','%H')) ";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}
function ajoutrdv($idcharge, $numcli, $daterdv, $idmotif)
{
    $connexion = getConnect();
    $requete = "INSERT INTO rdv values (0,'$numcli','$idcharge','$idmotif','$daterdv')";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
function RecupIdClient($date)
{
    $connexion = getConnect();
    $requete = "select NUMCLIENT from rdv where (DATE(DATERDV) = DATE('$date') and DATE_FORMAT(DATERDV,'%H') = DATE_FORMAT('$date','%H')) ";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetch();
    $resultat->closeCursor();
    return $ligne;
}
function RecupIdMotif($date)
{
    $connexion = getConnect();
    $requete = "select IDMOTIF from rdv where (DATE(DATERDV) = DATE('$date') and DATE_FORMAT(DATERDV,'%H') = DATE_FORMAT('$date','%H')) ";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetch();
    $resultat->closeCursor();
    return $ligne;
}
function AjouterClient($numemploye, $nom, $prenom, $adresse, $mail, $numtel, $situation, $profession, $date_naissance)
{
    $connexion = getConnect();
    $requete = "INSERT INTO client(NUMCLIENT,NUMEMPLOYE,NOM,PRENOM,ADRESSE,MAIL,NUMTEL,SITUATION,PROFESSION,DATE_NAISS) values (0,'$numemploye','$nom','$prenom','$adresse','$mail','$numtel','$situation','$profession','$date_naissance')";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
function VendreContrat($nomContrat, $numclient, $dateouvertureContrat, $tarifMensuel)
{
    $connexion = getConnect();
    $requete = "INSERT INTO CONTRATCLIENT values ('$nomContrat',$numclient,'$dateouvertureContrat',$tarifMensuel)";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
function checkCompte3($nomcompte)
{
    $connexion = getConnect();
    $requete = "select * from compte where NOMCOMPTE='$nomcompte'";
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $ligne = $resultat->fetchall();
    $resultat->closeCursor();
    return $ligne;
}
function OuvrirCompte($numclient, $nomcompte, $dateouverturecompte, $solde, $montantdecouvert)
{
    $connexion = getConnect();
    $requete = "INSERT INTO compteclient values ($numclient,'$nomcompte','$dateouverturecompte',$solde,$montantdecouvert)";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
function modifDecouvert($id, $decouvert, $nomcompte)
{
    $connexion = getConnect();
    $requete = "UPDATE compteclient set MONTANTDECOUVERT=$decouvert where NUMCLIENT=$id and NOMCOMPTE='$nomcompte'";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
function ResilierCompte($numclient, $nomcompte)
{
    $connexion = getConnect();
    $requete = "DELETE from compteclient where NUMCLIENT=$numclient and NOMCOMPTE='$nomcompte'";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
function ResilierContrat($numclient, $nomcontrat)
{
    $connexion = getConnect();
    $requete = "DELETE from contratclient where NUMCLIENT=$numclient and NOMCONTRAT='$nomcontrat'";
    $resultat = $connexion->query($requete);
    $resultat->closeCursor();
}
