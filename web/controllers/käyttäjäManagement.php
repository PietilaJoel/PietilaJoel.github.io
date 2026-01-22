<?php
require_once "database/models/apartment.php";
require_once 'libraries/cleaners.php';
require_once "database/models/users.php";

function viewKäyttäjäController(){
    require "views/käyttäjä.view.php";    
}

function updateContoller(){
    if(isset($_POST['firstname_edit'], $_POST['lastname_edit'], $_POST['password_edit'])){
        $userid = $_POST['userid_edit'];
        $firstname = cleanUpInput($_POST['firstname_edit']);
        $lastname = cleanUpInput($_POST['lastname_edit']);
        $password = cleanUpInput($_POST['password_edit']);

        try {
            updateUser($userid, $firstname, $lastname, $password);
            echo "<script>window.location = 'kayttaja'</script>";
        } catch (PDOException $e){
            echo "Virhe tietokantaan tallennettaessa: " . $e->getMessage();
        }
    } else {
        1+1;
    }
}