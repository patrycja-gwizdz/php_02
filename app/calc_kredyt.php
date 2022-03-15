<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

// 1. pobranie parametrów
function getParams(&$kwota,&$lata,&$oprocentowanie){
	$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$lata = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
	$oprocentowanie = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;	
}


// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

function validate(&$kwota,&$lata,&$oprocentowanie,&$messages){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($kwota) && isset($lata) && isset($oprocentowanie))) {
		return false;
	}
        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if ( $kwota == "") {
                $messages [] = 'Nie podano kwoty';
        }
        if ( $lata == "") {
                $messages [] = 'Nie podano liczby lat';
        }
        if ( $oprocentowanie == "") {
                $messages [] = 'Nie podano oprocentowania';
        }


        if ( $kwota == 0) {
                $messages [] = 'Kwota nie może wynosić zero';
        }
        if ( $lata == 0) {
                $messages [] = 'Liczba lat nie może wynosić zero';
        }


        if (count ( $messages ) != 0) return false;

                // sprawdzenie, czy podane wartości są liczbami całkowitymi
                if (! is_numeric( $kwota )) {
                        $messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
                }

                if (! is_numeric( $lata )) {
                        $messages [] = 'Druga wartość nie jest liczbą całkowitą';
                }	
                if (! is_numeric( $oprocentowanie )) {
                        $messages [] = 'Trzecia wartość nie jest liczbą całkowitą';
                }
        if (count ( $messages ) != 0) return false;
	else return true;
        }

// 3. wykonaj zadanie jeśli wszystko w porządku
function process(&$kwota,&$lata,&$oprocentowanie,&$messages,&$result){
	global $role;
if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$kwota	= intval($kwota);
	$lata	= intval($lata);
	$oprocentowanie = intval($oprocentowanie);
	//wykonanie operacji 
	if ($role == 'admin'){
				$result = (($kwota / (12 * $lata)) * ($oprocentowanie / 100 )) + ($kwota / (12 * $lata))  ;
			} else {
				$result = (($kwota / (12 * $lata)) * ($oprocentowanie / 100 )) + ($kwota / (12 * $lata))  ;
			}       
}
}
//definicja zmiennych kontrolera
$kwota = null;
$lata = null;
$oprocentowanie = null;
$result = null;
$messages = array();


getParams($kwota,$lata,$oprocentowanie);
if ( validate($kwota,$lata,$oprocentowanie,$messages) ) { 
	process($kwota,$lata,$oprocentowanie,$messages,$result);
}

// 4. Wywołanie widoku z przekazaniem zmiennych
include 'calc_view_kredyt.php';