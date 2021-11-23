<?php
 require_once "BaseGamesTwigController.php"; 

class ObjectController extends BaseGamesTwigController {

    public $template = "__object.twig";
    public $object;

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
        $query = $this->pdo->prepare("SELECT * FROM games WHERE id= :my_id");
        
        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();
        
        $this->object = $data;
        $context['object'] = $this->object;
        $context['title'] =  $this->object['title'];
        
        return $context;
    }
}