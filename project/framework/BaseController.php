<?php

abstract class BaseController {

    public PDO $pdo;
    public array $params;
   
    public function setParams(array $params) {
        $this->params = $params;
    }

    public function setPDO(PDO $pdo) { 
        $this->pdo = $pdo;
    }

    public function getContext(): array {
        $context['url'] = $_SERVER["REQUEST_URI"];
        return $context; 
    }
    
    abstract public function get();
}