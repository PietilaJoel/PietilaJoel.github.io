<?php
require_once "dbfunctions.php";

function getAllRecipes(){
    $pdo = connect();
    $sql = "SELECT recipes.*, users.username
            FROM recipes
            JOIN users ON recipes.user_id = users.user_id
            ORDER BY recipes.added DESC";
    $stm = $pdo->query($sql);
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

function addRecipe($name, $category, $ingredients, $instructions, $id) {
    $pdo = connect();
    $data = [$name, $category, $ingredients, $instructions, $id];
    $sql = "INSERT INTO recipes (`name`, `category`, `ingredients`, `instructions`, `user_id`) VALUES (?,?,?,?,?)";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}

function getRecipeById($id){
    $pdo = connect();
    $sql = "SELECT recipes.*, users.username FROM recipes 
            JOIN users ON recipes.user_id = users.user_id
            WHERE recipe_id = ?";
    $stm = $pdo->prepare($sql);
    $stm->execute([$id]);
    return $stm->fetch(PDO::FETCH_ASSOC);
}


function deleteRecipe($id){
    $pdo = connect();
    $sql = "DELETE FROM recipes WHERE `recipes`.`recipe_id`=?";
    $stm = $pdo->prepare($sql);
    return $stm->execute([$id]);
}

function updateRecipe($name, $category, $ingredients, $instructions, $id){
    $pdo = connect();
    $data = [$name, $category, $ingredients, $instructions, $id];
    $sql = "UPDATE recipes SET `name`=?, `category`=?, `ingredients`=?, `instructions`=? WHERE recipe_id=?";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}