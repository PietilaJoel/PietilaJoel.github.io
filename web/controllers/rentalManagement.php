<?php
require_once "database/models/apartment.php";
require_once 'libraries/cleaners.php';


function viewRentalController() {
    if (!isset($_SESSION["userid"])) {
        header("Location: /");
        exit;
    }

    $user = getUserById($_SESSION["userid"]);
    require "views/vuokrahakemus.view.php";
}

function addRentalController(){
    echo "joo";
    if(isset($_POST['duration'], $_POST['rent_start'], $_POST['occupants'], $_POST['pets'])){
        $duration = cleanUpInput($_POST['duration']);
        $rent_start = cleanUpInput($_POST['rent_start']);
        $occupants = cleanUpInput($_POST['occupants']);
        $pets = cleanUpInput($_POST['pets']);  
        $userID = $_SESSION["userid"];
        $apartmentID = $apartments["apartmentid"];
        addRental($userID, $apartmentID, $duration, $rent_start, $occupants, $pets); 
        header("Location: /");
    } else {
        
    }
}