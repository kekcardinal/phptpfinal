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
    <?php
        require_once("Fonctions.php");
        require_once("Tableaux.php");
        

        
    ?>
</body>
</html>