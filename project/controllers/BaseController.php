<?php

abstract class BaseController {

    public PDO $pdo;
   
    public function setPDO(PDO $pdo) { 
        $this->pdo = $pdo;
    }

    public function getContext(): array {
        $context['url'] = $_SERVER["REQUEST_URI"];
        return $context; 
    }
    
    abstract public function get();
}