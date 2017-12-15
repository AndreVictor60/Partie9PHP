<html>
    <head>
        <title>Exercice 5 Partie 9</title>
    </head>
    <body>
        <?php
        $now = time();
        $date2 = strtotime('2016-05-16');
        setlocale(LC_TIME, 'fr_FR.UTF8');

        function dateDiff($date1, $date2) {
            $diff = abs($date1 - $date2);
            $retour = array();
            $tmp = $diff;
            $retour['second'] = $tmp % 60;
            $tmp = floor(($tmp - $retour['second']) / 60);
            $retour['minute'] = $tmp % 60;
            $tmp = floor(($tmp - $retour['minute']) / 60);
            $retour['hour'] = $tmp % 24;
            $tmp = floor(($tmp - $retour['hour']) / 24);
            $retour['day'] = $tmp;
            return $retour;
        }

        echo 'Il y a ' . dateDiff($now, $date2)['day'] . ' jours entre ' . strftime('%A %d %B %Y') . ' et  mardi 2 août 2016 à 15h00.';
        ?>
        <br/><a href="../index.php">Retour</a>
    </body>
</html>