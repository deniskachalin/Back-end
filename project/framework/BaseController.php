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
    
    public function process_response(){
        $method = $_SERVER['REQUEST_METHOD'];
        $context = $this->getContext();
        if ($method == "GET"){
            $this->get($context);
        }else if ($method == "POST"){
            $this->post($context);
        }
    }

    public function get(array $context){}
    public function post(array $context){}
}