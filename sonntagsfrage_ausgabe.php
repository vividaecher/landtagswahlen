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

<?php
session_start();


$linke = 0;
$spd = 0;
$gruenen = 0;
$fdp = 0;
$cdu = 0;
$afd = 0;

// Verbindung zur Datenbank herstellen
$db = mysqli_connect("localhost", "root", "", "wahlen");


// PHP-Variablen werden deklariert und mit bedingter Verzweigung überprüft - danach: Wertezuweisung
if (isset($_POST["hash"])) {
  $hash = $_POST["hash"];

  if (isset($_POST["partei"])) {
      $partei = $_POST["partei"];

      switch ($partei) {
        case 'linke':
          $linke = 1;
          break;

        case 'spd':
          $spd = 1;
          break;

        case 'gruenen':
          $gruenen = 1;
          break;

        case 'fdp':
          $fdp = 1;
          break;

        case 'cdu':
          $cdu = 1;
          break;

        case 'afd':
          $afd = 1;
          break;

        default:
          echo 'Keine Partei ausgewählt.';
          break;
        }
  }

  //Dateneintrag in die Tabelle 'nrw_2017'
  $query = "INSERT INTO nrw_2017 (Linke,SPD,Gruenen,FDP,CDU,AfD,hash) VALUES ($linke,$spd,$gruenen,$fdp,$cdu,$afd,'$hash')";
  $_SESSION["voted"] = mysqli_query($db, $query);
  if(!$_SESSION["voted"]) {
    echo '<script type="text/javascript">alert("Stimme bereits abgegeben");</script>';
  }


}











// Verbindungsaufbau mit einer MySQLI-Datenbank
// z.B.: $db = mysqli_connect("localhost", "USER", "password", "datenbank");



// Fehlerausgabe falls die Variable $db nicht existiert
if (!$db) {
    exit ("Verbindungsfehler: " . mysqli_connect_error());
}

// Zeichensatz einstellen für die gewählte existierende Datenbankverbindung $db
mysqli_set_charset($db, 'utf8');

//_____________________________________________________________________________
// Formatierte Ausgabe der Daten einer Berechnung von Daten aus einer Datenbanktabelle
// zunächst: Spaltenköpfe einstellen
echo '<table border="1"><tr><th>Spalte 1</th><th>Spalte 2</th><th>Spalte 3</th><th>Spalte 4</th><th>Spalte 5</th><th>Spalte 6</th></tr>';
// dann: Zeilen (TR) innerhalb der Tabelle definieren
echo '<tr>';
// dann: Tabellenzellen (TD) definieren
echo '<td>';
// Datenbankabfrage mit MySQLI für Spalte 3
$ergebnis = mysqli_query($db, "SELECT id,Linke,SPD,Gruenen,FDP,CDU,AfD FROM nrw_2017");
// Abfrage auslesen
echo "Die Linke <br>";
while ($row = mysqli_fetch_row($ergebnis)) {
    echo $row[1] . "<br/>";
}
echo '</td>';

echo '<td>';
// Datenbankabfrage mit MySQLI für Spalte 3
$ergebnis = mysqli_query($db, "SELECT id,Linke,SPD,Gruenen,FDP,CDU,AfD FROM nrw_2017");
// Abfrage auslesen
echo "SPD <br>";
while ($row = mysqli_fetch_row($ergebnis)) {
    echo $row[2] . "<br/>";
}
echo '</td>';

echo '<td>';
// Datenbankabfrage mit MySQLI für Spalte 3
$ergebnis = mysqli_query($db, "SELECT id,Linke,SPD,Gruenen,FDP,CDU,AfD FROM nrw_2017");
// Abfrage auslesen
echo "Die Grünen <br>";
while ($row = mysqli_fetch_row($ergebnis)) {
    echo $row[3] . "<br/>";
}
echo '</td>';

echo '<td>';
// Datenbankabfrage mit MySQLI für Spalte 4
$ergebnis = mysqli_query($db, "SELECT id,Linke,SPD,Gruenen,FDP,CDU,AfD FROM nrw_2017");
// Abfrage auslesen
echo "FDP <br>";
while ($row = mysqli_fetch_row($ergebnis)) {
    echo $row[4] . "<br/>";
}
echo '</td>';

echo '<td>';
// Datenbankabfrage mit MySQLI für Spalte 5
$ergebnis = mysqli_query($db, "SELECT id,Linke,SPD,Gruenen,FDP,CDU,AfD FROM nrw_2017");
// Abfrage auslesen
echo "CDU <br>";
while ($row = mysqli_fetch_row($ergebnis)) {
    echo $row[5] . "<br/>";
}
echo '</td>';

echo '<td>';
// Datenbankabfrage mit MySQLI für Spalte 6
$ergebnis = mysqli_query($db, "SELECT id,Linke,SPD,Gruenen,FDP,CDU,AfD FROM nrw_2017");
// Abfrage auslesen
echo "AfD <br>";
while ($row = mysqli_fetch_row($ergebnis)) {
    echo $row[6] . "<br/>";
}
echo '</td>';

echo '</table>';


// Spaltensumme wird für die Spalte Die Linke gebildet - dafür muss die Datenbankverbindung durch
// $db hergestellt werden
$sum = "SELECT sum(Linke) AS stimmenLinke FROM nrw_2017";
$result = mysqli_query($db, $sum) or die(mysqli_error());
// Solange in die Variable $output noch Werte aus der Tabelle eingelesen werden werden diese Werte in
// die Variable $summeLinke eingelesen
while ($output = mysqli_fetch_assoc($result)) {
    $summeLinke= $output['stimmenLinke'];
}
// Spaltensumme wird für die Spalte SPD gebildet - dafür muss die Datenbankverbindung durch
// $db hergestellt werden
$sum = "SELECT sum(SPD) AS stimmenSPD FROM nrw_2017";
$result = mysqli_query($db, $sum) or die(mysqli_error());
// Solange in die Variable $output noch Werte aus der Tabelle eingelesen werden werden diese Werte in
// die Variable $summeSPD eingelesen
while ($output = mysqli_fetch_assoc($result)) {
    $summeSPD = $output['stimmenSPD'];
}
// Spaltensumme wird für die Spalte GRÜNE gebildet - dafür muss die Datenbankverbindung durch
// $db hergestellt werden
$sum = "SELECT sum(Gruenen) AS stimmenGruenen FROM nrw_2017";
$result = mysqli_query($db, $sum) or die(mysqli_error());
// Solange in die Variable $output noch Werte aus der Tabelle eingelesen werden werden diese Werte in
// die Variable $summeGruenen eingelesen
while ($output = mysqli_fetch_assoc($result)) {
    $summeGruenen = $output['stimmenGruenen'];
}
// Spaltensumme wird für die Spalte FDP gebildet - dafür muss die Datenbankverbindung durch
// $db hergestellt werden
$sum = "SELECT sum(FDP) AS stimmenFDP FROM nrw_2017";
$result = mysqli_query($db, $sum) or die(mysqli_error());
// Solange in die Variable $output noch Werte aus der Tabelle eingelesen werden werden diese Werte in
// die Variable $summeFDP eingelesen
while ($output = mysqli_fetch_assoc($result)) {
    $summeFDP = $output['stimmenFDP'];
}
// Spaltensumme wird für die Spalte CDU gebildet - dafür muss die Datenbankverbindung durch
// $db hergestellt werden
$sum = "SELECT sum(CDU) AS stimmenCDU FROM nrw_2017";
$result = mysqli_query($db, $sum) or die(mysqli_error());
// Solange in die Variable $output noch Werte aus der Tabelle eingelesen werden werden diese Werte in
// die Variable $summeCDU eingelesen
while ($output = mysqli_fetch_assoc($result)) {
    $summeCDU = $output['stimmenCDU'];
}
// Spaltensumme wird für die Spalte AfD gebildet - dafür muss die Datenbankverbindung durch
// $db hergestellt werden
$sum = "SELECT sum(AfD) AS stimmenAfD FROM nrw_2017";
$result = mysqli_query($db, $sum) or die(mysqli_error());
// Solange in die Variable $output noch Werte aus der Tabelle eingelesen werden werden diese Werte in
// die Variable $summeAfD eingelesen
while ($output = mysqli_fetch_assoc($result)) {
    $summeAfD = $output['stimmenAfD'];
}



// Die Gesamtsumme der Spalte 1-6 wird gebildet, in die Variable $summe eingelesen und ausgegeben
$summe = $summeLinke + $summeSPD + $summeGruenen + $summeFDP + $summeCDU + $summeAfD;
echo 'Gesamtzahl aller abgegebenen Stimmen: ' . $summe;

// Spaltensumme wird für die Spalte Linke gebildet - dafür muss die Datenbankverbindung durch
// $db hergestellt werden
$sum = "SELECT sum(Linke) AS stimmenLinke FROM nrw_2017";
$result = mysqli_query($db, $sum) or die(mysqli_error());
// In einer WHILE-Schleife wird nun eine DIV-Box erzeugt, die einen gelben Hintergrund hat und
// mit der Breite arbeitet, die die Summe der Stimmen in der Spalte 1 zur Verfügung stellt und es wird der
// Prozentwert mit Hilfe der Gesamtzahl aller Stimmen ($summe) gebildet
while ($output = mysqli_fetch_assoc($result)) {
    echo "<hr>Stimmen für die Die Linke:<br>$output[stimmenLinke]";
    echo '<div style="background:#FF0; width:' . ($output['stimmenLinke']) . '%">
(' . round($output['stimmenLinke'] / $summe * 100, 1) . '%)</div>';
}

// Spaltensumme wird für die Spalte SPD gebildet - dafür muss die Datenbankverbindung durch
// $db hergestellt werden
$sum = "SELECT sum(SPD) AS stimmenSPD FROM nrw_2017";
$result = mysqli_query($db, $sum) or die(mysqli_error());
// In einer WHILE-Schleife wird nun eine DIV-Box erzeugt, die einen gelben Hintergrund hat und
// mit der Breite arbeitet, die die Summe der Stimmen in der Spalte 2 zur Verfügung stellt und es wird der
// Prozentwert mit Hilfe der Gesamtzahl aller Stimmen ($summe) gebildet
while ($output = mysqli_fetch_assoc($result)) {
    echo "<hr>Stimmen für die SPD:<br>$output[stimmenSPD]";
    echo '<div style="background:#FF0; width:' . ($output['stimmenSPD']) . '%">
(' . round($output['stimmenSPD'] / $summe * 100, 1) . '%)</div>';
}

// Spaltensumme wird für die Spalte Gruenen gebildet - dafür muss die Datenbankverbindung durch
// $db hergestellt werden
$sum = "SELECT sum(Gruenen) AS stimmenGruenen FROM nrw_2017";
$result = mysqli_query($db, $sum) or die(mysqli_error());
// In einer WHILE-Schleife wird nun eine DIV-Box erzeugt, die einen gelben Hintergrund hat und
// mit der Breite arbeitet, die die Summe der Stimmen in der Spalte 3 zur Verfügung stellt und es wird der
// Prozentwert mit Hilfe der Gesamtzahl aller Stimmen ($summe) gebildet
while ($output = mysqli_fetch_assoc($result)) {
    echo "<hr>Stimmen für die Die Grünen:<br>$output[stimmenGruenen]";
    echo '<div style="background:#FF0; width:' . ($output['stimmenGruenen']) . '%">
(' . round($output['stimmenGruenen'] / $summe * 100, 1) . '%)</div>';
}

// Spaltensumme wird für die Spalte FDP gebildet - dafür muss die Datenbankverbindung durch
// $db hergestellt werden
$sum = "SELECT sum(FDP) AS stimmenFDP FROM nrw_2017";
$result = mysqli_query($db, $sum) or die(mysqli_error());
// In einer WHILE-Schleife wird nun eine DIV-Box erzeugt, die einen gelben Hintergrund hat und
// mit der Breite arbeitet, die die Summe der Stimmen in der Spalte 4 zur Verfügung stellt und es wird der
// Prozentwert mit Hilfe der Gesamtzahl aller Stimmen ($summe) gebildet
while ($output = mysqli_fetch_assoc($result)) {
    echo "<hr>Stimmen für die FDP:<br>$output[stimmenFDP]";
    echo '<div style="background:#FF0; width:' . ($output['stimmenFDP']) . '%">
(' . round($output['stimmenFDP'] / $summe * 100, 1) . '%)</div>';
}

// Spaltensumme wird für die Spalte CDU gebildet - dafür muss die Datenbankverbindung durch
// $db hergestellt werden
$sum = "SELECT sum(CDU) AS stimmenCDU FROM nrw_2017";
$result = mysqli_query($db, $sum) or die(mysqli_error());
// In einer WHILE-Schleife wird nun eine DIV-Box erzeugt, die einen gelben Hintergrund hat und
// mit der Breite arbeitet, die die Summe der Stimmen in der Spalte 5 zur Verfügung stellt und es wird der
// Prozentwert mit Hilfe der Gesamtzahl aller Stimmen ($summe) gebildet
while ($output = mysqli_fetch_assoc($result)) {
    echo "<hr>Stimmen für die CDU:<br>$output[stimmenCDU]";
    echo '<div style="background:#FF0; width:' . ($output['stimmenCDU']) . '%">
(' . round($output['stimmenCDU'] / $summe * 100, 1) . '%)</div>';
}

// Spaltensumme wird für die Spalte AfD gebildet - dafür muss die Datenbankverbindung durch
// $db hergestellt werden
$sum = "SELECT sum(AfD) AS stimmenAfD FROM nrw_2017";
$result = mysqli_query($db, $sum) or die(mysqli_error());
// In einer WHILE-Schleife wird nun eine DIV-Box erzeugt, die einen gelben Hintergrund hat und
// mit der Breite arbeitet, die die Summe der Stimmen in der Spalte 6 zur Verfügung stellt und es wird der
// Prozentwert mit Hilfe der Gesamtzahl aller Stimmen ($summe) gebildet
while ($output = mysqli_fetch_assoc($result)) {
    echo "<hr>Stimmen für die AfD:<br>$output[stimmenAfD]";
    echo '<div style="background:#FF0; width:' . ($output['stimmenAfD']) . '%">
(' . round($output['stimmenAfD'] / $summe * 100, 1) . '%)</div>';
}

// Schließen der Verbindung
mysqli_close($db);
?>

<?php
// Im nächsten PHP-Codeschnipsel werden die Variablen $linke, $spd, $gruenen, $fdp, $cdu und $afd auf 0 gesetzt


?>
</body>
</html>
