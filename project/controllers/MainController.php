<?php
 require_once "BaseGamesTwigController.php"; 

class MainController extends BaseGamesTwigController {
    public $template = "main.twig";
    public $title = "Главная";


    public function getContext(): array
    {
        $context = parent::getContext();
        if (isset($_GET['type'])){
            $query = $this->pdo->prepare("select * from games where type = :type");
            $query->bindValue("type", $_GET['type']);
            $query->execute();
            $context['title'] = $_GET['type'];
        }
        else {
            $query = $this->pdo->query("SELECT * FROM games");
        }
                
        $context['games'] = $query->fetchAll();

        return $context;
    }
}