<?php 
require_once '../vendor/autoload.php';

// создаем загрузчик шаблонов, и указываем папку с шаблонами
// \Twig\Loader\FilesystemLoader -- это типа как в C# писать Twig.Loader.FilesystemLoader, 
// только слеш вместо точек
$loader = new \Twig\Loader\FilesystemLoader('../views');

// создаем собственно экземпляр Twig с помощью которого будет рендерить
$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$title = "";
$template = "";
$is_image = false;
$is_info = false;

if ($url == "/") {
    $title = "Главная";
    $template = "main.twig";
} elseif (preg_match("#/doom-2016#", $url)) {
    $title = "Doom 2016";
    $template = "doom.twig";
    $context['is_image'] = $url == "/doom-2016/image";
    $context['image'] = "/images/doom-2016.jpg";
    $context['is_info'] = $url == "/doom-2016/info";
} elseif (preg_match("#/persona-2#", $url)) {
    $title = "Persona 2";
    $template = "persona2.twig";
    $context['is_image'] = $url == "/persona-2/image";
    $context['image'] = "/images/persona-2.png";
    $context['is_info'] = $url == "/persona-2/info";
} 



$context['title'] = $title;

echo $twig->render($template, $context);
       
   

    