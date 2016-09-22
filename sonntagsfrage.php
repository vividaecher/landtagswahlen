<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Landtagswahlen NRW - Sonntagsfragen</title>
    <!-- <link href="reset.css" rel="stylesheet" type="text/css">
    <link href="main.css" rel="stylesheet" type="text/css">
    <link href="sonntagsfrage.css" rel="stylesheet" type="text/css"> -->
  </head>
  <body>
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
    </form>
  </body>
</html>
