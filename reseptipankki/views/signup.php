<?php
require_once "models/dbfunctions.php";
require "views/head.php";
?>
<div class="center">
    <h2>Rekisteröidy</h2>
</div>
<div class="center">
<form action="/register" method="post">
    <label for="firstname">Etunimi:</label>
    <br>
    <input type="text" name="firstname" id="firstname">
    <br><br>
    <label for="lastname">Sukunimi:</label>
    <br>
    <input type="text" name="lastname" id="lastname">
    <br><br>
    <label for="email">Sähköposti</label>
    <br>
    <input type="text" name="email" id="email">
    <br><br>
    <label for="username">Luo käyttäjänimi:</label>
    <br>
    <input type="text" name="username" id="username">
    <br><br>
    <label for="password">Luo heikko salasana:</label>
    <br>
    <input type="password" name="password" id="password">
    <br><br>
    <label for="bday">Syntymäpäivä</label>
    <br>
    <input type="date" name="bday" id="bday">
    <br><br>
    <input type="submit" value="Rekisteröidy" class="button">
    <div class="center">
    <p>Onko sinulla jo tili? <a href="/login">Kirjaudu</a></p>
</div>
<?php if (!empty($error)): ?>
    <p class="error center"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</form>
</div>
<?php
require "views/footer.php";
?>
