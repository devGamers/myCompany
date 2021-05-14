<?php

function minText($text) {
    return substr($text, 0, 50) . '...';
}

function formatChiffre($chiffre) {
    return $chiffre <= 9 ? '0'.$chiffre : $chiffre;
}

function formatNumber($number) {
    return number_format($number, 0, ' ', ' ');
}

function getMois() {
    $mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

    return $mois;
}

function aujourdhui() {
    return date('Y-m-d');
}
