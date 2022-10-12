<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <nav role="menu">
    <a href="Affichage_notes_travail.php" role="menuitem">Affichage notes par travail</a>
        <a href="Affichage_notes_finales.php"   role="menuitem">Affichage notes finales</a>
        <a href="Recherche.php"  class="active" role="menuitem">Recherche</a>   
    </nav>

    <form method="GET">
        Recherche: <input type="text" name="element_rechercher">
        <input type="submit" name="Afficher" value="Calculer">
    </form>


    <?php
        require_once("Fonctions.php");
        require_once("Tableaux.php");
        $reg_exp = '/^[A-Z]{4}\d{6}$/i';

        if (isset($_GET["Afficher"]) && isset($_GET["element_rechercher"]))
        {
                    //validation avec preg_match
                if(preg_match($reg_exp , $_GET["element_rechercher"]) === 0)
                {
                    echo "Veuillez entrer un numéro d'étudiant sous forme : ABCD012345";
                }
                else
                {
                    $element_rechercher =  $_GET["element_rechercher"];
                    $tableau = $NotesGroupe1 + $NotesGroupe2;

                    if ($tableau[$element_rechercher]=="")
                    {
                        echo "Le code étudiant est mauvais";
                    }
                    else
                    {
                        echo "Code etudiant valide";
                    }
                    var_dump($tableau[$element_rechercher]);

                }
        }
        
    ?>
</body>
</html>