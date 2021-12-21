<?php

require_once 'includes/funktionen.inc.php';
    session_start();
    
    // Prüfe alle Benutzer, ob einer mit den übergebenen Daten übereinstimmt
        $db = get_db_connection();
        $fehler="";
        
    if(empty(trim($_POST['benutzername'])) || empty(trim($_POST['passwort']))){

        $fehler = "Benutzername oder Passwort fehlt!";

    }else{

        $abfrage = $db->query('SELECT * FROM personen b WHERE b.anmeldename ="'.$_POST['benutzername'].'" AND b.passwort = "'.$_POST['passwort'].'"');
        $result = $abfrage->fetch();
        
        if($result['anmeldename'] === $_POST['benutzername'] && $result['passwort'] === $_POST['passwort']){
			logge_ein($result['anmeldename']);
        }else{

        }

    }
    
    /*
     * Leite zu index.php um. Der Besucher wird entweder das Login-Formular
     * sehen, wenn die Daten falsch waren, oder das Hauptmenu, wenn der Login
     * erfolgreich war. 
     */
    header("Location: index.php?fehlermeldung=$fehler");
?>