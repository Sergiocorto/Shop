<?php

namespace Interfaces;

interface RepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function add($entity);

    public function update($entity);

    public function delete($id);
}