<?php
 require_once "BaseGamesTwigController.php"; 

class TypeController extends BaseGamesTwigController {

    public $template = "__type.twig";
    public $type;

    public function getContext(): array
    {
        $context = parent::getContext();
        if (isset($_GET['show'])){
            if ($_GET['show'] == "image"){
                $context['is_image'] = true;
            }
            else if ($_GET['show'] == "info"){
                $context['is_info'] = true;
            }
        }
        

        // echo "<pre>";
        // print_r($this->params);
        // echo "</pre>";
        $query = $this->pdo->prepare("SELECT * FROM types WHERE id= :my_id");
        
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();
        
        $this->type = $data;
        $context['type'] = $this->type;
        
        return $context;
    }
}