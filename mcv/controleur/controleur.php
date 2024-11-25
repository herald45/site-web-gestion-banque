<?php
require_once('modele/modele.php');
require_once('vue/vueD&L.php');
require_once('vue/vueC.php');
require_once('vue/vueA.php');

function CtlLogin()
{
    AfficheLogin(); // appel de la vue qui va exploiter $discussion et afficher // son contenu
}
function CtlConnexion($login, $mdp)
{
    $Check = checkUser($login, $mdp);
    if ($Check && isset($Check->CATEGORIE)) {
        if ($Check->CATEGORIE == 'Directeur') {
            AfficheDirecteur($Check->NOM);
        } elseif ($Check->CATEGORIE == 'Conseiller') {
            $getrdv = getRDV($Check->NUMEMPLOYE);
            AfficheConseiller($Check->NUMEMPLOYE, $getrdv, $Check->NOM);
        } elseif ($Check->CATEGORIE == 'Agent') {
            AfficheAgent($Check->NOM);
        }
    } else {
        throw new Exception('login ou mot de passe incorecte');
    }
    return $Check->NUMEMPLOYE;
}
function cltAccueil()
{
    AfficheDirecteur(' ');
}
function CtlAfficherEmploye()
{
    $employe = getEmploye();
    AfficherEmploye($employe);
}
function CttAfficherAdjEmploye()
{
    AfficherAdj();
}
function CtlAjouterEmploye($nom, $login, $mdp, $cat)
{
    if (!empty($nom) && !empty($login) && !empty($mdp) && !empty($cat)) {
        $newCompte = checkCompte($nom, $login, $mdp, $cat);
        if ($newCompte == null) {
            ajouterEmploye($nom, $login, $mdp, $cat);
        } else {
            throw new directeurException("Compte déjà existant");
        }
    } else {
        throw new directeurException('un des champs est vide');
    }
}
function CtlSuprimer($key)
{

    if (is_int($key)) {
        SuprimerEmploye($key);
        return 1;
    }
}
function CltAfficherModifEmploye($key)
{

    if (is_int($key)) {
        $employe = getIDEmploye($key);
        AfficherModif($employe);
        return 1;
    }
}
function cltModif($nom, $login, $mdp, $cat, $key)
{
    if (!empty($nom) && !empty($login) && !empty($mdp) && !empty($cat)) {
        $newCompte = checkCompte($nom, $login, $mdp, $cat);
        if ($newCompte == null) {
            ModifierEmploye($nom, $login, $mdp, $cat, $key);
        } else {
            throw new directeurException("Vous n'avez pas fait de modif");
        }
    } else {
        throw new directeurException('un des champs est vide');
    }
}
function CtlAfficherContrat()
{
    $employe = getContrat();
    AfficherContrat($employe);
}
function CtlAjouterContrat($nom)
{
    if (!empty($nom)) {
        $newCompte = checkContrat($nom);
        if ($newCompte == null) {
            AjouterContrat($nom);
        } else {
            throw new directeurException("Compte déjà existant");
        }
    } else {
        throw new directeurException('un des champs est vide');
    }
}
function CttAfficherAdjContrat()
{
    AfficherAdjContrat();
}
function CtlSupprimerContrat($key)
{
    SuprimerContrat($key);
}
function CltAfficherModifContrat($key)
{
    AfficherModifContrat($key);
}
function CltModifContrat($anciencontrat, $nvcontrat)
{
    $ancienContrat = checkContrat($anciencontrat); // Appel checkContrat du modèle
    $nomContrat = checkContrat($nvcontrat); // Appel checkContrat du modèle
    if (!empty($anciencontrat) && !empty($nvcontrat)) {
        if ($ancienContrat != null) {
            if ($nomContrat == null) {
                ModifierContrat($anciencontrat, $nvcontrat); // Appel modifContrat du modèle
            } else {
                throw new directeurException("Contrat déjà existant");
            }
        }
    } else {
        throw new directeurException("champ invalide");
    }
}
function CttAfficherMotif()
{
    $motif = getMotif();
    AfficherInterfaceListePiece($motif);
}
function CttAfficherAdjMotif()
{
    AfficheradjMotif();
}
function CttAfficherModifMotif()
{
    AfficherModifMotif();
}
function CttAfficherSupprMotif()
{
    AfficherSupprMotif();
}
function CttAfficherModif2Motif()
{
    AfficherModif2Motif();
}
function CtlCreeMotif($nommotif, $listepiece)
{
    if (!empty($nommotif)) {
        creemotif($nommotif, $listepiece); // Appel creemotif du modèle
        $motif = getMotif();
        AfficherInterfaceListePiece($motif); // Appel AfficherInterfaceListePiece
    } else {
        throw new directeurException("champ invalide");
    }
}

// Fonction CtlModifLibeller
function  CtlModifLibeller($idmotif, $nvlibeller)
{
    $lb = checkIdMotif($idmotif); // Appel checkIdMotif du modèle
    if (!empty($idmotif) && !empty($nvlibeller)) {
        if ($lb != null) {
            modifLibeller($idmotif, $nvlibeller); // Appel modifLibeller du modèle
            $motif = getMotif();
            AfficherInterfaceListePiece($motif); // Appel AfficherInterfaceListePiece de la vue
            ModificationPhraseDirecteur(); // Appel ModificationPhraseDirecteur de la vue
        } else {
            throw new directeurException("ID motif non existant");
        }
    } else {
        throw new directeurException("Champ invalide");
    }
}

// Fonction CtlSupprimerMotif
function CtlSupprimerMotif($idmotif)
{
    $lb = checkIdMotif($idmotif); // Appel checkIdMotif du modèle
    if (!empty($idmotif)) {
        if ($lb != null) {
            supprimerMotif($idmotif); // Appel supprimerMotif du modèle
            $motif = getMotif();
            AfficherInterfaceListePiece($motif); // Appel AfficherInterfaceListePiece de la vue
            SupprimerphraseDireteur(); // Appel SupprimerphraseDireteur de la vue
        } else {
            throw new directeurException("ID motif non existant");
        }
    } else {
        throw new directeurException("Champ invalide");
    }
}

// Fonction CtlModifListePieces
function CtlModifListePieces($idmotif, $nvliste)
{
    $lb = checkIdMotif($idmotif); // Appel checkIdMotif du modèle
    if (!empty($idmotif)) {
        if ($lb != null) {
            modiflistepieces($idmotif, $nvliste); // Appel modiflistepieces du modèle
            $motif = getMotif();
            AfficherInterfaceListePiece($motif); // Appel AfficherInterfaceListePiece de la vue
            ModificationPhraseDirecteur(); // Appel de la fonction ModificationPhraseDirecteur de la vue
        } else {
            throw new directeurException("ID motif non existant");
        }
    } else {
        throw new directeurException("Champ invalide");
    }
}

//afficher stat
function CttAfficherStatistique()
{
    AfficherInterfaceSatistique();
}
// Fonction CtlNBRdv 
function CtlNBRdv($datedebut, $datefin)
{
    if (!empty($datedebut) && !empty($datefin)) {
        $nbrdv = nbRDV($datedebut, $datefin); // Appel nbRDV du modèle
        afficherNbRdv($nbrdv); // Appel afficherNbRdv de la vue
    } else {
        throw new directeurException("Champ invalide");
    }
}

// Fonction CtlNbContrat
function CtlNbContrat($datedebut, $datefin)
{
    if (!empty($datedebut) && !empty($datefin)) {
        $nbcontrat = nbContratSouscris($datedebut, $datefin); // Appel nbContratSouscris du modèle
        afficherNbContrat($nbcontrat); // Appel afficherNbContrat de la vue
    } else {
        throw new directeurException("champ invalide");
    }
}

// Fonction CtlNbClient
function CtlNbClient($dateclient)
{
    if (!empty($dateclient)) {
        $nbclient = nbClients($dateclient); // Appel nbClients du modèle
        afficherNbClient($nbclient); // Appel afficherNbClient de la vue
    } else {
        throw new directeurException("Champ invalide");
    }
}

// Fonction CtlSoldeTotal
function CtlSoldeTotal($totalsoldedate)
{
    if (!empty($totalsoldedate)) {
        $total = soldeTotalTousClient($totalsoldedate); // Appel soldeTotalSousClient du modèle
        afficherSoldeTotal($total); // Appel afficherSoldeTotal de la vue
    } else {
        throw new directeurException("Champ invalide");
    }
}

//page Agent
function cltAccueilAgent()
{
    AfficheAgent(' ');
}
// Fonction CtlInterfaceinfo affichage des info
function CtlInterfaceinfo()
{
    afficherinfo(); // Appel de la fonction afficherInfo de la vue
}

// Fonction CtlInterfacesynthese affichage de la synthese
function CtlInterfacesynthese()
{
    afficherSynthese(); // Appel de la fonction afficherSynthese de la vue
}

// Fonction CtlInterfaceDepotRetrait affichage des depots/retraits
function CtlInterfaceDepotRetrait()
{
    afficherDepotRetrait(); // Appel de la fonction afficherDepotRetrait de la vue
}

// Fonction CtlInterfaceRendez_Vous affichage des rdv
function CtlInterfaceRendez_vous1()
{
    afficherRDV(); // Appel de la fonction afficherRDV de la vue
}

// Fonction CtlAfficherInformaiton affichage des informations 
function CtlAfficherInformation($id)
{
    $num = checkClientClient($id); // Appel de la fonction checkClientClient du modèle
    if (!empty($num)) {
        afficherInformationClient($num); // Appel de la fonction afficherInformationClient de la vue
    } else {
        throw new agentException("champ invalide");
    }
}

// Fonction CtlAfficherSyntheseClient affichage des informations du client
function CtlAfficherSyntheseClient($id)
{
    $num = checkClientClient($id); // Appel checkClientClient du modèle
    $numcompte = checkClientCompte($id); // Appel de la fonction chekcClientCompte du modèle
    $numcontrat = checkClientContrat($id); // Appel de la fonction checkClientContrat du modèle
    if ($num != null) {
        $syntheseIdentite = syntheseClientIdentite($id); // Appel de la fonction syntheseClientIdentite du modèle
        $syntheseCompte = syntheseClientCompte($id); // Appel de la fonction syntheseClientCompte du modèle
        $syntheseContrat = syntheseClientContrat($id); // Appel de la fonction syntheseClientContrat du modèle
        afficherSyntheseTotal($syntheseIdentite, $syntheseCompte, $syntheseContrat); // Appel de la fonction afficherSyntheseTotal de la vue
        if ($numcompte == null) {
            echo 'Le client ne détient pas de compte </br>';
        }
        if ($numcontrat == null) {
            echo 'Le client ne détient  pas de contrat ';
        }
    } else {
        throw new agentException("Champ invalide");
    }
}

//Fonction CtlRecupereNumCli select du numclient
function CtlRecupereNumCli($nom, $datenaiss)
{
    if (!empty($nom) && !empty($datenaiss)) {
        $client = checkClient($nom, $datenaiss); // Appel de la fonction checkClient du modèle
        if ($client) {
            AfficherNumCli($client); // Appel de la fonction AfficherNumCli de la vue
        } else {
            throw new agentException("Le nom ou la date est faux");
        }
    } else {
        throw new agentException("Champ invalide");
    }
}

// Fonction CtlDepot pour des depots dans des comptesclients
function CtlDepot($id, $depot_somme, $compte)
{
    $num = checkClientCompte($id); // Appel de la fonction checkClientCompte du modèle
    $nomcompte = checkCompte2($compte); // Appel de la fonction checkCompte2 du modèle

    if ((!empty($id)) && (!empty($depot_somme)) && (!empty($compte))) {
        if ($num != null && $nomcompte != null) {
            depot($id, $depot_somme, $compte); // Appel de la fonction depot du modèle
            afficherDepotRetrait(); // Appel de la fonction afficherDepotRetrait de la vue
            ModificationPhrase();
        } else {
            throw new  agentException("Client ne possède pas de compte au nom indiqué ou compte n'existant pas");
        }
    } else {
        throw new agentException("champ invalide");
    }
}

// Fonction CtlRetrait pour des retraits dans des comptesclients
function CtlRetrait($id, $retrait_somme, $compte)
{
    $num = checkClientCompte($id); // Appel de la fonction checkClientCompte du modèle
    $nomcompte = checkCompte2($compte); // Appel de la fonction checkCompte2 du modèle
    $decouvert = RecupDecouvert($id); // Appel de la fonction RecupDecouvert du modèle
    $res = retrait2($id, $retrait_somme, $compte); // Appel de la fonction retrait2 du modèle

    if ((!empty($num)) && (!empty($retrait_somme)) && (!empty($nomcompte))) {
        if ($num != null && $nomcompte != null) {
            if ($res->res > $decouvert->MONTANTDECOUVERT) {
                retrait($id, $retrait_somme, $compte); // Appel de la fonction retrait du modèle
                afficherDepotRetrait(); // Appel de la fonction afficherDepotRetrait de la vue
                ModificationPhrase();
            } else {
                throw new agentException("Le montant du découvert est depassé");
            }
        } else {
            throw new agentException("Le Client ne détient pas de contrat au nom indiqué ou le contrat n'existe pas");
        }
    } else {
        throw new agentException("champ invalide");
    }
}

// Fonction CtlModificationInfoCli update les valeurs de la table client
function CtlModificationInfoCli($numcli, $Mail, $situation, $profession, $numtel, $adresse)
{
    if (!empty($Mail) && !empty($situation) && !empty($profession) && !empty($numtel) && !empty($adresse) && !empty($numcli)) {
        miseAJourClient($numcli, $adresse, $profession, $numtel, $Mail, $situation); // Appel de la fonction miseAJourClient du modèle
        $identite = syntheseClientIdentite($numcli); // Appel de la fonction suntheseClientidentite du modèle
        afficherInformationClient($identite); // Appel de la fonction afficherInformationClient de la vue
        ModificationPhrase(); // Appel de la fonction ModificationPhrase de la vue


    } else {
        throw new agentException("champ invalide");
    }
}
// Fonction CtlSemaine
function CtlSemaine($id)
{
    $getRDV = getRDV($id); // Appel getRDV du modèle
    $var = checkConseiller($id); // Appel checkConseiller du modèle
    $tous = rdv(); // Appel rdv du modèle
    if (!empty($getRDV)) {
        if (!empty($var)) {
            afficherRDV();
            PrendreRdv($tous);
            AfficherPlanning($id, $getRDV); // Appel AfficherPlanning de la vue
        } else {
            throw new agentException("Cette personne n'est pas un Conseiller");
        }
    } else {
        throw new agentException("Cet identifiant n'est rattaché à personne");
    }
}
// Fonction CtlSemainePrec
function CtlSemainePrec($id, $date)
{
    $jour = $date + 7;
    $getRDV = getRDV($id); // Appel getRDV du modèle
    $tous = rdv(); // Appel rdv du modèle
    afficherRDV();
    PrendreRdv($tous); // Appel PrendreRdv du modèle
    AfficherPlann($id, $getRDV, $jour); // Appel AfficherPlann de la vue

}

// Fonction CtlSemaineSuiv
function CtlSemaineSuiv($id, $date)
{
    $jour = $date - 7;
    $getRDV = getRDV($id); // Appel getRDV du modèle
    $tous = rdv(); // Appel rdv du modèle
    afficherRDV();
    PrendreRdv($tous); // Appel PrendreRdv du modèle
    AfficherPlann($id, $getRDV, $jour); // Appel AfficherPlann de la vue

}
// Fonction CtlRdv
function  CtlRdv($idcharge, $numcli, $daterdv, $motif)
{
    $numclient = checkClientClient($numcli); // Appel de checkClientClient du modèle
    $idconseiller = checkConseiller($idcharge); // Appel de checkConseiller du modèle
    $check = checkRDV($daterdv); // Appel de checkRDV du modèle
    $dateH = date('H', strtotime($daterdv)); // Appel de date et strtotime des built-in functions
    $tous = rdv(); // Appel de rdv du modèle
    if (!empty($idcharge) && !empty($numcli) && !empty($daterdv)) {
        if ($idconseiller != null) {
            if ($numclient != null) {
                if (empty($check)) {
                    if ($dateH >= 9 && $dateH <= 19) {
                        afficherRDV(); // Appel de CtlInterfaceRendez_Vous précédent
                        PrendreRdv($tous); // Appel PrendreRdv du vue
                        ajoutrdv($idcharge, $numcli, $daterdv, $motif); // Appel ajoutrdv du modèle
                        $rdv = getRDV($idcharge); // Appel getRDV du modèle
                        AfficherPlanning($idcharge, $rdv); // Appel Afficherplanning de la vue
                    } else {
                        throw new agentException("Horaire non disponible");
                    }
                } else {
                    throw new agentException("Horaire non disponible");
                }
            } else {
                throw new agentException("Le client n'existe pas");
            }
        } else {
            throw new agentException("Le numéro de l'employe n'est pas celui d'un Conseiller ");
        }
    } else {
        throw new agentException("Champ invalide");
    }
}
function CtlAfficherConseiller($numconseiller)
{

    $getrdv = getRDV($numconseiller); // Appel de la fonction getRDV du modèle
    AfficheConseiller($numconseiller, $getrdv, ''); // Appel de la fonction AfficherPlanningConseiller de la vue


}
// Fonction CtlSemainePrecConseiller
function CtlSemainePrecConseiller($id, $date)
{
    $jour = $date + 7;
    $getrdv = getRDV($id); // Appel getRDV du modèle
    // Appel afficherInterfaceConsulter de la vue
    AfficherPlanningConseiller2($id, $jour, $getrdv); // Appel AfficherPlanningConseiller2 de la vue
}

// Fonction CtlSemaineSuivConseiller
function CtlSemaineSuivConseiller($id, $date)
{
    $jour = $date - 7;
    $getrdv = getRDV($id); // Appel getRDV du modèle
    // Appel afficherInterfaceConsulter de la vue
    AfficherPlanningConseiller2($id, $jour, $getrdv); // Appel AfficherPlanningConseiller2 de la vue
}

function CtlAfficherSyLi($numconseiller, $date)
{
    $numcon = checkConseiller($numconseiller); // Appel de la fonction checkConseiller du modèle
    if (!empty($date)) {
        if ($numcon != null) {
            $getrdv = getRDV($numconseiller); // Appel de la fonction getRDV du modèle
            //AfficheConseiller($numconseiller, $getrdv, ''); // Appel de la fonction AfficherPlanningConseiller de la vue
            $id = RecupIdClient($date); // Appel de la fonction RecupIdCLient du modèle
            $num = checkClientClient($id->NUMCLIENT); // Appel de la fonction checkClientClient du modèle
            $idmotif = RecupIdMotif($date); // Appel de la fonction RecupIdMotif du modèle
            $motif = checkMotif2($idmotif->IDMOTIF); // Appel de la fonction checkMotif2 du modèle
            afficherInformationClient2($num, $motif, $numconseiller, $getrdv); // Appel de la fonction afficherInformationClient2 de la vue
        } else {
            throw new conseillerException("Ce n'est pas le numéro d'un Conseiller");
        }
    } else {
        throw new conseillerException("Vous n'avez pas de rendez-vous à cette heure");
    }
}
function CtlInterfaceInscrire()
{
    afficherInterfaceInscrire(); // Appel afficherInterfaceInscrire de la vue
}

// Fonction CtlInterfaceVendreContrat
function CtlInterfaceVendreContrat()
{
    afficherInterfaceVendreContrat(); // Appel afficherInterfaceVendreContrat de la vue
}

// Fonction CtlInterfaceOuvrirCompte
function CtlInterfaceOuvrirCompte()
{
    afficherInterfaceOuvrirCompte(); // Appel afficherInterfaceOuvrirCompte de la vue
}

// Fonction CtlInterfaceDecouvert
function CtlInterfaceDecouvert()
{
    afficherInterfaceDecouvert(); // Appel afficherInterfaceDecouvert de la vue
}

// Fonction CtlInterfaceResilier
function CtlInterfaceResilier()
{
    afficherInterfaceResilier(); // Appel afficherInterfaceResilier de la vue
}

function CtlErreur($erreur)
{
    afficherErreur($erreur);
}
function CtlInscriptionFaite($nom, $prenom, $numemploye, $adresse, $mail, $numtel, $date_naissance, $situation, $profession)
{
    $checkC = checkConseiller($numemploye); // Appel checkConseiller du modèle
    if ((!empty($prenom)) && (!empty($nom)) && (!empty($numemploye)) && (!empty($adresse)) && (!empty($mail)) && (!empty($numtel)) && (!empty($date_naissance)) && (!empty($situation)) && (!empty($profession))) {
        if (!empty($checkC)) {
            AjouterClient($numemploye, $nom, $prenom, $adresse, $mail, $numtel, $situation, $profession, $date_naissance); // Appel AjouterClient du modèle
            afficherInterfaceInscrire(); // Appel afficherInterfaceInscrire de la vue
            ModificationPhraseC();
        } else {
            throw new conseillerException("Le Conseiller saisie n'existe pas");
        }
    } else {
        throw new conseillerException("champ invalide");
    }
}
function CtlContratVendu($numclient, $nomContrat, $dateouvertureContrat, $tarifMensuel)
{
    $num = checkClientClient($numclient); // Appel checkClientClient du modèle
    $nomcontrat = checkContrat($nomContrat); // appel checkContrat du modèle
    $cncc = checkNomContratClient($nomContrat); // Appel checkNomContratClient du modèle
    if ((!empty($numclient)) && (!empty($nomContrat)) && (!empty($dateouvertureContrat)) && (!empty($tarifMensuel))) {
        if ($num != null && $nomcontrat != null && $cncc != null) {
            VendreContrat($nomContrat, $numclient, $dateouvertureContrat, $tarifMensuel); //Appel VendreContrat du modèle
            afficherInterfaceVendreContrat(); // Appel afficherInterfaceVendreContrat de la vue
            ModificationPhraseC();
        } else {
            throw new conseillerException("Le client n'existe pas, le contrat n'existe pas ou le contrat est déjà existant");
        }
    } else {
        throw new conseillerException("champ invalide");
    }
}
function CtlOuvertureCompte($numclient, $nomcompte, $dateouverturecompte, $solde, $montantdecouvert)
{
    $num = checkClientClient($numclient); // Appel de checkClientClient du modèle
    $nomcomp = checkCompte3($nomcompte); // Appel de checkCompte du modèle
    $cncc = checkNomCompteClient($nomcompte); // Appel de checkNomCompteClient du modèle
    if ((!empty($numclient)) && (!empty($nomcompte)) && (!empty($dateouverturecompte)) && (!empty($solde)) && (!empty($montantdecouvert))) {
        if ($num != null && $nomcomp != null && $cncc == null) {
            OuvrirCompte($numclient, $nomcompte, $dateouverturecompte, $solde, $montantdecouvert); // Appel de OuvrirCompte du modèle
            afficherInterfaceOuvrirCompte(); // Appel de afficherInterfaceOuvrirCompte de la vue
            ModificationPhraseC();
        } else {
            throw new conseillerException("Le client n'existe pas, le compte n'existe pas ou compte déjà existant");
        }
    } else {
        throw new conseillerException("champ invalide");
    }
}
function CtlModificationDecouvertFaite($id, $decouvert, $nomcompte)
{
    $num = checkClientCompte($id); // Appel checkClientCompte du modèle
    $nomcomp = checkCompte3($nomcompte); // Appel checkCompte du modèle


    if ((!empty($id)) && (!empty($decouvert)) && (!empty($nomcompte))) {
        if ($num != null && $nomcomp != null) {
            if ($decouvert <= 0) {
                modifDecouvert($id, $decouvert, $nomcompte); // Appel modifDecouvert du modèle
                afficherInterfaceDecouvert(); // Appel afficherInterfaceDecouvert de la vue
                ModificationPhraseC();
            } else {
                throw new conseillerException("Le montant du découvert doit étre égale ou inférieure a 0 euros");
            }
        } else {
            throw new conseillerException("Le client ne possède pas ce compte ou le compte n'existe pas");
        }
    } else {
        throw new conseillerException("Champ invalide");
    }
}
function CtlResiliationCompteFaite($numclient, $nomcompte)
{
    $num = checkClientCompte($numclient); // Appel checkClientCompte du modèle
    $nomcomp = checkCompte3($nomcompte); // Appel checkCompte du modèle
    if ((!empty($numclient)) && (!empty($nomcompte))) {


        if (($num != null) && ($nomcomp != null)) {
            ResilierCompte($numclient, $nomcompte); // Appel ResilierCompte du modèle
            afficherInterfaceResilier(); // Appel afficherInterfaceResilier de la vue
            ModificationPhraseC();
        } else {
            throw new conseillerException("Le client ne possède ce compte ");
        }
    } else {
        throw new conseillerException("Champ invalide");
    }
}

function  CtlResiliationContratFaite($numclient, $nomcontrat)
{
    $num = checkClientContrat($numclient); // Appel checkClientContrat du modèle
    $nomContrat = checkContrat($nomcontrat); // Appel checkContrat du modèle
    if (!empty($numclient) && !empty($nomcontrat)) {
        if (($num != null) && ($nomContrat != null)) {
            ResilierContrat($numclient, $nomcontrat); // Appel ResilierContrat du modèle
            afficherInterfaceResilier(); // Appel afficherInterfaceResilier de la vue
            ModificationPhraseC();
        } else {
            throw new conseillerException("Le client ne détient pas de contrat à ce nom ou le contrat n'existe pas");
        }
    } else {
        throw new conseillerException("Champ invalide");
    }
}
