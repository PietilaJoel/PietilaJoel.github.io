<?php require_once "head.php"; ?>

<div class="center" id="home">
    <div class="recipes">
        <?php foreach($allrecipes as $recipe): ?>
            <div class="recipeitem" onClick="window.location='/home?id=<?=$recipe['recipe_id']?>'">
    <h3><?= htmlspecialchars($recipe["name"]) ?></h3>
    <p><small>Lisätty: <?=$recipe["added"]?> | Lisännyt: <?=htmlspecialchars($recipe["username"])?></small></p>
    <p><strong>Kategoria:</strong> <?=htmlspecialchars($recipe["category"])?></p>
    <?php if (isLoggedIn() && $recipe["user_id"] == $_SESSION["user_id"]): 
        $id = $recipe["recipe_id"];
        $recipeid = 'deleteRecipe' . $id;
    ?>
        <a id="<?=$recipeid?>"onclick="return confirm('Poistetaanko resepti?')" href="/delete_recipe?id=<?=$id?>"><button class="button">Poista</button></a> |
        <a href="/update_recipe?recipe_id=<?=$id?>"><button class="button">Muokkaa</button></a>
    <?php endif; ?>
</div>
        <?php endforeach; ?>
    </div>
</div>

<?php require "footer.php"; ?>