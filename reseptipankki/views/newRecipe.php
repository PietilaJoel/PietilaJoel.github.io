<?php
require "head.php";
?>
<div class="center">
<div class="recipeitem">
<h3>Voit lisätä uuden reseptin täällä:</h3>
<form action="/add_recipe" method="POST">
<label for="category">Kategoria:</label>
    <br>
    <select id="category" name="category" required>
        <option value=""></option>
        <option value="Aamiainen">Aamiainen</option>
        <option value="Päivällinen">Päivällinen</option>
        <option value="Välipala">Välipala</option>
        <option value="Lounas">Lounas</option>
        <option value="Illallinen">Illallinen</option>
        <option value="Jälkiruoka">Jälkiruoka</option>
    </select>
    <br><br>
    <label for="name">Ruuan nimi:</label>
    <br>
    <input type="text" id="name" name="name" requied></input>
    <br><br>
    <label for="ingredients">Ainesosat:</label>
    <br>
    <textarea type="text" id="ingredients" rows="4" name="ingredients" required></textarea>
    <br>
    <label for="instructions">Valmistusohje:</label>
    <br>
    <textarea type="text" id="instructions" rows="4" name="instructions" required></textarea>
    <br><br>
    <input type="submit" value="Lisää resepti" class="button"></input>
</div>
</div>