<?php

class BaseGamesTwigController extends TwigBaseController {
    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->query("Select Distinct type from games order by 1");
        $types = $query->fetchAll();
        $context['types'] = $types;

        return $context;
    }
}