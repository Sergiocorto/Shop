<?php


namespace Helpers;


class GenerateQueryStringHelper
{
    public function generateGetAllQueryString($tableName): string
    {
        return "SELECT * FROM ".$tableName;
    }

    public function generateGetByIdQueryString($tableName): string
    {
        return $sql = "SELECT * FROM ".$tableName." WHERE id = :id";
    }

    public function generateGetByTitleQueryString($tableName): string
    {
        return "SELECT * FROM ".$tableName." WHERE title = :title";
    }

    public function generateAddQueryString($tableName, $entity): string
    {
        $sql = "INSERT INTO ".$tableName;
        $firstString ="";
        $secondString = "";

        foreach ($entity as $key => $value)
        {
            if ($key === array_key_last($entity))
            {
                $firstString .= $key;
                $secondString .= ":".$key;
                break;
            }
            $firstString .= $key.", ";
            $secondString .= ":".$key.", ";
        }

        $sql .= " (".$firstString.") VALUES (".$secondString.")";

        return $sql;
    }

    public function generateUpdateQueryString($tableName, $entity): string
    {
        $sql = "UPDATE ".$tableName." SET ";

        foreach ($entity as $key => $value)
        {
            if ($key === 'id') continue;
            if ($key === array_key_last($entity))
            {
                $sql .= $key."=:".$key;
                break;
            }
            $sql .= $key."=:".$key.", ";
        }

        $sql .= " WHERE id = :id";
        return $sql;
    }

    public function generateDeleteQueryString($tableName): string
    {
        return "DELETE FROM ".$tableName." WHERE id = :id";
    }
}