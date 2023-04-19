<?php


namespace Entities;


class CategoryEntity
{
    private int $id;
    private string $title;

    public function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }
}