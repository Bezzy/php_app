<?php

// NOTE(mohamed): I would love to have a middleware and proper router here.
// Basically the flow of data is MiddleWare -> Router -> Controller
// In the controller we can talk to the models of the application,
// do business logic and render things.

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
    // $controller = new NewsController();
    // $controller->show();
}
//-End Router