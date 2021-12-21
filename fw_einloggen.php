<?php

require_once 'includes/funktionen.inc.php';
    session_start();
    
    // Prüfe alle Benutzer, ob einer mit den übergebenen Daten übereinstimmt
        $db = get_db_connection();
        $fehler="";
        #var_dump($_POST);
        
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password']))){

        $fehler = "Benutzername oder Passwort fehlt!";

    }else{

        $abfrage = $db->query('SELECT * FROM personen b WHERE b.anmeldename ="'.$_POST['username'].'" AND b.passwort = "'.$_POST['password'].'"');
        $result = $abfrage->fetch();
        
        if($result['anmeldename'] === $_POST['username'] && $result['password'] === $_POST['passwort']){
			logge_ein($result['anmeldename']);
        }else{

        }

    }
    
    /*
     * Leite zu index.php um. Der Besucher wird entweder das Login-Formular
     * sehen, wenn die Daten falsch waren, oder das Hauptmenu, wenn der Login
     * erfolgreich war. 
     */
    if(empty($fehler)){
        header("Location: index.php");
    }else{
        header("Location: index.php?fehlermeldung=$fehler");
    }
?>