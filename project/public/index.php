<?php
require_once '../vendor/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/DoomController.php";
require_once "../controllers/DoomImageController.php";
require_once "../controllers/DoomInfoController.php";
require_once "../controllers/Persona2Controller.php";
require_once "../controllers/Persona2ImageController.php";
require_once "../controllers/Persona2InfoController.php";
require_once "../controllers/Controller404.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";
$is_image = false;
$is_info = false;

$context = [];
$controller = new Controller404($twig);

if ($url == "/") {
    $controller = new MainController($twig); 
}elseif (preg_match("#^/doom-2016/info#", $url)){
    $controller = new DoomInfoController($twig);

}elseif (preg_match("#^/doom-2016/image#", $url)){
    $controller = new DoomImageController($twig);

} elseif (preg_match("#/doom-2016#", $url)) {
    $controller = new DoomController($twig);

 }elseif (preg_match("#^/persona-2/info#", $url)){
     $controller = new Persona2InfoController($twig);

}elseif (preg_match("#^/persona-2/image#", $url)){
    $controller = new Persona2ImageController($twig);

} elseif (preg_match("#/persona-2#", $url)) {
    $controller = new Persona2Controller($twig);

 }

if ($controller) {
    $controller->get();
}