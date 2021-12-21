<?php

    function hole_eintraege()
    {
        $db_connection = get_db_connection();
        $query = "SELECT artikel.bezeichnung, artikel.beschreibung, artikel.preis, zustand.name, artikel.erstelldatum, personen.vorname, personen.nachname, personen.email, personen.telefon FROM artikel JOIN personen ON personen.id = artikel.personen_id JOIN zustand ON zustand.id = artikel.zustand_id";
        $statement = $db_connection->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function get_db_connection()
    {
    $database = "secondhand";
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $port = "3306";
    $db_connection = new PDO("mysql:host=$host;dbname=$database;port=$port",$user,$pwd);
    
    return $db_connection;
    }
    
    
    function ist_eingeloggt() {
    $erg = false;
    if (isset($_SESSION['eingeloggt'])) {
        if (!empty($_SESSION['eingeloggt']))
            $erg = true;
        }
    return $erg;
    }
    
    function logge_ein($benutzername) {
    $_SESSION['eingeloggt'] = $benutzername;
#    $_SESSION['id'] = get_benutzer_id($benutzername);
}


function getZustand()
{
    $db_con = get_db_connection();
    $query = "SELECT zustand.id, zustand.name FROM zustand";
    $statement = $db_con->query($query);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}


function speichereEintrag($eintrag) {

    $db = get_db_connection();
    var_dump($eintrag);
    var_dump($_SESSION);
    echo get_benutzer_id($_SESSION['eingeloggt']);

    $query = "INSERT INTO artikel(bezeichnung, beschreibung, preis, erstelldatum, personen_id, zustand_id) VALUES ('".$eintrag['bezeichnung']."','".$eintrag['beschreibung']."',".$eintrag['preis'].",'".date("Y-m-d H:i:s",$eintrag['erstellt_am'])."',".get_benutzer_id($_SESSION['eingeloggt']).",".$eintrag['zustand'].")";

    #echo $query;

    $db->query($query);

}

#function get_user_login($username,$passwort){
#    $db_connection = get_db_connection();

    #$query = "SELECT benutzer.benutzername, benutzer.passwort FROM benutzer WHERE benutzer.benutzername = '$username'";
    #SELECT COUNT(benutzer.benutzername) FROM benutzer WHERE benutzer.benutzername = '$username' AND benutzer.passwort = '$passwort'
#    $query = "SELECT COUNT(person.email) FROM person WHERE person.email = '$username' AND person.passwort = '$passwort'";
#    $statement = $db_connection->query($query);
#    $daten = $statement->fetch();
#    return (bool)$daten;
#}

function get_benutzer_id($username){
    $db_connection = get_db_connection();

    $query = "SELECT personen.id FROM personen WHERE personen.anmeldename = '$username'";
    $statement = $db_connection->query($query);
    $daten = $statement->fetch(PDO::FETCH_ASSOC);
    return $daten['id'];
}

function logge_aus() {
    unset($_SESSION['eingeloggt']);
#    unset($_SESSION['id']);
}


#function loeschen($beitrag_id)
#{
#    $db_connection = get_db_connection();
#    $query = "DELETE FROM artikel WHERE bezeichnung='$beitrag_id'";
#    $db_connection->query($query);
#}
 
?>