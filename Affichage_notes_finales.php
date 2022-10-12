<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Affichage note</title>
</head>
<body>
    
    <nav role="menu">
        <a href="Affichage_notes_travail.php" role="menuitem">Affichage notes par travail</a>
        <a href="Affichage_notes_finales.php"  class="active" role="menuitem">Affichage notes finales</a>
        <a href="Recherche.php" role="menuitem">Recherche</a>  
    </nav>

    <div class="conteneur">
    <h1>Affichage des notes finales </h1>
    <form class="form_page_2" name="selecteur" method="GET">
            <select  name="numero_groupe[]" multiple size=2>
                <option value="G1">Groupe 1</option>
                <option value="G2">Groupe 2</option>
            </select>
            <input class="radio" type="checkbox" name="chkbox_echec" value="echec"> En échec</label><br>
            <input class="radio" type="radio" name="hommefemme" value="M">
            <label>Homme</label><br>
            <input class="radio" type="radio" name="hommefemme" value="F">
            <label>Femme</label><br>
            <input class="radio" type="radio" name="hommefemme" value="MF">
            <label>Homme et femme</label><br>
            <input type="submit" name="Afficher" value="Calculer">
        </form>
    <?php
        require_once("Fonctions.php");
        require_once("Tableaux.php");

        $echec = false;
        $groupe_envoi = array("");
        $valeur="";

        if (isset($_GET["Afficher"]) && isset($_GET["hommefemme"]) && isset($_GET["numero_groupe"]))
        {
        foreach ($_GET["numero_groupe"] as $numero_groupe)
        {
            $valeur.=$numero_groupe;
        }
        switch($valeur)
        {
            case "G1":
                $groupe_envoi=$NotesGroupe1;
                break;
            case "G2":
                $groupe_envoi=$NotesGroupe2;
                break;
            case "G1G2";
                $groupe_envoi=$NotesGroupe1+$NotesGroupe2;
                break;
        }
        if (isset($_GET["chkbox_echec"]))
        {
            $echec=true;
        }
        else
        {
            $echec=false;
        }
        echo afficher_valeur_finales($groupe_envoi, $echec, $_GET["hommefemme"]);
        }
        else
        {
            echo "<h1>Veuillez remplir le formulaire</h1>";
        }
       
        
    ?>

    </div>
</body>
</html>