<?php
require_once('controleur/controleur.php'); // charge les méthodes du contrôleur

try {
    session_start();
    if (isset($_POST['connexion'])) {
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $_SESSION['nom'] = CtlConnexion($login, $mdp);
    } elseif (isset($_POST['dbeconnexion'])) {
        CtlLogin();
    } elseif (isset($_POST['restA'])) {
        cltAccueil();
    } elseif (isset($_POST['afficher']) || isset($_POST['restE'])) {
        CtlAfficherEmploye();
    } elseif (isset($_POST['ajouter1'])) {
        CttAfficherAdjEmploye();
    } elseif (isset($_POST['ajouter2'])) {
        $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];
        $login = $_POST['login'];
        $cat = $_POST['cat'];
        CtlAjouterEmploye($nom, $login, $mdp, $cat);
        CtlAfficherEmploye();
    } elseif (isset($_POST['supprimer'])) {
        $cpt = 0;
        foreach ($_POST as $key => $val) {
            $cptt = +CtlSuprimer($key);
        }
        CtlAfficherEmploye();
        if ($cpt == 0) {
            echo 'Selectionner un employe';
        }
    } elseif (isset($_POST['modifie'])) {
        foreach ($_POST as $key => $val) {
            $cpt = +CltAfficherModifEmploye($key);
        }
        CtlAfficherEmploye();
        if ($cpt != 1) {
            echo 'Saisir un employe a modifer';
        }
    } elseif (isset($_POST['modifie2'])) {
        $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];
        $login = $_POST['login'];
        $cat = $_POST['cat'];
        $key = $_POST['key'];
        cltModif($nom, $login, $mdp, $cat, $key);
        CtlAfficherEmploye();
    } elseif (isset($_POST['afficher2']) || isset($_POST['restC'])) {
        CtlAfficherContrat();
    } elseif (isset($_POST['ajouterC1'])) {
        CttAfficherAdjContrat();
    } elseif (isset($_POST['ajouterC2'])) {
        $nom = $_POST['nom'];
        CtlAjouterContrat($nom);
        CtlAfficherContrat();
    } elseif (isset($_POST['supprimerC'])) {
        if (isset($_POST['nomC'])) {
            foreach ($_POST['nomC'] as $valeur) {
                CtlSupprimerContrat($valeur);
            }
            CtlAfficherContrat();
        } else {
            CtlAfficherContrat();
            echo 'Saisir un contrat';
        }
    } elseif (isset($_POST['modifieC'])) {
        if (isset($_POST['nomC'])) {
            foreach ($_POST['nomC'] as $valeur) {
                CltAfficherModifContrat($valeur);
            }
            CtlAfficherContrat();
        } else {
            CtlAfficherContrat();
            echo 'Saisir un contrat';
        }
    } elseif (isset($_POST['afficher3']) || isset($_POST['restL'])) {
        CttAfficherMotif();
    } elseif (isset($_POST['modifieC2'])) {
        $nom = $_POST['nom'];
        $new = $_POST['newname'];
        CltModifContrat($nom, $new);
        CtlAfficherContrat();
    } elseif (isset($_POST['cree_motif'])) {
        $nommotif = $_POST['cree_libelle'];
        $listepiece = $_POST['cree_liste_de_piece'];
        CtlCreeMotif($nommotif, $listepiece);
    } elseif (isset($_POST['adjMotif'])) {
        CttAfficherAdjMotif();
    } elseif (isset($_POST['ModifMotif'])) {
        CttAfficherModifMotif();
    } elseif (isset($_POST['Modif2Motif'])) {
        CttAfficherModif2Motif();
    } elseif (isset($_POST['SupprMotif'])) {
        CttAfficherSupprMotif();
    } elseif (isset($_POST['modif_libeller'])) {
        $idmotif = $_POST['id_motif'];
        $nvlibeller = $_POST['nv_libelle'];
        CtlModifLibeller($idmotif, $nvlibeller);
    } elseif (isset($_POST['supprimer_motif'])) {
        $idmotif = $_POST['suppr_motif'];
        CtlSupprimerMotif($idmotif);
    } elseif (isset($_POST['modif_piece'])) {
        $idmotif = $_POST['id_motif'];
        $nvliste = $_POST['modif_liste_de_piece'];
        CtlModifListePieces($idmotif, $nvliste);
    } elseif (isset($_POST['afficher4'])) {
        CttAfficherStatistique();
    } elseif (isset($_POST['afficher_nombre_rdv'])) {
        $datedebut = $_POST['date_debut'];
        $datefin = $_POST['date_fin'];
        CtlNBRdv($datedebut, $datefin);
    } elseif (isset($_POST['afficher_nombre_contrat'])) {
        $datedebut = $_POST['date_debut_contrat'];
        $datefin = $_POST['date_fin_contrat'];
        CtlNbContrat($datedebut, $datefin);
    } elseif (isset($_POST['afficher_total'])) {
        $dateclient = $_POST['total'];
        CtlNbClient($dateclient);
    } elseif (isset($_POST['afficher_total_solde'])) {
        $totalsoldedate = $_POST['date_total_solde'];
        CtlSoldeTotal($totalsoldedate);
    }
    //page agent
    elseif (isset($_POST['restAgent'])) {
        cltAccueilAgent();
    } elseif (isset($_POST['info'])) {
        CtlInterfaceinfo();
    } elseif (isset($_POST['synthese'])) {
        CtlInterfacesynthese();
    } elseif (isset($_POST['depot_retrait'])) {
        CtlInterfaceDepotRetrait();
    } elseif (isset($_POST['rdv'])) {
        CtlInterfaceRendez_vous1();
    } elseif (isset($_POST['rdv_rdv'])) {
        $id = $_POST['idcharge'];
        CtlSemaine($id);
    } elseif (isset($_POST['infoclient'])) {
        $id = $_POST['infocli'];
        CtlAfficherInformation($id);
    } elseif (isset($_POST['modif_info'])) {
        $Mail = $_POST['mail'];
        $situation = $_POST['situation'];
        $numtel = $_POST['numtel'];
        $adresse = $_POST['adresse'];
        $profession = $_POST['profession'];
        $numcli = $_POST['numcli'];
        CtlModificationInfoCli($numcli, $Mail, $situation, $profession, $numtel, $adresse);
    } elseif (isset($_POST['recuperer'])) {
        $nom = $_POST['nom_client'];
        $datenaiss = $_POST['date_naiss'];
        CtlRecupereNumCli($nom, $datenaiss);
    } elseif (isset($_POST['synthese_client'])) {
        $login = $_POST['idsynthese'];
        CtlAfficherSyntheseClient($login);
    } elseif (isset($_POST['recuperer'])) {
        $nom = $_POST['nom_client'];
        $datenaiss = $_POST['date_naiss'];
        CtlRecupereNumCli($nom, $datenaiss);
    } elseif (isset($_POST['valider_depot'])) {
        $id = $_POST['identifiant_depot'];
        $depot_somme = $_POST['depot'];
        $compte = $_POST['compte_depot'];
        CtlDepot($id, $depot_somme, $compte);
    } elseif (isset($_POST['valider_retrait'])) {
        $id = $_POST['identifiant_retrait'];
        $retrait_somme = $_POST['retrait'];
        $compte = $_POST['compte_retrait'];
        CtlRetrait($id, $retrait_somme, $compte);
    } elseif (isset($_POST['ajouter_rdv'])) {
        $idcharge = $_POST['id_charge'];
        $daterdv = $_POST['date_rdv'];
        $numcli = $_POST['numclient'];
        $motif = $_POST['motif'];
        CtlRdv($idcharge, $numcli, $daterdv, $motif);
    } elseif (isset($_POST['prec'])) {
        $date = $_POST['ghost'];
        $id = $_POST['ghostrdv'];
        CtlSemainePrec($id, $date);
    } elseif (isset($_POST['next'])) {
        $date = $_POST['ghost'];
        $id = $_POST['ghostrdv'];
        CtlSemaineSuiv($id, $date);
        //page conseiller
    } elseif (isset($_POST['restconseiller'])) {
        CtlAfficherConseiller($_SESSION['nom']);
    } elseif (isset($_POST['prec_conseiller'])) {
        $date = $_POST['ghost'];
        $id = $_POST['ghostrdv'];
        CtlSemainePrecConseiller($id, $date);
    } elseif (isset($_POST['next_conseiller'])) {
        $date = $_POST['ghost'];
        $id = $_POST['ghostrdv'];
        CtlSemaineSuivConseiller($id, $date);
    } elseif (isset($_POST['affiche_rdv'])) {
        $date = $_POST['ghost_rdv'];
        $numconseiller = $_POST['ghost_id'];
        CtlAfficherSyLi($numconseiller, $date);
    } elseif (isset($_POST['inscrire'])) {
        CtlInterfaceInscrire();
    } elseif (isset($_POST['vendre'])) {
        CtlInterfaceVendreContrat();
    } elseif ((isset($_POST['ouvrir']))) {
        CtlInterfaceOuvrirCompte();
    } elseif ((isset($_POST['modification_decouvert']))) {
        CtlInterfaceDecouvert();
    } elseif (isset($_POST['resilier'])) {
        CtlInterfaceResilier();
    } elseif (isset($_POST['valider_inscription'])) {
        $nom = $_POST['nomclient'];
        $prenom = $_POST['prenomclient'];
        $numemploye = $_POST['numemploye'];
        $adresse = $_POST['adresseclient'];
        $mail = $_POST['mailclient'];
        $numtel = $_POST['numtel'];
        $profession = $_POST['professionclient'];
        $date_naissance = $_POST['datenaiss'];
        $situation = $_POST['situationclient'];
        CtlInscriptionFaite($nom, $prenom, $numemploye, $adresse, $mail, $numtel, $date_naissance, $situation, $profession);
    } elseif (isset($_POST['valider_contrat'])) {
        $nomContrat = $_POST['nomcontrat'];
        $numclient = $_POST['num_client'];
        $dateouvertureContrat = date('Y-m-d');
        $tarifMensuel = $_POST['tarif_mensuel'];
        CtlContratVendu($numclient, $nomContrat, $dateouvertureContrat, $tarifMensuel);
    } elseif (isset($_POST['valider_compte'])) {
        $numclient = $_POST['num_client'];
        $nomcompte = $_POST['nomcompte'];
        $dateouverturecompte = date('Y-m-d');
        $solde = $_POST['solde'];
        $montantdecouvert = $_POST['montant_decouvert'];
        CtlOuvertureCompte($numclient, $nomcompte, $dateouverturecompte, $solde, $montantdecouvert);
    } elseif (isset($_POST['valider_modification_decouvert'])) {
        $id = $_POST['num_client'];
        $decouvert = $_POST['nouveau_montant'];
        $nomcompte = $_POST['nomcompte'];
        CtlModificationDecouvertFaite($id, $decouvert, $nomcompte);
    } elseif (isset($_POST['valider_resilier_compte'])) {
        $numclient = $_POST['num_client'];
        $nomcompte = $_POST['nomcompte'];
        CtlResiliationCompteFaite($numclient, $nomcompte);
    } elseif (isset($_POST['valider_resilier_contrat'])) {
        $numclient = $_POST['num_client'];
        $nomcontrat = $_POST['nomcontrat'];
        CtlResiliationContratFaite($numclient, $nomcontrat);
    } else {
        CtlLogin();
    } // on vient d'arriver sur la page et on appelle le contrôleur qui gère
} catch (agentException $e) {
    $e->getMsg();
} catch (conseillerException $e) {
    $e->getMsg();
} catch (directeurException $e) {
    $e->getMsg();
} catch (Exception $e) { // une erreur est survenu dans le bloc try
    $msg = 'ERREUR dans ' . $e->getFile() . ' Ligne' . $e->getLine() . ' : ' . $e->getMessage();
    // on récupère son code
    CtlErreur($msg); // on appelle le contrôleur qui gère les erreurs.
}
