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

$context = [];
$nav = [
    [
        "title" => "Главная",
        "url" => "/",
    ],
    [
        "title" => "Doom 2016",
        "url" => "/doom-2016",
    ],
    [
        "title" => "Persona 2",
        "url" => "/persona-2",
    ],
];

$menu = [
    [
        "title" => "Doom 2016",
        "url" => "/doom-2016",
        "img_url" => "/doom-2016/image",
        "info_url" => "/doom-2016/image",
    ],
    [
        "title" => "Persona 2",
        "url" => "/persona-2",
        "img_url" => "/persona-2/image",
        "info_url" => "/persona-2/image",
    ],
];

if ($url == "/") {
    $title = "Главная";
    $template = "main.twig";
} elseif (preg_match("#/doom-2016#", $url)) {
    $title = "Doom 2016";
    $template = "__object.twig";
    $context['image_url'] = "/doom-2016/image";  
    $context['info_url'] = "/doom-2016/info";  
    if (preg_match("#^/doom-2016/image#", $url)){
        $template = "image.twig";
        $context['is_image'] = $url == "/doom-2016/image";
         $context['image'] = "/images/doom-2016.jpg";
    }elseif (preg_match("#^/doom-2016/info#", $url)){
        $template = "doom.twig";
        $context['is_info'] = $url == "/doom-2016/info";
    }
} elseif (preg_match("#/persona-2#", $url)) {
    $title = "Persona 2";
    $template = "__object.twig";
    $context['image_url'] = "/persona-2/image";  
    $context['info_url'] = "/persona-2/info";  
    if (preg_match("#^/persona-2/image#", $url)){
        $template = "image.twig";
        $context['is_image'] = $url == "/persona-2/image";
        $context['image'] = "/images/persona-2.jpg";
    }elseif (preg_match("#^/persona-2/info#", $url)){
        $template = "persona2.twig";
        $context['is_info'] = $url == "/persona-2/info";
    }
    
    
}



$context['title'] = $title;
$context['nav'] = $nav;
$context['menu'] = $menu;

echo $twig->render($template, $context);
