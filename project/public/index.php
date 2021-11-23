<?php
require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/Controller404.php";
require_once "../controllers/ObjectController.php"; 
require_once "../controllers/SearchController.php"; 


$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader, [
    "debug" => true,
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

// $url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";
$is_image = false;
$is_info = false;

$context = [];
// $controller = new Controller404($twig);

$pdo = new PDO("mysql:host=localhost;dbname=video_games;charset=utf8", "root", "");
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
// $query = $pdo->query("SELECT DISTINCT type FROM games ORDER BY 1");
// $types = $query->fetchAll();
// $twig->addGlobal("types", $types);


$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/doom-2016", DoomController::class);
$router->add("/games/(?P<id>\d+)", ObjectController::class); 
$router->add("/search", SearchController::class);

$router->get_or_default(Controller404::class);

// if ($url == "/") {
//     $controller = new MainController($twig); 
// }
// }elseif (preg_match("#^/doom-2016/info#", $url)){
//     $controller = new DoomInfoController($twig);

// }elseif (preg_match("#^/doom-2016/image#", $url)){
//     $controller = new DoomImageController($twig);

// } elseif (preg_match("#/doom-2016#", $url)) {
//     $controller = new DoomController($twig);

//  }elseif (preg_match("#^/persona-2/info#", $url)){
//      $controller = new Persona2InfoController($twig);

// }elseif (preg_match("#^/persona-2/image#", $url)){
//     $controller = new Persona2ImageController($twig);

// } elseif (preg_match("#/persona-2#", $url)) {
//     $controller = new Persona2Controller($twig);

//  }

// if ($controller) {
//     $controller->setPDO($pdo);
//     $controller->get();
// }