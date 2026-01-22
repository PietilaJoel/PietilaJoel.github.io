<?php
require_once "head.php";

// Oletetaan, että $recipe on jo haettu ennen tätä tiedostoa
// ja sisältää vähintään: id, name, added, username, category, ingredients, instructions
?>

<div class="center" id="home">
    <div class="recipes_single">
        <div class="recipeitem_single">

            <div id="content">

                <h3><?= htmlspecialchars($recipe["name"]) ?></h3>
                <p><small>
                    Lisätty: <?= htmlspecialchars($recipe["added"]) ?> |
                    Lisännyt: <?= htmlspecialchars($recipe["username"]) ?>
                </small></p>

                <p><strong>Kategoria:</strong> <?= htmlspecialchars($recipe["category"]) ?></p>
                <p><strong>Ainesosat:</strong> <?= nl2br(htmlspecialchars($recipe["ingredients"])) ?></p>
                <p><strong>Valmistusohjeet:</strong> <?= nl2br(htmlspecialchars($recipe["instructions"])) ?></p>

                <?php if (isset($recipe['recipe_id'])): ?>
                    <a href="/pdf?id=<?= $recipe['recipe_id'] ?>">Luo PDF</a>
                <?php else: ?>
                    <p style="color:red;">Reseptin ID puuttuu – PDF ei ole saatavilla.</p>
                <?php endif; ?>

            </div>

        </div>
    </div>
</div>
