<?php

namespace Repositories;

use Entities\ProductEntity;
use Interfaces\RepositoryInterface;
use Models\Db;
use \PDO;

class ProductRepository implements RepositoryInterface
{
    private $conn;

    public function __construct(Db $db)
    {
        $this->conn = $db->getInstance()->getConnection();
    }

    /**
    * @return ProductEntity[]
    */
    public function getAll()
    {
        $sql = "SELECT * FROM products";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }


	 /**
    * @return ProductEntity
    */
    public function getById($id)
    {
    	try
    	{
    		$sql = "SELECT * FROM products WHERE id = :id";
         $stmt = $this->conn->prepare($sql);
         $stmt->bindParam(':id', $id);
         $stmt->execute();
        
         return $stmt->fetch(PDO::FETCH_ASSOC);
    	} catch (\PDOException $e)
      {
          throw new \PDOException($e->getMessage(), (int)$e->getCode());
      }
    }

	 /**
    * @return ProductEntity
    */
    public function add($product)
    {
        $sql = "SELECT * FROM products WHERE title = :title";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->bindParam(':title', $product['title']);
        $stmt->execute();
        $result = $stmt->fetchAll();
        

        if (count($result) > 0) {
            echo json_encode("Product with the same name already exist");
        } else
        {
            try {
                $sql = "INSERT INTO products (title, description, categoryId, cost) VALUES (:title, :description, :categoryId, :cost)";
                $stmt = $this->conn->prepare($sql);

                $stmt->bindParam(':title', $product['title']);
                $stmt->bindParam(':description', $product['description']);
                $stmt->bindParam(':categoryId', $product['categoryId']);
                $stmt->bindParam(':cost', $product['cost']);

                $result = $stmt->execute();

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

	 /**
    * @return ProductEntity
    */
    public function update($product)
    {
        try
        {
            $sql = "UPDATE products SET title = :title, description = :description, categoryId = :categoryId, cost = :cost WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':title', $product['title']);
            $stmt->bindParam(':description', $product['description']);
            $stmt->bindParam(':categoryId', $product['categoryId']);
            $stmt->bindParam(':cost', $product['cost']);
            $stmt->bindParam(':id', $product['id']);
            
            $result = $stmt->execute();

            if ($result) {
                $updatedProduct = $this->getById($product['id']);
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
			if(!$this->getById($id)) throw new \Exception('Product is id = '.$id.' not find');
        
            $sql = "DELETE FROM products WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':id', $id);
            
            $result = $stmt->execute();
            
            if ($result) return print_r(json_encode("Product successfully deleted"));

        } catch (\PDOException $e)
        {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}