<?php
/**
 * Ottaa yhteyden tietokantaan, palauttaa 
 * pdo-olion.
 * 13.2.2023/EM
 */
//function connect() {
//    $servername = "joepie24.treok.io";
//    $username = "joepie24_kassa";
//    $password = "qw%$,ny#jfaHdnR~";
//    $port = 3306;
//    $dbname = "joepie24_reseptipankki";
//    $connectionString = "mysql:host=$servername;dbname=$dbname;port=$port;charset=utf8";
//    try {       
//        $pdo = new PDO($connectionString, $username, $password);
//        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        return $pdo;
//} catch (PDOException $e){
//        echo "Virhe tietokantayhteydessä: " . $e->getMessage();
//        die();
//}
//}

function connect() {

    $host = getenv('DB_HOST', true) ?: "joepie24.treok.io";
    $port = getenv('DB_PORT', true) ?: 3306; 
    $dbname = getenv('DB_NAME', true) ?: "joepie24_reseptipankki";
    $user = getenv('DB_USERNAME', true) ?: "joepie24_kassa"; 
    $password = getenv('DB_PASSWORD', true) ?: "qw%$,ny#jfaHdnR~"; 

    $connectionString = "mysql:host=$host;dbname=$dbname;port=$port;charset=utf8";


    try {       
            $pdo = new PDO($connectionString, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
    } catch (PDOException $e){
            echo "Virhe tietokantayhteydessä: " . $e->getMessage();
            die();
    }
}