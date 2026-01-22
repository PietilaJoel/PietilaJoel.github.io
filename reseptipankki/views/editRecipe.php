<?php
require "views/head.php";
?>
<div class="center">
<div class="recipeitem">
<h3>Voit muokata reseptiäsi täällä:</h3>
<form action="/update_recipe" method="post">
<label for="category">Kategoria:</label>
    <br>
    <select id="category" name="category">
        <option value=""></option>
        <option value="Aamiainen" <?= htmlspecialchars($category) == "Aamiainen" ? "selected" : "" ?>>Aamiainen</option>
        <option value="Päivällinen" <?= htmlspecialchars($category) == "Päivällinen" ? "selected" : "" ?>>Päivällinen</option>
        <option value="Välipala" <?= htmlspecialchars($category) == "Välipala" ? "selected" : "" ?>>Välipala</option>
        <option value="Lounas" <?= htmlspecialchars($category) == "Lounas" ? "selected" : "" ?>>Lounas</option>
        <option value="Illallinen" <?= htmlspecialchars($category) == "Illallinen" ? "selected" : "" ?>>Illallinen</option>
        <option value="Jälkiruoka" <?= htmlspecialchars($category) == "Jälkiruoka" ? "selected" : "" ?>>Jälkiruoka</option>
    </select>
    <br><br>
    <label for="name">Ruuan nimi:</label>
    <br>
    <input type="text" id="name" name="name" value = <?= $name ?>></input>
    <br><br>
    <label for="ingredients">Ainesosat:</label>
    <br>
    <textarea type="text" id="ingredients" rows="4" name="ingredients"><?= $ingredients ?></textarea>
    <br>
    <label for="instructions">Valmistusohje:</label>
    <br>
    <textarea type="text" id="instructions" rows="4" name="instructions"><?= $instructions ?></textarea>
    <br><br>
    <input type="hidden" name="recipe_id" value="<?= htmlspecialchars($id) ?>">
    <input type="submit" value="Muokkaa" class="button"></input> | <a class="button" href="/home"><button class="button">Peruuta</button></a>
</div>
</div>