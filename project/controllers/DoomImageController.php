<?php
require_once "DoomController.php"; 

class DoomImageController extends DoomController {
    public $template = "image.twig";

    public function getContext() : array
    {
        $context = parent::getContext(); 

        $context['is_image'] = $context['url'] == "/doom-2016/image";
        $context['image'] = "/images/doom-2016.jpg";
        

        return $context;
    }
    
}