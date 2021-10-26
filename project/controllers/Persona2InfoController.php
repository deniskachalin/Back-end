<?php
require_once "Persona2Controller.php"; 

class Persona2InfoController extends Persona2Controller {
    public $template = "persona2.twig";

    public function getContext() : array
    {
        $context = parent::getContext(); 

        $context['is_info'] = $context['url'] == "/persona-2/info";
        

        return $context;
    }
    
}