<?php

namespace Entities;


class ProductEntity
{
    private int $id;
    private string $title;
    private string $description;
    private int $categoryId;
    private int $cost;

    public function __construct($id, $title, $description, $categoryId, $cost)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->categoryId = $categoryId;
        $this->cost = $cost;
    }
}