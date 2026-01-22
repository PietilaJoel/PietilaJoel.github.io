<!DOCTYPE html>
<html lang="fi">
<head>
    <title>PHP</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/asunnot.css" type="text/css">
    <script defer src="/js/main.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<script>
function confirmDelete(id) {
    const answer = confirm("Poistetaanko uutinen?");
    if(!answer){
        document.getElementById('deleteNews' + id).href = '/';
    }
    return answer;
}

function submitForm($form) {
    document.getElementById($form).submit();
}

</script>
<header class="d-flex flex-row p-2 justify-content-between">
    <button onclick="noNewTab('/etusivu')" class="header-button">
        <h3>Etusivu</h3>
    </button>
    <button class="header-button" onclick="window.location='/asunnot'">
        <h3>Asunnot</h3>
    </button>
    <?php
    if (isset($_SESSION["username"], $_SESSION["userid"])) {
        echo "
        <button onclick=\"noNewTab('ilmoitus')\" style='background: none; border: none;'>
            <h3>Tee asuntoilmoitus</h3>
        </button>
        <button onclick=\"noNewTab('kayttaja')\" style='background: none; border: none;'>
            <h3>".$_SESSION["username"]."</h3>
        </button>
        ";
    } else {
        echo "
        <button data-bs-toggle='modal' data-bs-target='#rModal' style=\"background: none; border: none;\">
            <h3>Rekisteröidy</h3>
        </button>
        <button data-bs-toggle='modal' data-bs-target='#exampleModal' style=\"background: none; border: none;\">
            <h3>Kirjaudu</h3>
        </button>
        ";
    }
    ?>
</header>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <div class="d-flex flex-row justify-content-between">
                <h1 class="modal-title fs-5" id="modalTitle">Kirjaudu sisään</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action="" method="post" class=" d-flex flex-column mx-5 p-2" id="editForm1">
            <label for="username">Käyttäjätunnus:</label>
            <input type="text" name="username" class="form-control" id="modalname">

            <label for="password">Salasana:</label>
            <input type="password" name="password" class="form-control" id="modalrating">

            <button type="submit" class="btn btn-primary form-control mt-2">Kirjaudu</button>
        </form>
        </div>
    </div>
  </div>
</div>


<div class="modal fade" id="rModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <div class="d-flex flex-row justify-content-between">
                <h1 class="modal-title fs-5" id="modalTitle">Rekisteröidy</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action="" method="post" class=" d-flex flex-column mx-5 p-2">
            <label for="fname_register">Etunimi:</label>
            <input type="text" name="fname_register" class="form-control">

            <label for="lname_register">Sukunimi:</label>
            <input type="text" name="lname_register" class="form-control">

            <label for="uname_register">Käyttäjätunnus:</label>
            <input type="text" name="uname_register" class="form-control">

            <label for="password_register">Salasana:</label>
            <input type="password" name="password_register" class="form-control">

            <button type="submit" class="btn btn-primary form-control mt-2">Rekisteröidy</button>
        </form>
        </div>
    </div>
  </div>
</div>

<?php


loginController();

if (isset($_POST["uname_register"], $_POST["password_register"])) {
    $fname = $_POST["fname_register"];
    $lname = $_POST["lname_register"];
    $uname = $_POST["uname_register"];
    $pword = $_POST["password_register"];

    $users = getAllUsers();
    $yes = true;
    foreach ($users as $user) {
        if ($uname == $user["uname"]) {
            $yes = false;
            echo "<p class='text-danger'>username on jo käytössä</p>";
            break;
        }
    }

    if ($yes) {
        addUser($fname, $lname, $uname, $pword);
    } else {
        echo "";
    }
}

?>
