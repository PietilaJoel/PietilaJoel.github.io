<?php
require_once "database/connection.php";

function addUser($firstname, $lastname, $username, $password){
    $pdo = connectDB();
    $hashedpassword = hashPassword($password);
    $data = [$firstname, $lastname, $username, $hashedpassword];
    $sql = "INSERT INTO User (fname, lname, uname, pword) VALUES(?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function login($username, $password){
    $pdo = connectDB();
    $sql = "SELECT * FROM User WHERE uname=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$username]);
    $user = $stm->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        return false;
    }
    $hashedpassword = $user["pword"];

    if(password_verify($password, $hashedpassword)) {
        return $user;
    } else {
        return false;
    }
}

function getUserInfo(){
    $id = 1;//huom testi kun kirjautuminen ei toiminnassa
    if(isset($_SESSION['userid'])){
        $id = $_SESSION['userid'];
    }
    $pdo = connectDB();
    $sql = "SELECT * FROM User WHERE userID=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$id]);
    $user = $stm->fetch(PDO::FETCH_ASSOC);
    var_dump($user);
    return $user;
}
function getUserById($id){
    $pdo = connectDB();
    $sql = "SELECT * FROM User WHERE userID=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$id]);
    $all = $stm->fetch(PDO::FETCH_ASSOC);
    return $all;
}

function updateUser($id, $fname, $lname, $password){
    $pdo = connectDB();
    $hashedpassword = hashPassword($password);;
    $data = [$fname, $lname, $hashedpassword, $id];
    $sql = "UPDATE User SET fname = ?, lname = ?, pword = ? WHERE userID = ?";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}