<?php

class ObjectController extends TwigBaseController {

    public $template = "__object.twig";
    public $object;

    public function getContext(): array
    {
        $context = parent::getContext();

        // echo "<pre>";
        // print_r($this->params);
        // echo "</pre>";

        $query = $this->pdo->prepare("SELECT * FROM games WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();
        
        $this->object = $data;
        $context['object'] = $this->object;
        
        return $context;
    }
}