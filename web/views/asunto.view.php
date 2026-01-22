<?php require "partials/head.php"; ?>
<div class="apartmentos">
<div class='apartmento'>
<div class="asunto-content">
<img class="apartment-img-l" src="<?=$apartment["img(url)"] ?>"></img>
        <h3><?=$apartment["price"] ?></h3>
        <p><?=$apartment["location"]?></p>
        <p><?=$apartment["description"]?><p>
        <p>Esittely: <?=$apartment["presentation"]?></p>
        <p>Koko: <?=$apartment["area_m2"]?></p>
        <p>Huoneita: <?=$apartment["room_count"]?></p>
        <p>Kerros: <?=$apartment["floor"]?></p>
</div>
<div class="rent-form-button" onClick="window.location='/vuokrahakemus?id=<?=$apartment['apartmentID']?>'">Tee vuokraushakemus</div>
</div>
        <?php
        if(isLoggedIn() && ($apartment["landlordID"] == $_SESSION["userid"] || $_SESSION['username']=="admin")):
            $id = $apartment['apartmentID'];
            $newsid = 'deleteNews' . $id; ?>
            <a id=<?=$newsid ?> onClick='confirmDelete(<?=$id?>)' href='/poista?id=<?=$id?>'>Poista</a> | 
            <a href='/update_article?id=<?=$id?>'>Päivitä</a>
        <?php endif; ?>
        </div>
        </div>
<?php
require "partials/footer.php"; 
?>