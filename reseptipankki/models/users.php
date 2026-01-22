<?php
require_once "libraries/auth.php";
require_once "dbfunctions.php";

function addUser($firstname, $lastname, $username, $password, $email, $birthday) {
    $pdo = connect();
    $hashedpassword = hashPassword($password);
    $data = [$firstname, $lastname, $username, $hashedpassword, $email, $birthday];
    $sql = "INSERT INTO users (firstname, lastname, username, password_hash, email, bday) VALUES(?,?,?,?,?,?)";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}

function login($username, $password){
    $pdo = connect();
    $sql = "SELECT * FROM users WHERE username=?";
    $stm = $pdo->prepare($sql);
    $stm->execute([$username]);
    $user = $stm->fetch(PDO::FETCH_ASSOC);
    $hashedpassword = $user["password_hash"];

    if($hashedpassword && password_verify($password, $hashedpassword))
        return $user;
    else
    return false;
}

function updateUser($username, $firstname, $lastname, $birthday){
    $pdo = connect();
    $user_id = $_SESSION['user_id'];
    $data = [$username, $firstname, $lastname, $birthday, $user_id];
    $sql = "UPDATE users SET username = ?, firstname = ?, lastname = ?, bday = ? WHERE user_id = ?";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}


function getUserById($id){
    $pdo = connect();
    $sql = "SELECT * FROM users WHERE user_id=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$id]);
    $all = $stm->fetch(PDO::FETCH_ASSOC);
    return $all;
}