<?php

use App\Controller\NewsController;

define("ROOT", dirname(__DIR__));

require(ROOT . "/app/App.php");
App::load();
$app = App::get_instance();

$config = Reuse\Config::get_instance(ROOT . "/config/config.php");

//-Router
String : $p = "home";
if (isset($_GET['p'])) {
    $p = $_GET['p'];
}

ob_start();
if ($p === "home") {
    $controller = new NewsController();
    $controller->home();
} else if ($p === "news.show") {
    $controller = new NewsController();
    $controller->show();
}
$content = ob_get_clean();
require ROOT . "/app/Views/templates/default.php";
//-End Router