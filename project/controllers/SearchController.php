<?php

require_once "BaseGamesTwigController.php";

class SearchController extends BaseGamesTwigController{
    public $template = "search.twig";
    public $title = "Поиск";

    public function getContext(): array
    {
        $context = parent::getContext();

        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $description = isset($_GET['description']) ? $_GET['description'] : '';
        $sql = <<<EOL
            SELECT id, title
            FROM games WHERE true
            AND (:type = '' or type = :type)
            AND (:title = '' OR title like CONCAT('%', :title, '%'))
            AND (:description = '' OR description like CONCAT('%', :description, '%'))
            EOL;
        $query = $this->pdo->prepare($sql);
        $query->bindValue("type", $type);
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->execute();
        $context['objects'] = $query->fetchAll();

        $query1 = $this->pdo->prepare("select name from types");
        $query1->execute();
        $context['types'] = $query1->fetchAll();

        return $context;
    }
}