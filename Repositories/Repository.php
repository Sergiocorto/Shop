<?php


namespace Repositories;


use Helpers\GenerateQueryStringHelper;
use Interfaces\RepositoryInterface;
use Models\Db;
use PDO;

class Repository implements RepositoryInterface
{
    private $conn;
    private $queryStringGenerator;

    public function __construct(Db $db, GenerateQueryStringHelper $queryStringGenerator, string $tableName)
    {
        $this->conn = $db->getInstance()->getConnection();
        $this->queryStringGenerator = $queryStringGenerator;
        $this->tableName = $tableName;
    }

    public function getAll(): array
    {
        $sql = $this->queryStringGenerator->generateGetAllQueryString($this->tableName);
        $stmt = $this->conn->prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        try
        {
            $sql = $this->queryStringGenerator->generateGetByIdQueryString($this->tableName);
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function add($entity)
    {
        $sql = $this->queryStringGenerator->generateGetByTitleQueryString($this->tableName);
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':title', $entity['title']);
        $stmt->execute();
        $result = $stmt->fetchAll();


        if (count($result) > 0) {
            echo json_encode("Entity with the same name already exist");
        } else
        {
            try {
                $sql = $this->queryStringGenerator->generateAddQueryString($this->tableName, $entity);
                $stmt = $this->conn->prepare($sql);

                $result = $stmt->execute($entity);

                if ($result) {
                    $productId = $this->conn->lastInsertId();
                    $newProduct = $this->getById($productId);
                    print_r($newProduct);
                }
            } catch (\PDOException $e)
            {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
    }

    public function update($entity)
    {
        try
        {
            $sql = $this->queryStringGenerator->generateUpdateQueryString($this->tableName, $entity);
            $stmt = $this->conn->prepare($sql);

            $result = $stmt->execute($entity);

            if ($result) {
                $updatedProduct = $this->getById($entity['id']);
                print_r($updatedProduct);
            }
        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }


    }

    public function delete($id)
    {
        try
        {
            if(!$this->getById($id)) throw new \Exception('Entity is id = '.$id.' not find');

            $sql = $this->queryStringGenerator->generateDeleteQueryString($this->tableName);
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $result = $stmt->execute();

            if ($result) return print_r(json_encode("Entity successfully deleted"));

        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}