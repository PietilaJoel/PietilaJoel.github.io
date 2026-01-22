<?php

function addRental($userID, $apartmentID, $duration, $rent_start, $occupants, $pets){
    $pdo = connectDB();
    $data = [$title, $text, $time, $removetime, $userid];
    $sql = "INSERT INTO Rental (userID, apartmentID, duration, rent_start, occupants, pets) VALUES(?,?,?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}