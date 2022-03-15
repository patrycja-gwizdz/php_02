<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>
  

<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">Kolejna chroniona strona</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>


<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #c6e2e9; width:300px;">
<form action="<?php print(_APP_ROOT);?>/app/calc_kredyt.php" method="post" class="pure-form pure-form-stacked">
    <legend>Kalkulator kredytowy</legend>
    <fieldset>
	<label for="id_kwota">	Kwota: </label>
	<input id="id_kwota" type="text" name="kwota" value="<?php out ($kwota) ?>" />
	<br />
	<label for="id_lata">Liczba lat: </label>
	<input id="id_lata" type="text" name="lata" value="<?php out ($lata) ?>" />
	<br />
	<label for="id_oprocentowanie">Oprocentowanie: </label>
	<input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php out ($oprocentowanie) ?>"  />
	<br />
        </fieldset>
	<input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
</form>	
</div>


<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color:#f1ffc4;  width:300px;">
<?php echo 'Miesięczna rata: '.round($result,2); ?> złotych
</div>
<?php } ?>
        </div>

</body>
</html>