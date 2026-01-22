<?php require "partials/head.php"; ?>

<div class="d-flex justify-content-center">
    <form action="" method="post" class="rounded bg-light shadow border p-2 m-2 w-50">
        <h2>Asunto ilmoitus:</h2>
        <label for="paikka">Sijainti:</label>
        <input type="text" name="paikka" class="form-control" required>

        <label for="desc">Kuvaus:</label>
        <textarea name="desc" rows="4" cols="50" class="form-control" require></textarea>

        <label for="price">Hinta/kk:</label>
        <input type="text" name="price" class="form-control" required>

        <label for="area_m2">Asuinpinta-ala:</label>
        <input type="text" name="area_m2" class="form-control" required>

        <label for="room_count">Huoneiden määrä:</label>
        <input type="number" name="room_count" class="form-control" required>

        <label for="floor">Kerros:</label>
        <input type="number" name="floor" class="form-control" required>

        <label for="presentation">Esittely:</label>
        <input type="date" name="presentation" class="form-control" required>

        <label for="img(url)">Kuva(url):</label>
        <input type="text" name="img(url)" class="form-control" required>

        <input type="submit" class="from-control btn btn-primary mt-3">
    </form>
</div>

<?php require "partials/footer.php"; 

addIlmoitusController()

?>