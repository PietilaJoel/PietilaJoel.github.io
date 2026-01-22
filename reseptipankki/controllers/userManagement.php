<?php
require "models/users.php";
require_once "libraries/cleaners.php";

function viewUserController(){
    require "views/userpage.php";
}

function updateUserController(){
    if(isset($_POST['username_edit'], $_POST['firstname_edit'], $_POST['lastname_edit'], $_POST['birthday_edit'])){
        $username = cleanUpInput($_POST['username_edit']);
        $firstname = cleanUpInput($_POST['firstname_edit']);
        $lastname = cleanUpInput($_POST['lastname_edit']);
        $birthday = cleanUpInput($_POST['birthday_edit']);

        try {
            updateUser($username, $firstname, $lastname, $birthday);
            require "views/userpage.php";
        } catch (PDOException $e){
            echo "Virhe tietokantaan tallennettaessa: " . $e->getMessage();
        }
    } else {
        require "views/userpage.php";
    }
}

function registerController(){
    if(isset($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['bday'])){
        $firstname = cleanUpInput($_POST['firstname']);
        $lastname = cleanUpInput($_POST['lastname']);
        $username = cleanUpInput($_POST['username']);
        $password = cleanUpInput($_POST['password']);
        $email = cleanUpInput($_POST['email']);
        $birthday = cleanUpInput($_POST['bday']);

        $birthDate = new DateTime($birthday);
        $today = new DateTime();
        $age = $today->diff($birthDate)->y;

        if ($age < 15) {
            $error = "Sinun täytyy olla yli 15-vuotias.";
            require "views/signup.php";
            return;
        }


        try {
            addUser($firstname, $lastname, $username, $password, $email, $birthday);
            header("Location: /login");
            exit;
        } catch (PDOException $e){
            echo "Jotain meni vikaan." . $e->getMessage();
        }
    } else {
        require "views/signup.php";
    }
}

function loginController(){
    if(isset($_POST['username'], $_POST['password'])){
        $username = cleanUpInput($_POST['username']);
        $password = cleanUpInput($_POST['password']);

        $result = login($username, $password);
        if($result){
            $_SESSION['username'] = $result['username'];
            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['session_id'] = session_id();
            header("Location: /home");
        } else {
                require "views/login.php";
        }
    } else {
        require "views/login.php";
    }
}

function logoutController(){
    session_unset();
    session_destroy();
    setcookie(session_name(), '',0,'/');
    session_regenerate_id(true);
    header("Location: /login");
    die();
}