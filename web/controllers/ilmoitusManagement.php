<?php
require_once "database/models/apartment.php";
require_once 'libraries/cleaners.php';

function viewIlmoitusController(){
    require "views/ilmoitus.view.php";    
}

function addIlmoitusController(){
    if(isset($_POST['paikka'])){
        $paikka = cleanUpInput($_POST['paikka']);
        $desc = cleanUpInput($_POST['desc']);
        $price = cleanUpInput($_POST['price']);
        $area = cleanUpInput($_POST['area_m2']);
        $room_count = cleanUpInput($_POST['room_count']);
        $kerros = cleanUpInput($_POST['kerros']);
        $image = cleanUpInput($_POST['kuva']);
        $id = $_GET["id"];
        updateApartment($id, $paikka, $desc, $price, $area, $room_count, $kerros, $image); 
    } else {
        1+1;
    }
}

function viewDeleteController() {
    require "views/asunto_poistaminen.view.php"; 
}