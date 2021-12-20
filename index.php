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
    
    <div class="blog">
        
        <div class="header">
            <h1>Secondhand</h1>
        </div>



        <?php
            foreach($blogeintraege as $key => $blogeintrag){
                ?>
                <div class="blog-eintrag">
                <?php
                foreach($blogeintrag as $key => $data){
                    if(strcmp($key,"bezeichnung")==0){
                        ?>
                        <h1><?=$data;?></h1>
                        <?php

                    }elseif (strcmp($key,"preis")==0) {
                    ?>
                    <p><?=$data;?> €</p>
                    <?php
                }

                elseif(strcmp($key,"erstelldatum")==0||strcmp($key,"vorname")==0||strcmp($key,"nachname")==0||strcmp($key,"email")==0||strcmp($key,"telefon")==0){
                    if(strcmp($key,"erstelldatum")==0){
                        ?>
                        <p>erstellt am <?=$data;?>
                        <?php
                    }
                    elseif(strcmp($key,"vorname")==0){
                        ?>
                         von <?=$data;?>
                        <?php
                    }
                    elseif(strcmp($key,"nachname")==0){
                        ?>
                         <?=$data;?></p>
                        <?php
                    }elseif(strcmp($key,"email")){
                        ?>
                        <p>Email: <?=$data;?></p>
                        <?php
                        }
                    elseif(strcmp($key,"telefon")==0){
                        ?>
                        <p>Telefon: <?=$data;?></p>
                        <?php
                    }
                    
                    ?>
                    <?php
                }
                    
                
                else{
                    ?>
                    <p><?=$data;?></p>
                    <?php
                }
            }
                ?>
                
                </div>
                <?php
            }
        ?>



<!--         <div class="blog-eintrag">

            <h1>Titel</h1>
            <p>content</p>

        </div>

        <div class="blog-eintrag">

            <h1>Titel</h1>
            <p>content</p>

        </div>

       <div class="blog-eintrag">

            <h1>Titel</h1>
            <p>content</p>

        </div>

        <div class="blog-eintrag">

            <h1>Titel</h1>
            <p>content</p>

        </div>-->

        <div class="login">
            <form action="#" method="POST">
                <input type="text" name="username" id="username" placeholder="username">
                <input type="text" name="username" id="username" placeholder="password">
                <input type="submit" value="login">
            </form>
        </div>



    </div>

</body>
</html>