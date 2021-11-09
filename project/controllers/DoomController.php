<?php
// require_once "TwigBaseController.php"; 

class DoomController extends TwigBaseController {
    public $title = "Doom 2016"; 
    public $template = "__object.twig";

    public function getContext() : array
    {
        $context = parent::getContext(); 

        $context['image_url'] = "/doom-2016/image";  
        $context['info_url'] = "/doom-2016/info";  

        return $context;
    }
    
}