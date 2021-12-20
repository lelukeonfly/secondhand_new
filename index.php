<?php
    require_once 'includes/funktionen.inc.php';
    session_start();
    $blogeintraege = hole_eintraege();
    //var_dump($blogeintraege);
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
                    }else{
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