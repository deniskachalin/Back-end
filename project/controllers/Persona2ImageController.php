<?php
require_once "Persona2Controller.php"; 

class Persona2ImageController extends Persona2Controller {
    public $template = "image.twig";

    public function getContext() : array
    {
        $context = parent::getContext(); 

        $context['is_image'] = $context['url'] == "/persona-2/image";
        $context['image'] = "/images/persona-2.jpg";
        

        return $context;
    }
    
}