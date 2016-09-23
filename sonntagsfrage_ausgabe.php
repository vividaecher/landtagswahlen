<!doctype html>
<html>
<head>
  <meta charset="utf-8">
<title>Landtagswahlen NRW - Sonntagsfragen Egebnisse</title>
<!-- <link href="reset.css" rel="stylesheet" type="text/css">
<link href="main.css" rel="stylesheet" type="text/css">
<link href="sonntagsfrage.css" rel="stylesheet" type="text/css"> -->
</head>
<body>

<?php
// Hier wird eine Session gestartet, damit doppelte Votes innerhalb einer Session verhindert werden.
// Eine Session ist eine Sitzung
session_start();
// Prüft den Index $_SESSION["voted"], so dass bei der Abfrage kein Exception geschmissen wird
// Die Abfrage ist das was nach dem && kommt
$has_voted = isset($_SESSION['voted']) && $_SESSION['voted'];

// Die Datenbank wird connected
$db = mysqli_connect('localhost', 'root', '', 'wahlen');
mysqli_set_charset($db, 'utf8');

// Wenn der Vote noch nicht abgegeben wurde, dann ...
if(!$has_voted) {
  if (isset($_POST['partei'])) {
    $party = $_POST['partei'];
    // ... wird in der entsprechende Zeile in Abhängigkeit von der Partei, die Anzahl der abgegebenen Stimmen um 1 erhöht
    $query = "UPDATE nrw_2017 SET votes = votes + 1 WHERE party = '$party'";
    // Das Ergebnis der Query wird in die Session gespeichert, um oben überprüft werden zu können (siehe Zeile 18)
    $_SESSION['voted'] = mysqli_query($db, $query);
  }
}
else {
  echo '<script type="text/javascript">alert("Stimme bereits abgegeben");</script>';
}

if (!$db) {
    exit ('Verbindungsfehler: ' . mysqli_connect_error());
}

$parties_with_votes = mysqli_query($db, "SELECT party, votes, all_votes.sum FROM nrw_2017 JOIN (SELECT SUM(votes) AS sum FROM nrw_2017) AS all_votes");
/*
$parties_with_votes {
  ["linke", 25, 70], -> $party_with_votes
  ["spd", 45, 70], -> $party_with_votes
}
*/

$sum = 0;
while ($party_with_votes = mysqli_fetch_row($parties_with_votes)) {
  $party = $party_with_votes[0];
  $votes = $party_with_votes[1];
  $sum = $party_with_votes[2];

  echo "<hr>Stimmen für die $party:<br>$votes";
  echo '<div style="background:#FF0; width:' . ($votes) . '%">(' . round($votes / $sum * 100, 1) . '%)</div>';
}

echo 'Gesamtzahl aller abgegebenen Stimmen: ' . $sum;

mysqli_close($db);
?>

<button id="destroy_session">Refresh</button>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
     jQuery("#destroy_session").on("click", destroy);
  });
  function destroy() {
     jQuery.ajax({
        url: 'destroy_session.php',
        success: function() {
            console.log('Session abgebrochen');
        }
     });
  }
</script>
</body>
</html>
