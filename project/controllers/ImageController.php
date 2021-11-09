<?php
require_once "DoomController.php"; 

class DoomInfoController extends DoomController {
    public $template = "doom.twig";

    public function getContext() : array
    {
        $context = parent::getContext(); 

        $context['is_info'] = $context['url'] == "/doom-2016/info";
        

        return $context;
    }
    
}