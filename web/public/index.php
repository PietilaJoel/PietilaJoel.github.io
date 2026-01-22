<?php
session_start();
set_include_path(dirname(__FILE__) . '/../');

$route = explode("?", $_SERVER["REQUEST_URI"])[0];
$method = strtolower($_SERVER["REQUEST_METHOD"]);

require_once 'libraries/auth.php';
require_once 'libraries/cleaners.php';
require_once 'controllers/userManagement.php';
require_once 'controllers/articleManagement.php';
require_once 'database/models/article.php';
require_once 'controllers/asunnotManagement.php';
require_once 'controllers/ilmoitusManagement.php';
require_once 'controllers/käyttäjäManagement.php';
require_once 'controllers/rentalManagement.php';


switch($route) {
    case "/":
        viewEtusivuController();
    break;

    case "/etusivu":
        viewEtusivuController();
    break;

    case "/asunnot":
        viewAsunnotController();
    break;

    case "/ilmoitus":
        viewIlmoitusController();
    break;

    case "/vuokrahakemus":
        viewRentalController();
    break;

    case "/vuokrahakemus_submit":
        if ($SERVER["REQUEST_METHOD"] === "POST") {
            addRentalController();
        } else {
            viewRentalController();
        }
    break;


    case "/kayttaja":
        if (isLoggedIn()) {
            viewKäyttäjäController();
        } else {
            header("Location: /");
        }
    break;

    case "/poista":
        viewDeleteController();
    break;

    case "/update_article":
        if (isLoggedIn()) {
            viewEditController();
        } else {
            header("Location: /");
        }
    break;

    default:
      echo "404";
}
