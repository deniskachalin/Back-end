<?php

class BaseGamesTwigController extends TwigBaseController {
    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->query("Select * from types");
        $types = $query->fetchAll();
        $context['types'] = $types;

        return $context;
    }
}