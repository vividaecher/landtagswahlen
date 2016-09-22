<!doctype html>
<html>
<head>
  <meta charset="utf-8">
<title>Kein Bock auf wählen - Landtagswahlen 2017</title>
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="main.css" rel="stylesheet" type="text/css">
<link href="sonntagsfrage.css" rel="stylesheet" type="text/css">
</head>
<body>

<!-- Im folgenden HTML-Teil wird ein Eingabeformular für den obigen PHP-Codeschnipsel gestaltet,
das über RADIO-Buttons Werte durch Anklicken in den Speicher nimmt -->
<h1>Sonntagsumfrage</h1>
<p>Wen würdest du wählen, wen du heute die Qual der Wahl hättest?</p>


<form name="wahlen" method="post" action="sonntagsfrage_ausgabe.php">
	<fieldset>
		<input type="radio" name="partei" value="linke">
		<label>Die Linke</label>
    </fieldset>

	<fieldset>
    	<input type="radio" name="partei" value="spd">
    	<label>SPD</label>
    </fieldset>

    <fieldset>
		<input type="radio" name="partei" value="gruenen">
    	<label>Die Grünen</label>
	</fieldset>

    <fieldset>
    	<input type="radio" name="partei" value="fdp">
    	<label>FDP</label>
	</fieldset>

	<fieldset>
		<input type="radio" name="partei" value="cdu">
		<label>CDU</label>
	</fieldset>

	<fieldset>
		<input type="radio" name="partei" value="afd">
  		<label>AfD</label>
	</fieldset>

    <button type="submit" value="eintragen">Jetzt wählen</button>
    <input type="hidden" name="status" value="gesendet">
</form>


</body>
</html>
