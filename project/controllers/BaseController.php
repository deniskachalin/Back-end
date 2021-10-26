<?php

abstract class BaseController {

    public function getContext(): array {
        $context['url'] = $_SERVER["REQUEST_URI"];
        return $context; 
    }
    
    abstract public function get();
}