<?php

class GamesDeleteController extends BaseController {
    public function post (array $context){
        $id = $_POST['id'];

        $sql = <<<EOL
        delete from games where id=:id
        EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("id", $id);
        $query->execute();

        header("Location: /");
        exit;
    }
}