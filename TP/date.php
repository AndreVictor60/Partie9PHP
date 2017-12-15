<?php

class Date {

    function getAll($year) {
        $tabl = array();
        $date = new DateTime($year . '-01-01');
        while ($date->format('Y') <= $year) {
            $y = $date->format('Y');
            $m = $date->format('n');
            $d = $date->format('j');
            $w = str_replace('0', '7', $date->format('w'));
            $tabl[$y][$m][$d] = $w;
            $date->add(new DateInterval('P1D'));
        }
        return $tabl;
    }

}

$yearNow = date('Y');
$month = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Novembre', 'Décembre'];
$days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

$date = new Date();
$dates = $date->getAll($yearNow);
print_r($dates);
?>