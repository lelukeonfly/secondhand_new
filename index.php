<?php
    require_once 'includes/funktionen.inc.php';
    session_start();
    $blogeintraege = hole_eintraege();
    #var_dump($_GET);
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
            foreach($blogeintraege as $key => $blogeintrag){
                ?>
                <div class="blog-eintrag">
                <?php
                foreach($blogeintrag as $key => $data){
                    if(strcmp($key,"bezeichnung")==0){?>
                        <h1><?=$data;?></h1><?php
                    }elseif (strcmp($key,"id")==0) {?>
                        <img src="<?=$data;?>.endung" alt=""><?php
                    }
                    elseif(strcmp($key,"beschreibung")==0){?>
                        <p><?=$data;?></p><?php
                    }elseif (strcmp($key,"preis")==0) {
                    ?>
                    <p>Preis: <?=$data;?> €</p>
                    <?php
                    }elseif (strcmp($key,"name")==0){
                    ?>
                    <p>Zustand: <?=$data;?></p>
                    <?php
                    }elseif(strcmp($key,"erstelldatum")==0||strcmp($key,"vorname")==0||strcmp($key,"nachname")==0||strcmp($key,"email")==0||strcmp($key,"telefon")==0){
                    if(strcmp($key,"erstelldatum")==0){
                        ?><hr />
                        <p>erstellt am <?=date('d.m.Y H:i:s',strtotime($data));?><?php
                    }elseif(strcmp($key,"vorname")==0){
                        ?>
                         von <?=$data;?>
                        <?php
                    }elseif(strcmp($key,"nachname")==0){
                        ?>
                         <?=$data;?></p><?php
                    }elseif(strcmp($key,"email")==0){
                        ?>
                        <hr />
                        <h3 class="right">Kontaktdaten:</h4>
                        <p class="right">Email: <?=$data;?></p><?php
                        }elseif(strcmp($key,"telefon")==0){
                        ?>
                        <p class="right">Telefon: <?=$data;?></p><?php
                    }
                }
            }
                ?>
                </div>
                <?php
            }

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