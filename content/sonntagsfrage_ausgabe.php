<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="description" content="Landtagswahlen 2017 in NRW Warum sollte ich wählen gehen?">
  <meta name="keywords" content="Landtagswahlen Nordrhein-Westfalen, Politik, NRW, Wieso Wählen, Sonntagsfrage">
  <meta name="author" content="Dustin Clever und Virginia Dächer">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1,shrink-to-fit=no">
  <title>Landtagswahlen in NRW 2017</title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <link rel="apple-touch-icon" sizes="57x57" href="../img/favicons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="../img/favicons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../img/favicons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="../img/favicons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../img/favicons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="../img/favicons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="../img/favicons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="../img/favicons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="../img/favicons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="../img/favicons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="../img/favicons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../img/favicons/favicon-16x16.png">
  <link rel="manifest" href="../images/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="../images/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
</head>
<body>
  <div class="wrapper landtagswahlen">
    <section class="container-full">
      <nav class="desktop-nav">
        <ul>
          <li><img src="../img/icons/landtagswahlen.svg" alt="Vote-Icon" /><a href="../index.html" title="Zur Startseite">Landtagswahlen</a></li>
          <li class="current"><img src="../img/icons/diagram.svg" alt="Diagram-Icon" /><a href="sonntagsfrage.php" title="Nehme jetzt an der Sonntagsfrage teil.">Sonntagsfrage</a></li>
          <li><img src="../img/icons/party-program.svg" alt="Parteien-Icon" /><a href="parteiprogramme.html" title="Erfahre mehr über die Parteien der Landtagswahl NRW">Parteiprogramme</a></li>
          <li><img src="../img/icons/questionmark.svg" alt="Fragezeichen-Icon" /><a href="warum-waehlen.html" title="Warum sollte man wählen gehen?">Warum wählen</a></li>
          <li><img src="../img/icons/politik-abc.svg" alt="Politik-ABC-Icon" /><a href="politik-abc.html" title="Das Fachchinesisch der Politik">Politik ABC</a></li>
        </ul>
      </nav>
      <main>
        <header>
          <nav>
            <button class="navbar-toggle">
              <span class="line"></span>
              <span class="line"></span>
              <span class="line"></span>
            </button>
            <ul class="hamburger-nav">
              <li><a class="current-mobile" href="../index.html" title="Zur Startseite">Landtagswahlen</a></li>
              <li><a href="sonntagsfrage.php" title="Nehme jetzt an der Sonntagsfrage teil.">Sonntagsfrage</a></li>
              <li><a href="parteiprogramme.html" title="Erfahre mehr über die Parteien der Landtagswahl NRW.">Parteiprogramme</a></li>
              <li><a href="warum-waehlen.html" title="Warum sollte man wählen gehen?">Warum wählen</a></li>
              <li><a href="politik-abc.html" title="Das Fachchinesisch der Politik">Politik ABC</a></li>
            </ul>
          </nav>

      </header>

      <div class="main-content">
        <h1>Die Sonntagsfrage</h1>
        <?php
        // Hier wird eine Session gestartet, damit doppelte Votes innerhalb einer Session verhindert werden.
        // Eine Session ist eine Sitzung
        session_start();
        // Prüft den Index $_SESSION["voted"], so dass bei der Abfrage kein Exception geschmissen wird
        // Die Abfrage ist das was nach dem && kommt
        $has_voted = isset($_SESSION['voted']); // && $_SESSION['voted'];

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
          echo '<script type="text/javascript">console.log("Stimme bereits abgegeben");</script>';
        }

        if (!$db) {
          exit ('Verbindungsfehler: ' . mysqli_connect_error());
        }

        $parties_with_votes = mysqli_query($db, "SELECT party, label, votes, all_votes.sum FROM nrw_2017 JOIN (SELECT SUM(votes) AS sum FROM nrw_2017) AS all_votes");
        /*
        $parties_with_votes {
        ["linke", Die Linke, 25, 70], -> $party_with_votes
        ["spd", SPD, 45, 70], -> $party_with_votes
      }
      */

      $sum = 0;
      while ($party_with_votes = mysqli_fetch_row($parties_with_votes)) {
        $party = $party_with_votes[0];
        $label = $party_with_votes[1];
        $votes = $party_with_votes[2];
        $sum = $party_with_votes[3];

        echo "<hr>$label:<br>$votes";
        echo '<div class="diagramm move diagramm-' . ($party) . '" style="width:' . ($votes) . '%">(' . round($votes / $sum * 100, 1) . '%)</div>';
      }

      echo 'Gesamtzahl aller abgegebenen Stimmen: ' . $sum;

      mysqli_close($db);
      ?>
      <div>
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
              window.location.replace("sonntagsfrage.php");
            }
          });
        }
        </script>
      </div>
    </div>

  </div>
</main>
</section>
</div>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../js/init.js" type="text/javascript"></script>
</body>
</html>
