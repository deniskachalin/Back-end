<?php
// require_once "TwigBaseController.php";
require_once "BaseGamesTwigController.php";

class Controller404 extends BaseGamesTwigController {
    public $template = "404.twig";
    public $title = "Страница не найдена";

    public function get()
    {
        http_response_code(404); 
        parent::get(); 
    }
}