<?php
function afficher_groupe($groupe, $indice_travail)
{
    $chaine ="<table><tr><th>Prenom</th><th>Nom</th><th>Note</th></tr>";
    $tableau_notes = array("");
    foreach($groupe as $numero_etudiant => $tableau_etudiant)
    {
                $chaine.="<tr><td>".$tableau_etudiant[0]."</td><td>".$tableau_etudiant[1]."</td><td>".$tableau_etudiant[$indice_travail]."</td></tr>";
                array_push($tableau_notes,$tableau_etudiant[$indice_travail]);
    }
    $chaine.="<tr><th>Moyenne</th><td colspan=2>".calcul_moyenne($tableau_notes)."</td></tr>";
    return $chaine;
}

function afficher_valeur_finales($groupe, $echec, $sexe)
{   
    $chaine = "<table class='tableau'><tr><th>Prenom</th><th>Nom</th><th>Sexe</th><th>Note finale</th><th>Est en echec</th></tr>";
    $tableau_moyenne = array("");

    foreach($groupe as $etudiant => $tableau_etudiant)
    {
        switch($sexe)
        {
            case "H":
                if (est_un_homme($tableau_etudiant) == true)
                {
                    if ($echec == true)
                    {
                    if (est_en_echec($tableau_etudiant)==true)
                    {
                        $chaine .= ecrire_ligne($tableau_etudiant);
                        array_push($tableau_moyenne ,calcul_note_finale($tableau_etudiant));
                    }
                    }
                    else
                    {
                        $chaine .= ecrire_ligne($tableau_etudiant);
                        array_push($tableau_moyenne ,calcul_note_finale($tableau_etudiant));
                    }
                }
                break;
            case "F":
                if (est_une_femme($tableau_etudiant) == true)
                {
                    if ($echec == true)
                    {
                    if (est_en_echec($tableau_etudiant)==true)
                    {
                        $chaine .= ecrire_ligne($tableau_etudiant);
                        array_push($tableau_moyenne ,calcul_note_finale($tableau_etudiant));
                    }
                    }
                    else
                    {
                        $chaine .= ecrire_ligne($tableau_etudiant);
                        array_push($tableau_moyenne ,calcul_note_finale($tableau_etudiant));
                    }
                }
                break;
                case "HF":
                    if (est_homme_ou_femme($tableau_etudiant) == true)
                    {
                        if ($echec == true)
                        {
                        if (est_en_echec($tableau_etudiant)==true)
                        {
                            $chaine .= ecrire_ligne($tableau_etudiant);
                            array_push($tableau_moyenne ,calcul_note_finale($tableau_etudiant));
                        }
                        }
                        else
                        {
                            $chaine .= ecrire_ligne($tableau_etudiant);
                            array_push($tableau_moyenne ,calcul_note_finale($tableau_etudiant));
                        }
                    }
                    break;
    }
        
    //    echo "Étudiant = ".$tableau_etudiant[0]."<br>";
    //    echo calcul_note_finale($tableau_etudiant)."<br>";
    //    echo est_en_echec($tableau_etudiant)."<br>";
    }
    $chaine.="<tr><th>Moyenne</th><td colspan=4>".calcul_moyenne($tableau_moyenne)."</td></tr>";
    return $chaine;
}
function ecrire_ligne($tableau_etudiant)
{  
    return "<tr><td>".$tableau_etudiant[0]."</td><td>".$tableau_etudiant[1]."</td><td>".$tableau_etudiant[2]."</td><td>".calcul_note_finale($tableau_etudiant)."</td><td>".est_en_echec($tableau_etudiant)."</td></tr>";
}
function calcul_moyenne($tableau)
{
    if (!($tableau == array("")))
    {
    return round(array_sum($tableau)/(count($tableau)-1),2);
    }
}
function est_un_homme($etudiant)
{
    $est_homme = false;

    if ($etudiant[2]=="M")
    {
        $est_homme = true;
    }
    return $est_homme;
}
function est_une_femme($etudiant)
{
    $est_femme = false;

    if ($etudiant[2]=="F")
    {
        $est_femme = true;
    }
    return $est_femme;
}
function est_homme_ou_femme($etudiant)
{
    $est_hommeoufemme = false;

    if ($etudiant[2]=="F" ||$etudiant[2]=="M")
    {
        $est_hommeoufemme = true;
    }
    return $est_hommeoufemme;
}

function est_en_echec($etudiant)
{
    $est_en_echec = false;

    if (calcul_note_finale($etudiant)<60)
    {
        $est_en_echec = true;
    }
    
    return $est_en_echec;
}

function calcul_note_finale($etudiant)
{
    $note_finale = round(($etudiant[4]*0.15 + $etudiant[5]*0.35 + $etudiant[6]*0.5),2);
    return $note_finale;
}
?>