<?php
    require_once 'includes/funktionen.inc.php';
    session_start();
    $blogeintraege = hole_eintraege();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/master.css">
    <title>secondhand</title>
</head>
<body>
    
    <main>
        
        <div class="header">
            <h1>Secondhand</h1>
        </div>
        

        <?php
        foreach($blogeintraege as $blogeintrag){
        ?>
        <div class="blog-eintrag">
            <h1><?=$blogeintrag['bezeichnung'];?></h1>
            <img src="<?=$blogeintrag['id'];?>.endung" alt="">
            <p><?=$blogeintrag['beschreibung'];?></p>
            <p>Preis: <?=$blogeintrag['preis'];?> €</p>
            <p>Zustand: <?=$blogeintrag['name'];?></p>
            <hr />
            <p>erstellt am <?=date('d.m.Y H:i:s',strtotime($blogeintrag['erstelldatum']));?> von <?=$blogeintrag['vorname'];?> <?=$blogeintrag['nachname'];?></p>
            <hr />
            <h3 class="right">Kontaktdaten:</h3>
            <p class="right">Email: <?=$blogeintrag['email'];?></p>
            <p class="right">Telefon: <?=$blogeintrag['telefon'];?></p>
        </div>
        <?php
        }
        ?>



        <?php

                /**
                 * Zeige das Login-Formular, wenn der Benutzer noch nicht eingeloggt ist,
                 * ansonsten das Hauptmenu.
                 */	 
                if (ist_eingeloggt()) {
                    require_once 'includes/menu.inc.php';
                } else {
                	require_once 'includes/login.inc.php';
                } 
        ?>

        </main>

</body>
</html>