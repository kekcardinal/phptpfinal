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
       if ($sexe == $tableau_etudiant[2] || $sexe == "MF") 
       {
            $chaine.=ecrire_grosse_ligne($tableau_etudiant, $echec);
       }
    }
    $chaine.="<tr><th>Moyenne</th><td colspan=4>".calcul_moyenne($tableau_moyenne)."</td></tr>";

    return $chaine;
}
function ecrire_ligne($tableau_etudiant)
{  
    return "<tr><td>".$tableau_etudiant[0]."</td><td>".$tableau_etudiant[1]."</td><td>".$tableau_etudiant[2]."</td><td>".calcul_note_finale($tableau_etudiant)."</td><td>".est_en_echec($tableau_etudiant)."</td></tr>";
}

function ecrire_grosse_ligne($tableau_etudiant, $echec)
{
    $ch = "";
    if ( est_en_echec($tableau_etudiant)==true || $echec == false)
    {    
        $ch = ecrire_ligne($tableau_etudiant);      
    }
    return $ch;
}
function calcul_moyenne($tableau)
{
    if (!($tableau == array("")))
    {
        return round(array_sum($tableau)/(count($tableau)-1),2);
    }
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