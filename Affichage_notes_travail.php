<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Affichage travail</title>
</head>
<body>
    <nav role="menu">
    <a href="Affichage_notes_travail.php" class="active" role="menuitem">Affichage notes par travail</a>
        <a href="Affichage_notes_finales.php"  role="menuitem">Affichage notes finales</a>
        <a href="Recherche.php" role="menuitem">Recherche</a>  
    </nav>

    <div class="conteneur">
    <h1>Affichage des notes par travail </h1>
    <form class="form_page_1"  name="selecteur" method="GET">
            <select name="numero_groupe">
                <option >Groupe 1</option>
                <option >Groupe 2</option>
            </select>
            <select name="type_travail">
                <option value=4>Travail 1</option>
                <option value=5>Travail 2</option>
                <option value=6>Examen final</option>
            </select>
            <input type="submit" name="Afficher" value="Calculer">
        </form>
    
    <?php
        require_once("Fonctions.php");
        require_once("Tableaux.php");
        
        if (isset($_GET["Afficher"]) && isset($_GET["numero_groupe"]) && isset($_GET["type_travail"]))
        {
        switch($_GET["numero_groupe"])
        {
            case "Groupe 1":
                $groupe_envoi=$NotesGroupe1;
                break;
            case "Groupe 2":
                $groupe_envoi=$NotesGroupe2;
                break;
        }
        echo afficher_groupe($groupe_envoi, $_GET["type_travail"]);
        }
    ?>

</div>
</body>
</html>