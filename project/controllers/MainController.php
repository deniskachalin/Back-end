<?php
 require_once "BaseGamesTwigController.php"; 

class MainController extends BaseGamesTwigController {
    public $template = "main.twig";
    public $title = "Главная";


    public function getContext(): array
    {
        $context = parent::getContext();
        
        $query = $this->pdo->query("SELECT * FROM games");
        
        $context['games'] = $query->fetchAll();

        return $context;
    }
}