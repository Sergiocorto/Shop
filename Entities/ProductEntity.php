<?php

namespace Entities;


class ProductEntity
{
    private $id;
    private $title;
    private $description;
    private $categoryId;
    private $cost;

    public function __construct($id, $title, $description, $categoryId, $cost)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->categoryId = $categoryId;
        $this->cost = $cost;
    }
}