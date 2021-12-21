<?php require_once 'includes/funktionen.inc.php';
session_start();



# TODO:::: 
# WICHTIG: NEU FORMATIEREN MIT GEMEINSAMEN CSS VON INDEX PHP
#
#
#
#
#
#
#
#
#
logge_aus();
?>
<!DOCTYPE html>
    <html>

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link href="css/master.css" type="text/css" rel="stylesheet" />
        <title>Weblog - Ausloggen</title>
    </head>

    <body>
        <main>
            <div id="kopf">
                <h1>Mein Weblog</h1>
            </div>
            <div id="inhalt">
                <p>Sie wurden ausgeloggt.<br />Besuchen Sie uns bald wieder. </p>
                <p><a href="index.php" class="backlink">Zurück zur Hauptseite</a></p>
            </div>
            <div id="menu"><?php require_once 'includes/login.inc.php';?></div>
            <div id="fuss">Das ist das Ende </div>
        </main>
    </body>

    </html>