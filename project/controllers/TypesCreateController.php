<?php
 require_once "BaseGamesTwigController.php";

 class TypesCreateController extends BaseGamesTwigController{
    public $template = "types_create.twig";
    public $title = "Добавление жанра";

    public function get(array $context){
        parent::get($context);
    }

    public function post(array $context){
        $typeName = $_POST['name'];
        $description = $_POST['info'];

        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name";

        $sql = <<<EOL
        insert into types(name, description, image) 
        values (:name, :description, :image_url)
        EOL;

        $query = $this->pdo->prepare($sql);

        $query->bindValue("name", $typeName);
        $query->bindValue("description", $description);
        $query->bindValue("image_url", $image_url);

        $query->execute();

        $context['message'] = 'Вы успешно создали игру';
        $context['id'] = $this->pdo->lastInsertId();
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