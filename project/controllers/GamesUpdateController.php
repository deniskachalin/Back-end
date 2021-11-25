<?php
 require_once "BaseGamesTwigController.php";

class GamesUpdateController extends BaseGamesTwigController {
    public $template = "games_update.twig";
    public $title = "Изменить игру";

    public function get(array $context){
        $id = $this->params['id'];
        $sql = <<<EOL
        Select * from games where id = :id
        EOL;
        $query =$this->pdo->prepare($sql);
        $query->bindValue("id", $id);
        $query->execute();

        $data = $query->fetch();

        $context['game'] = $data;
        parent::get($context);
        
    }
    public function post(array $context){
        $id = $this->params['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];

        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";

        $sql = <<<EOL
        update games
        set title = :title,
        description = :description,
        type = :type,
        info = :info,
        image =:image
        where id = :id
        EOL;

        $query = $this->pdo->prepare($sql);

        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->bindValue("image", $image_url);
        $query->bindValue("id", $id);
        $query->execute();

        $context['message'] = 'Вы успешно изменили игру';
        $context['id'] = $id;
        $this->get($context);
    }

    public function getContext(): array
    {
        $query1 = $this->pdo->prepare("select name from types");
        $query1->execute();
        $context['types'] = $query1->fetchAll();
        $context['title'] = $this->title;
        return $context;
    }
}