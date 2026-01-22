<?php require "partials/head.php"; 

$apartment = getApartmentById($_GET['id']);

?>

<div class="d-flex justify-content-center">
    <form action="" method="post" class="rounded bg-light shadow border p-2 m-2 w-50">
        <h2>asunto ilmoitus:</h2>
        <label for="paikka">paikka</label>
        <input type="text" name="paikka" value="<?= $apartment["location"]?>" class="form-control">

        <label for="desc">description</label>
        <textarea name="desc" rows="4" cols="50" class="form-control"><?= $apartment["description"]?></textarea>

        <label for="price">price</label>
        <input type="text" name="price" value="<?= $apartment["price"]?>" class="form-control">

        <label for="area">area</label>
        <input type="text" name="area" value="<?= $apartment["area_m2"]?>" class="form-control">

        <label for="room_count">room count</label>
        <input type="number" name="room_count" value="<?= $apartment["room_count"]?>" class="form-control">

        <label for="kerros">kerros</label>
        <input type="number" name="kerros" value="<?= $apartment["floor"]?>" class="form-control">

        <label for="kuva">kuva url</label>
        <input type="text" name="kuva" value="<?= $apartment["img(url)"]?>" class="form-control">

        <input type="submit" class="from-control btn btn-primary mt-3">
    </form>
</div>

<?php require "partials/footer.php"; 

EditIlmoitusController();

?>