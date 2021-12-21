<?php
    require_once 'includes/funktionen.inc.php';
    session_start();
    #var_dump($_POST);

    #echo "<br>";
    #echo get_benutzer_id('hmair');
    
    /*
     * Wenn der Benutzer nicht eingeloggt ist oder die Seite nicht
     * über POST aufgerufen, also das Formular nicht abgeschickt wurde, 
     * leite auf index.php um. 
     */
    if ( (! ist_eingeloggt()) || (empty($_POST)) ) {
        header('Location: index.php');
        exit;
    }
    
    // Erstelle einen neuen Eintrag im Format der anderen Einträge
    $eintrag = array(
        'bezeichnung'       => trim($_POST['bezeichnung']),
        'beschreibung'      => trim($_POST['beschreibung']),
        'preis'      => trim($_POST['preis']),
        'zustand'      => trim($_POST['zustand']),
        'erstellt_am' => time()
    );
    
    speichereEintrag($eintrag);

        if(isset($_POST['submit'])){
        $file = $_FILES['file'];

        #var_dump($file);

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExtension = explode('.', $fileName);
        $fileActualExtension = strtolower(end($fileExtension));

        #echo $fileActualExtension;

        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($fileActualExtension, $allowedTypes)) {
            if ($fileError === 0) {
                #1000000 = 1MB
                if ($fileSize < 1000000) {
                    $fileNameNew = getBlogId().".".$fileActualExtension;
                    #echo $fileNameNew;
                    $fileDestination = 'image/'.$fileNameNew;
                    #echo $fileDestination;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    #header("Location:index.php?uploadsuccess");
                }else{
                    #echo "too big";
                }
            }else{
                #echo "Uploading error";
            }
        }else{
            #echo "wrong type";
        }
    }

?>
<!DOCTYPE html>

<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/master.css" type="text/css" rel="stylesheet" />
    <title>Weblog - Eintrag speichern</title>
</head>

<body>
    
    <div id="blog-eintrag">
    
        <div id="header">
            <h1>Mein Weblog</h1>
        </div>
        
        <div>
            
            <h3>Folgender Eintrag wurde erfolgreich gespeichert:</h3>
			<div>
            	<h1><?php echo htmlspecialchars($eintrag['bezeichnung']); ?></h1>
                <p>
                    <?php echo nl2br(htmlspecialchars($eintrag['beschreibung'])); ?>
                </p>
                <h1><?php echo htmlspecialchars($eintrag['preis']."€"); ?></h1>
                <p>
                    <?php echo nl2br(htmlspecialchars($eintrag['zustand'])); ?>
                </p>
                <p>
	                <a href="index.php">Zurück zur Hauptseite</a>
	            </p>
			</div>
        </div>
        
        <div id="menu">
            <?php require 'includes/menu.inc.php'; ?>
        </div>
            
    </div>

</body>

</html>