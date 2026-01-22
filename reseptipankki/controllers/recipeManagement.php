<?php
require_once "models/recipe.php";
require_once "libraries/cleaners.php";

function viewRecipesController(){
    if (isset($_GET["id"])) {
        $recipe = getRecipeById($_GET["id"]);
        require "views/recipe.php";
    } else {
        $allrecipes = getAllRecipes();
        if (!$allrecipes) $allrecipes = []; // Varmistetaan että ei jää nulliksi
        require "views/home.php";
    }
}

function pdfCOntroller() {
    require "pdf/download_pdf.php";
}


function addRecipeController() {
    try {
        if (isset($_POST["name"], $_POST["category"], $_POST["ingredients"], $_POST["instructions"])) {
            $name = cleanUpInput($_POST["name"]);
            $category = cleanUpInput($_POST["category"]);
            $ingredients = cleanUpInput($_POST["ingredients"]);
            $instructions = cleanUpInput($_POST["instructions"]);
//          $id = cleanUpInput($_POST["recipe_id"]);
            $id = $_SESSION["user_id"];
            addRecipe($name, $category, $ingredients, $instructions, $id);
            header("Location: /home");
        } else {
            require "views/newRecipe.php";
        }
    } catch (PDOException $e) {
        echo "Virhe reseptiä lisättäessä: " . $e->getMessage();
    }
}


function editRecipeController(){
    try {
        if(isset($_GET["recipe_id"])){
            $id = cleanUpInput($_GET["recipe_id"]);
            $recipes = getRecipeById($id);
 //         var_dump($recipes);
        } else {
            echo "Virhe: id puuttuu ";
        }
    } catch (PDOException $e){
        echo "Virhe reseptiä haettaessa: " . $e->getMessage();
    }

    if($recipes){
        $id = $recipes['recipe_id'];
        $name = $recipes['name'];
        $category = $recipes['category'];
        $ingredients = $recipes['ingredients'];
        $instructions = $recipes['instructions'];
        require 'views/editRecipe.php';


} else {
    header("Location: /home");
    exit;
}
}

function updateRecipeController(){
    if(isset($_POST["category"], $_POST["name"], $_POST["ingredients"], $_POST["instructions"], $_POST["recipe_id"])){
        $category = cleanUpInput($_POST["category"]);
        $name = cleanUpInput($_POST["name"]);
        $ingredients = cleanUpInput($_POST["ingredients"]);
        $instructions = cleanUpInput($_POST["instructions"]);
        $id = cleanUpInput($_POST["recipe_id"]);
        updateRecipe($name, $category, $ingredients, $instructions, $id);
        header("Location: /home");
    } else {
        header("Location: /home");
        exit;
    }
}

function deleteRecipeController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            deleteRecipe($id);
        } else {
            echo "Virhe: id puuttuu";
        }
    } catch (PDOException $e){
        echo "Virhe arvostelua poistaessa: " . $e->getMessage();
    }

    $allrecipes = getAllRecipes();

    header("Location: /home");
    exit;
}