<?php require "partials/head.php"; $user = getUserById($_SESSION['userid'])?>

<div class="d-flex flex-row">
    <div class="rounded bg-light shadow border p-2 m-2 w-100 d-flex flex-column justify-content-between">
        <div>
            <h2><?= $_SESSION['username']?></h2>
            <p class="m-0"><?= $user['fname']?> <?= $user['lname']?></p>
        </div>
        <form action="" method="post" class=" w-100">
            <input type="submit" name="logout" value="kirjaudu ulos" class="from-control btn btn-danger">
        </form>
    </div>
    <div class="rounded bg-light shadow border p-2 m-2 w-100">
        <h2>Vaihda tietojasi</h2>
        <div class="d-flex justify-content-center">
        <form action="" method="post" class=" w-100">
            <label for="firstname_edit">firstname:</label>
            <div class="d-flex flex-row">
                <input type="text" name="firstname_edit" value="<?= $user['fname']?>" class="form-control w-50">
                <h3 class="w-50 text-center"><?= $user['fname']?></h3>
            </div>
            <label for="lastname_edit">lastname:</label>
            <div class="d-flex flex-row">
                <input type="text" name="lastname_edit" value="<?= $user['lname']?>" class="form-control w-50">
                <h3 class="w-50 text-center"><?= $user['lname']?></h3>
            </div>
            <label for="password_edit">password:</label>
            <div class="d-flex flex-row">
                <input type="text" name="password_edit" value="" class="form-control w-50">
                <h3 class="w-50 text-center">***</h3>
            </div>
            <input type="text" name="userid_edit" value="<?= $_SESSION['userid']?>" class="d-none">

            <input type="submit" value="vahvista" class="from-control btn btn-primary mt-3">
        </form>
</div>
    </div>
</div>

<?php require "partials/footer.php";
if (isset($_POST['logout'])) {
    logoutController();
}

updateContoller()


?>