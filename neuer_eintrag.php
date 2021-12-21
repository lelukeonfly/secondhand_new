<?php
    require_once 'includes/funktionen.inc.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/master.css" type="text/css">
    <title>neuer eintrag</title>
</head>
<body>
    <main>
        <div class="header">
            <h1>Secondhand</h1>
        </div>

        <div class="blog-eintrag">
            <form action="fw_trage_ein.php" method="POST">
                <input type="text" name="bezeichnung" placeholder="Bezeichnung" required="required" />
                <textarea name="beschreibung" id="content" cols="30" rows="10" placeholder="Beschreibung" required="required" /></textarea>
                <input type="number" name="preis" id="preis" placeholder="Preis" required="required" />
                <select name="zustand" id="zustand" required="required" />
                <?php
                    foreach(getZustand() as $zustand){
                        ?><option value="<?=$zustand['id'];?>"><?=$zustand['name'];?></option><?php
                    }
                ?>
                </select>
                <input type="submit" value="eintragen" name="submit" required="required" />
            </form>
        </div>
    </main>

</body>
</html>