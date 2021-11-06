<?php
require_once "BaseController.php"; 

class TwigBaseController extends BaseController {
    public $title = ""; 
    public $template = "";

    /**
    * @var \Twig\Environment 
    */
    protected $twig; 
    

    public function __construct($twig)
    {
        $this->twig = $twig; 
    }
    

    public function getContext() : array
    {
        $context = parent::getContext(); 
        $context['title'] = $this->title; 

        $menu = [
            [
                "title" => "Doom 2016",
                "url" => "/doom-2016",
                "img_url" => "/doom-2016/image",
                "info_url" => "/doom-2016/info",
            ],
            [
                "title" => "Persona 2",
                "url" => "/persona-2",
                "img_url" => "/persona-2/image",
                "info_url" => "/persona-2/info",
            ],
        ];
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
    $context['menu'] = $menu;
    $context['nav'] = $nav;

        return $context;
    }
    

    public function get() {
        echo $this->twig->render($this->template, $this->getContext());
    }
}