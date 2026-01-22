<?php
require_once "models/dbfunctions.php";
require "head.php";
?>
<div class="center">
    <h2>Kirjaudu</h2>
</div>
<div class="center">
<form action="/login" method="post">
    <label for="username">Käyttäjätunnus:</label><br>
    <input type="text" name="username" id="username">
    <br><br>
    <label for="password">Salasana:</label><br>
    <input type="password" name="password" id="password">
    <br><br>
    <input type="submit" value="Kirjaudu" class="button">
    <div class="center">
        <p>Eikö sinulla ole vielä tiliä? <a href="/register">Rekisteröidy</a></p>
</form>
</div>