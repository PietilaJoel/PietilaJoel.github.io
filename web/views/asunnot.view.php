<?php require "partials/head.php"; ?>

<h2 class="centered">Katso asuntoja</h2>
<h2 class="centered">Asunnot</h2>

<div class = "apartments">
<?php
    foreach($apartments as $apartment): ?>
        <div class='apartment' onClick="window.location='/asunnot?id=<?=$apartment['apartmentID']?>'">
        <img class="apartment-img-s" src="<?=$apartment["img(url)"]?>"></img>
        <div class="info">
        <h3><?=$apartment["price"] ?></h3>
        <p><?=$apartment["location"]?></p>
        <p>Esittely: <?=$apartment["presentation"]?></p>
        <p>Koko: <?=$apartment["area_m2"]?> m²</p>
        </div>
        <?php
        if(isLoggedIn() && (($apartment["landlordID"] == $_SESSION["userid"]) || $_SESSION['username']=="admin")):
            $id = $apartment['apartmentID'];
            $apartmentid = 'deleteApartment' . $id; ?>
            <a id=<?=$apartmentid ?> onClick='confirmDelete(<?=$id?>)' href='/poista?id=<?=$id?>'>Poista</a> | 
            <a href='/update_article?id=<?=$id?>'>Päivitä</a>
        <?php endif; ?>
        </div>
    <?php endforeach ?>
</div>

<?php require "partials/footer.php"; ?>