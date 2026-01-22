<?php
require_once "database/models/users.php";
require_once 'libraries/cleaners.php';

function registerController(){
    if(isset($_POST['fname'], $_POST['lname'], $_POST['uname'], $_POST['pword'])){
        $lastname = cleanUpInput($_POST['fname']);
        $firstname = cleanUpInput($_POST['lname']);
        $username = cleanUpInput($_POST['uname']);
        $password = cleanUpInput($_POST['pword']);

        try {
            addUser($firstname, $lastname, $username, $password);
            header("Location: /login"); 
        } catch (PDOException $e){
            echo "Virhe tietokantaan tallennettaessa: " . $e->getMessage();
        }
    } else {
        require "views/register.view.php";
    }
}

function loginController(){
    if(isset($_POST['username'], $_POST['password'])){
        $username = cleanUpInput($_POST['username']);
        $password = cleanUpInput($_POST['password']);

        $result = login($username, $password);
        if($result){
            $_SESSION['username'] = $result['uname'];
            $_SESSION['userid'] = $result['userID'];
            $_SESSION['session_id'] = session_id();
            header("Location: /");
        } else {
            echo "<p class='text-danger'>väärä salasana tai nimi</p>";
        }
    } else {
        1+1;
    }
}

function logoutController(){
    session_unset(); //poistaa kaikki muuttujat
    session_destroy();
    setcookie(session_name(),'',0,'/'); //poistaa evästeen selaimesta
    echo "<script>window.location = '/'</script>";
    //session_regenerate_id(true);
    //header("Location: /"); // forward eli uudelleenohjaus
    die();
}

//profiilin näyttäminen
function viewProfileController(){
    $user = getUserInfo();
    require "views/profile.view.php";    
}