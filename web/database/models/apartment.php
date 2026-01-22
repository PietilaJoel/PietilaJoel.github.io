<?php
require_once "database/connection.php";


function getAllApartments(){
    $pdo =connectDB();
    $sql = "SELECT * FROM Apartment";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

function addApartments($location, $desc, $price, $area_m2, $room_count, $floor, $presentation, $image) {
    $pdo =connectDB();
    $presentation = date("Y/m/d");
    $data = [$location, $desc, $price, $area_m2, $room_count, $floor, $presentation, $image, $_SESSION["userid"]];
    $sql = "INSERT INTO Apartment (`location`, `description`, `price`, `area_m2`, `room_count`, `floor`, `presentation`, `img(url)`, landlordID) VALUES(?,?,?,?,?,?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function getApartmentById($id){
    $pdo = connectDB();
    $sql = "SELECT * FROM Apartment WHERE apartmentID=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$id]);
    $all = $stm->fetch(PDO::FETCH_ASSOC);
    return $all;
}

function updateApartment($id, $location, $desc, $price, $area_m2, $room_count, $floor, $image){
    $pdo = connectDB();
    $data = [$location, $desc, $price, $area_m2, $room_count, $floor, $image, $id];
    $sql = "UPDATE Apartment SET `location` = ?, `description` = ?, price = ?, area_m2 = ?, room_count = ?, floor = ?, `img(url)` = ? WHERE apartmentID = ?";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}

function deleteApartment($id){
    $pdo = connectDB();
    $sql = "DELETE FROM Apartment WHERE apartmentID=?";
    $stm=$pdo->prepare($sql);
    return $stm->execute([$id]);
}