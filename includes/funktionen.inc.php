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


#function get_user_login($username,$passwort){
#    $db_connection = get_db_connection();

    #$query = "SELECT benutzer.benutzername, benutzer.passwort FROM benutzer WHERE benutzer.benutzername = '$username'";
    #SELECT COUNT(benutzer.benutzername) FROM benutzer WHERE benutzer.benutzername = '$username' AND benutzer.passwort = '$passwort'
#    $query = "SELECT COUNT(person.email) FROM person WHERE person.email = '$username' AND person.passwort = '$passwort'";
#    $statement = $db_connection->query($query);
#    $daten = $statement->fetch();
#    return (bool)$daten;
#}

#function get_benutzer_id($username){
#    $db_connection = get_db_connection();
#
#    $query = "SELECT person.email FROM person WHERE person.email = '$username'";
#    $statement = $db_connection->query($query);
#    $daten = $statement->fetch();
#    return $daten['email'];
#}

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