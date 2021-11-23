<?php

require_once "BaseGamesTwigController.php";

class SearchController extends BaseGamesTwigController{
    public $template = "search.twig";

    public function getContext(): array
    {
        $context = parent::getContext();

        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $title = isset($_GET['title']) ? $_GET['title'] : '';

        $sql = <<<EOL
SELECT id, title
FROM games
WHERE (:title = '' OR title like CONCAT('%', :title, '%'))
    AND (type = :type)
EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("title", $title);
        $query->bindValue("type", $type);
        $query->execute();
        $context['objects'] = $query->fetchAll();

        $query1 = $this->pdo->prepare("select DISTINCT type from games");
        $query1->execute();
        $context['types'] = $query1->fetchAll();

        return $context;
    }
}