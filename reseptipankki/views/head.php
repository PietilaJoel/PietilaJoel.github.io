<!DOCTYPE html>
<html lang="fi">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/reseptiivii.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Reseptipankki</title>
</head>
<body>
<nav class="navbar">
    <?php if(isLoggedIn()): ?>
<span class="hei">Hei, <a href="/userpage" class="welcome"><?= htmlspecialchars($_SESSION['username']) ?>!</a></span>
<h2 class="hei">Tervetulemasta</h2>
    <?php endif; ?>
    <a href="/home" class="navbutton">Etusivu</a>
    <?php if (isLoggedIn()):?>
    <a href="/add_recipe" class="navbutton">Lisää resepti</a>
    <a href="/logout" class="navbutton">Kirjaudu ulos</a>
  <?php else: ?>
    <a href="/login" class="navbutton">Kirjaudu sisään</a>
  <?php endif; ?>
</nav>

        <div class="mobile-container">
            <div class="mobile-topnav">
                    <a href="/home" class="active">Etusivu</a>
                <div id="Navigation">
                    <?php if (isLoggedIn()):?>
                    <a href="/add_recipe">Lisää resepti</a>
                      <a href="/logout">Kirjaudu ulos</a>
                    <?php else: ?>
                      <a href="/login">Kirjaudu sisään</a>
                    <?php endif; ?>
                </div>
                <a href="javascripy:void(0);" class="icon" onclick="mobileMenuFunction()">
                    <i id="menu-icon" class="fa fa-bars"></i>
                </a>
            </div>
            <script>
                function mobileMenuFunction() {
                    var nav = document.getElementById("Navigation");
                    var icon = document.getElementById("menu-icon");
                    if (nav.style.display === "block") {
                        nav.style.display = "none";
                        icon.classList.remove("fa-times");
                        icon.classList.add("fa-bars");
                    } else {
                        nav.style.display = "block";
                        icon.classList.remove("fa-bars");
                        icon.classList.add("fa-times");
                    }
                }
            
            </script>