<?php
require "views/head.php"; $user = getUserById($_SESSION['user_id']);
?>

<div>
    <div class="center">
        <h2>Vaihda tietojasi</h2>
        </div>
        <div class="center">
        <form action="/user" method="post">
            <label for="username_edit">Käyttäjätunnus:</label>
            <div>
                <input type="text" name="username_edit" value="<?= $user ['username']?>">
            </div>
            <br><br>
            <label for="firstname_edit">Etunimi:</label>
            <div>
                <input type="text" name="firstname_edit" value="<?= $user['firstname']?>">
            </div>
            <br><br>
            <label for="lastname_edit">Sukunimi:</label>
            <div>
                <input type="text" name="lastname_edit" value="<?= $user['lastname']?>">
            </div>
            <br><br>
            <label for="birthday_edit">Syntymäpäivä:</label>
            <div>
            <input type="date" name="birthday_edit" value="<?= $user['bday']?>">
            </div>
            <br><br>
            <input type="submit" value="Vahvista">
        </form>
    </div>
</div>

<?php require "views/footer.php";
?>