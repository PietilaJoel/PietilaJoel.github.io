<?php
require_once "database/models/apartment.php";
require_once 'libraries/cleaners.php';


function viewAsunnotController(){
    //valittu asunto
    if(isset($_GET["id"])){
        $apartment = getApartmentById($_GET["id"]);
        require "views/asunto.view.php";
    } else {
        //kaikki asunnot
        $apartments = getAllApartments();
        require "views/asunnot.view.php";    
    }
}

function deleteAsuntoController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            deleteApartment($id);
            echo "<script>window.location = 'asunnot'</script>";
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe uutista poistettaessa: " . $e->getMessage();
    }
}