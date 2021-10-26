<?php
require_once "TwigBaseController.php"; 

class Persona2Controller extends TwigBaseController {
    public $title = "Persona 2"; 
    public $template = "__object.twig";

    public function getContext() : array
    {
        $context = parent::getContext(); 

        $context['image_url'] = "/persona-2/image";  
        $context['info_url'] = "/persona-2/info";  

        return $context;
    }
    
}