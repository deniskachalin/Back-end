<?php
 require_once "BaseGamesTwigController.php";

class GamesCreateController extends BaseGamesTwigController {
    public $template = "games_create.twig";
    public $title = "Добавить";

    public function get(array $context){
        echo $_SERVER['REQUEST_METHOD'];
        parent::get($context);
    }
    public function post(array $context){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];

        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";

        $sql = <<<EOL
        insert into games(title, description, type, info, image) 
        values (:title, :description, :type, :info, :image_url)
        EOL;

        $query = $this->pdo->prepare($sql);

        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->bindValue("image_url", $image_url);

        $query->execute();

        $context['message'] = 'Вы успешно создали игру';
        $context['id'] = $this->pdo->lastInsertId();
        $this->get($context);
    }

    public function getContext(): array
    {
        $query1 = $this->pdo->prepare("select DISTINCT type from games");
        $query1->execute();
        $context['types'] = $query1->fetchAll();
        $context['title'] = $this->title;

        return $context;
    }
}