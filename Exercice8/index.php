<html>
    <head>
        <title>Exercice 7 Partie 9</title>
    </head>
    <body>
        <?php
        $date = date('d-m-Y');
        echo 'Dans - 20 jours, il était ' . date('d-m-Y', strtotime($date . ' - 20 DAY'));
        ?>
        <a href="../index.php">Retour</a>
    </body>
</html>
