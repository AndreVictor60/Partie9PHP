<?php
// Vérifier $_POST
if (isset($_POST['month']) && $_POST['year']) {
    // Récuperer le mois du POST['month'] qui est renvoie en STRING
    $m = $_POST['month'];
    // Transforme $m STRING en INT
    switch ($m) {
        case 'Janvier':
            $month = 1;
            break;
        case 'Février':
            $month = 2;
            break;
        case 'Mars':
            $month = 3;
            break;
        case 'Avril':
            $month = 4;
            break;
        case 'Mai':
            $month = 5;
            break;
        case 'Juin':
            $month = 6;
            break;
        case 'Juillet':
            $month = 7;
            break;
        case 'Août':
            $month = 8;
            break;
        case 'Septembre':
            $month = 9;
            break;
        case 'Octobre':
            $month = 10;
            break;
        case 'Novembre':
            $month = 11;
            break;
        case 'Décembre':
            $month = 12;
            break;
    }
    // Récuperer la année dans $_POST['year'] en INT
    $yearNow = $_POST['year'];
} else {
    // Si il y a rien dans les $_POST, on n'ajouter le mois et l'année actuelle a $month et $yearNow
    $month = date('m');
    $yearNow = date('Y');
    $_POST['year'] = $yearNow;
}
?>

<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="style.css"/>
        <title>TP Partie 9</title>
    </head>
    <body>
        <div class="container">
            <?php
            // Créer les tableaux des mois et jours
            $monthArray = [1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre'];
            $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
            // Récuperer le nb de jour du mois actuelle
            $nb_day = cal_days_in_month(CAL_GREGORIAN, $month, $yearNow);
            // Récuperer le jour du 1 eme du mois
            $firstday = date("w", mktime(0, 0, 0, $month, 1, $yearNow));
            // Transforme $firstday qui est donner en int en string
            switch ($firstday) {
                case 0 :
                    $dayLettre = 'Dimanche';
                    break;
                case 1 :
                    $dayLettre = 'Lundi';
                    break;
                case 2 :
                    $dayLettre = 'Mardi';
                    break;
                case 3 :
                    $dayLettre = 'Mercredi';
                    break;
                case 4 :
                    $dayLettre = 'Jeudi';
                    break;
                case 5 :
                    $dayLettre = 'Vendredi';
                    break;
                case 6 :
                    $dayLettre = 'Samedi';
                    break;
            }
            $monthNow = date('n');
            $yearNowA = $_POST['year'];
            ?>
            <div class="form-date">
                <form method='post'>
                    <label for="name">Mois</label>
                    <select name="month">
                        <?php
                        // Parcourer le tableau des mois

                        foreach ($monthArray as $key => $value) {
                            if ($key == $monthNow) {
                                ?>
                                <option name="<?php echo $key ?>" selected="selected"><?php echo $value ?></option>
                                <?php
                            } else {
                                ?>
                                <option name="<?php echo $key ?>"><?php echo $value ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <label for="year">Année</label>
                    <select name="year">
                        <?php
                        /* Fait une boucle FOR, Initialiser $year par l'année 1970 ensuite
                         * si 1970 n'est pas supérieur ou égal l'année 2030 (fin 32 bits)
                         * chaque boucle on fait année+ 1
                         */
                        for ($year = 1970; $year <= 2030; $year++) {
                            if ($year == $yearNowA) {
                                ?>
                                <option name="<?php echo $yearNowA ?>" selected="selected"><?php echo $yearNowA ?></option>
                                <?php
                            } else {
                                ?>
                                <option name="<?php echo $year ?>"> <?php echo $year ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <input type="submit" value="Valider"/>
                </form>
            </div>
            <?php
            // Récuperer mois en INT et transformer en STRING
            switch ($month) {
                case 1:
                    $month = 'Janvier';
                    break;
                case 2:
                    $month = 'Février';
                    break;
                case 3:
                    $month = 'Mars';
                    break;
                case 4:
                    $month = 'Avril';
                    break;
                case 5:
                    $month = 'Mai';
                    break;
                case 6:
                    $month = 'Juin';
                    break;
                case 7:
                    $month = 'Juillet';
                    break;
                case 8:
                    $month = 'Août';
                    break;
                case 9:
                    $month = 'Septembre';
                    break;
                case 10:
                    $month = 'Octobre';
                    break;
                case 11:
                    $month = 'Novembre';
                    break;
                case 12:
                    $month = 'Décembre';
                    break;
            }
            $dayNow = date('w');
            ?>
            <div class="title">
                <?php
                // Afficher le mois & année
                echo $month . ' ' . $yearNowA;
                ?>
            </div>
            <table class="table table-bordered">
                <thead>
                    <?php
                    // Parcourir le tableau days
                    foreach ($days as $value) {
                        ?>
                    <td class="tdDay"><?php echo $value ?></td>
                <?php } ?>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        //Afficher le 1 jour du mois
                        for ($i = 0; $i <= 6; $i++) {
                            if ($firstday == $i) {
                                ?>
                                <td class="tdHover tdDate"> 1 </td>
                                <?php
                                //Afficher le nombre de jours dans le mois
                                for ($day = 2; $day <= $nb_day; $day++) {
                                    if ($i == 6) {
                                        ?>
                                    </tr>
                                    <tr>
                                        <?php
                                        $i = -1;
                                    }

                                    if ($day != $dayNow) {
                                        echo '<td class="tdHover tdDate">' . $day . '</td>';
                                    } else {
                                        echo '<td class="dayNow tdHover tdDate">' . $dayNow . '</td>';
                                    }
                                    ?>
                                    </td>
                                    <?php
                                    $i++;
                                }
                                $i = 6;
                            } else {
                                ?>
                                <td class="tdDisable tdDate"></td>
                                <?php
                            }
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
            <a href="../index.php">Retour</a>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>
